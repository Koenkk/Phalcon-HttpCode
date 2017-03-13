<?php

namespace BasilFX\HttpCode\Http\Response;

class Http422 extends HttpCode
{
    public function __construct()
    {
        parent::__construct("Unprocessable Entity", 422);
    }
}
