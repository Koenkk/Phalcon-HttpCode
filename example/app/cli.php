<?php

use Phalcon\Di\FactoryDefault\Cli as CliDi;

/**
 * Construct an empty dependency injector. The services below will register
 * the required services.
 */
$di = new CliDi();

/**
 * Read the services. The services will be injected to the dependecy
 * injector $di.
 */
include APP_DIR . 'config/services.php';

/**
 * Process the console arguments
 */
$arguments = [];

foreach ($argv as $k => $arg) {
    if ($k == 1) {
        $arguments['task'] = $arg;
    } elseif ($k == 2) {
        $arguments['action'] = $arg;
    } elseif ($k >= 3) {
        $arguments['params'][] = $arg;
    }
}

/**
 * Invoke the task.
 */
$console = new \Phalcon\Cli\Console\Extended();
$console->setDI($di);

try {
    $console->handle($arguments);
} catch (\Phalcon\Exception $e) {
    echo $e->getMessage() . "\n";
    exit(255);
}
