<?php

/*
 * Define some useful constants for file directories. Ensure that a trailing
 * slash is present!
 */
define("BASE_DIR", dirname(__DIR__) . "/../");
define("APP_DIR", BASE_DIR . "app/");
define("TEST_DIR", BASE_DIR . "tests/");

/*
 * Read the auto-loader and register namespaces. This will export the $loader
 * variable.
 */
include APP_DIR . "config/loader.php";

/*
 * Define the data directory constant.
 */
define("DATA_DIR", BASE_DIR . "data/");

/*
 * Read the configuration file. This will export the $config variable. The user
 * config will also be loaded by this include.
 */
include APP_DIR . "config/config.php";

/*
 * Configure error reporting. Always show errors, unless it is running in
 * production mode.
 */
if ($config->debug || php_sapi_name() === "cli") {
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
} else {
    ini_set("display_errors", 0);
    error_reporting(0);
}

/*
 * Return the config, because some (external) tools use this file to bootstrap
 * a config (e.g. Phalcon developer tools).
 */
return $config;
