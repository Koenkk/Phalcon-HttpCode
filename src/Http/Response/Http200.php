<?php

namespace BasilFX\HttpCode\Http\Response;

class Http200 extends HttpCode
{
    public function __construct()
    {
        parent::__construct("OK", 200);
    }
}
