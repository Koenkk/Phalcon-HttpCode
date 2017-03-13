<?php

use Phalcon\Mvc\Router;
use Phalcon\Di;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine;

use My\Plugins\WebPlugin;
use My\Plugins\ExceptionPlugin;

use BasilFX\HttpCode\Mvc\Dispatcher;


/*
 * Register the dependency injector as the default one.
 */
Di::setDefault($di);

/*
 * Register the configuration as a service in the dependency injector.
 */
$di->set("config", $config);

/*
 * Register the loader as a service in the dependency injector.
 */
$di->set("loader", $loader);

/*
 * The default events manager, which will manage application events.
 */
$di->set("eventsManager", function () {
    return new EventsManager();
}, true);

/*
 * Dispatcher setup.
 */
$di->set("dispatcher", function () use ($di) {
    $dispatcher = new Dispatcher();

    $eventsManager = $di->getShared("eventsManager");
    $dispatcher->setEventsManager($eventsManager);

    $eventsManager->attach("dispatch:beforeException", new ExceptionPlugin());
    $eventsManager->attach("dispatch:beforeHttpCode", new WebPlugin());

    return $dispatcher;
}, true);

/*
 * Loading routes from the routes.php file.
 */
$di->set("router", function () use ($config) {
    $router = new Router();

    $router->removeExtraSlashes(true);

    include APP_DIR . "config/routes.php";

    return $router;
}, true);

/*
 * Setting up the view component.
 */
$di->set("view", function () use ($di, $config) {
    $view = new View();

    $view->setViewsDir(APP_DIR . "views/");
    $view->registerEngines([
        ".volt" => function ($view, $di) use ($config) {
            $volt = new Engine\Volt($view, $di);
            $volt->setOptions([
                "compileAlways" => true,
                "compiledExtension" => ".debug.php",
                "compiledPath" => $config->cacheDir . "volt/",
                "compiledSeparator" => "_",
                "stat" => true,
            ]);

            return $volt;
        }
    ]);

    return $view;
}, true);
