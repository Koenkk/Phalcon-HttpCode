<?php

namespace My\Controllers\Response;

use Phalcon\Http\ResponseInterface;

use BasilFX\HttpCode\Http\Response;

/**
 * Generic API response.
 */
class Api extends Response\Http200
{
    public function toResponse(ResponseInterface $response)
    {
        $response->setJsonContent([
            "hello" => "world"
        ]);
    }
}
