<?php

namespace BasilFX\HttpCode\Http\Response;

class Http201 extends HttpCode
{
    public function __construct()
    {
        parent::__construct("Created", 201);
    }
}
