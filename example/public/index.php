<?php

use Phalcon\Di;
use Phalcon\Mvc\Application;

/*
 * Read the environment file. This will initialize the class loader and the
 * config file. It exports $loader and $config.
 */
include "../app/config/environment.php";

/*
 * Construct an empty dependency injector. The services below will register
 * the required services.
 */
$di = new Di\FactoryDefault();

/*
 * Read the services. The services will be injected to the dependecy
 * injector $di.
 */
include APP_DIR . "config/services.php";

/*
 * Create an application and register the web and API modules.
 */
$application = new Application($di);

$application->registerModules([
    "web" => function ($di) use ($application, $loader, $config) {
        $application->useImplicitView(true);
    },
    "api" => function ($di) use ($application, $loader, $config) {
        $application->useImplicitView(false);
    }
]);
$application->setDefaultModule("web");

/*
 *  Dispatch the request.
 */
echo $application->handle()->getContent();
