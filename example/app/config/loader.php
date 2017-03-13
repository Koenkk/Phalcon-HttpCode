<?php

use Phalcon\Loader;

/*
 * Register an autoloader.
 *
 * Note that the order of the directories below is important! Each path must
 * end with a slash.
 */
$loader = new Loader();

$loader->registerNamespaces([
    "My\\Controllers" => APP_DIR . "controllers/",
    "My\\Plugins" => APP_DIR . "plugins/",

    // This line is not needed when installing via composer.
    "BasilFX\\HttpCode" => BASE_DIR . "../src",
]);

$loader->register();

/*
 * Include the autoloader provided by Composer.
 */
require BASE_DIR . "vendor/autoload.php";
