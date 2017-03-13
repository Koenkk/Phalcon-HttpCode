<?php

use Phalcon\Config;

/*
 * Build a new application configuration. These settings are the defaults and
 * can (and some should) be overridden.
 */
$config = new Config([
    // Application directories.
    "cacheDir" => DATA_DIR . "cache/",
    "logDir" => DATA_DIR . "log/",
    "tasksDir" => APP_DIR . "tasks/",

    // Security settings.
    "cryptSalt" => "change me please",

    // Debug and warnings.
    "debug" => true,
]);
