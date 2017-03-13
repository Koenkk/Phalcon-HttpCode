<?php

namespace BasilFX\HttpCode\Http\Response;

class Http404 extends HttpCode
{
    public function __construct()
    {
        parent::__construct("Not Found", 404);
    }
}
