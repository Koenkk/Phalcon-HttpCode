<?php

namespace BasilFX\HttpCode\Http\Response;

class Http400 extends HttpCode
{
    public function __construct()
    {
        parent::__construct("Bad Request", 400);
    }
}
