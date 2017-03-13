<?php

namespace BasilFX\HttpCode\Http\Response;

class Http500 extends HttpCode
{
    public function __construct()
    {
        parent::__construct("Internal Server Error", 500);
    }
}
