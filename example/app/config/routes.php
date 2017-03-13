<?php

$router->add(
    "/",
    [
        "module" => "web",
        "namespace" => "My\\Controllers",
        "controller" => "index",
        "action" => "index"
    ]
);

$router->add(
    "/throw/401",
    [
        "module" => "web",
        "namespace" => "My\\Controllers",
        "controller" => "index",
        "action" => "throw401"
    ]
);

$router->add(
    "/throw/403",
    [
        "module" => "web",
        "namespace" => "My\\Controllers",
        "controller" => "index",
        "action" => "throw403"
    ]
);

$router->add(
    "/throw/404",
    [
        "module" => "web",
        "namespace" => "My\\Controllers",
        "controller" => "index",
        "action" => "throw404"
    ]
);

$router->add(
    "/throw/500",
    [
        "module" => "web",
        "namespace" => "My\\Controllers",
        "controller" => "index",
        "action" => "throw500"
    ]
);

$router->add(
    "/throw/json",
    [
        "module" => "api",
        "namespace" => "My\\Controllers",
        "controller" => "api",
        "action" => "throwJson"
    ]
);

$router->add(
    "/return/json",
    [
        "module" => "api",
        "namespace" => "My\\Controllers",
        "controller" => "api",
        "action" => "returnJson"
    ]
);
