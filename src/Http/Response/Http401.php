<?php

namespace BasilFX\HttpCode\Http\Response;

class Http401 extends HttpCode
{
    public function __construct()
    {
        parent::__construct("Unauthenticated", 401);
    }
}
