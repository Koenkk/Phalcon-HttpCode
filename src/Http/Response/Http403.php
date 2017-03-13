<?php

namespace BasilFX\HttpCode\Http\Response;

class Http403 extends HttpCode
{
    public function __construct()
    {
        parent::__construct("Forbidden", 403);
    }
}
