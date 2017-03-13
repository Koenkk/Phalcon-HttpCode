<?php

namespace BasilFX\HttpCode\Http\Response;

use Phalcon\Http\ResponseInterface;

abstract class HttpCode extends \Exception
{
    public function toResponse(ResponseInterface $response)
    {
        $response->setStatusCode($this->getCode(), $this->getMessage());
    }
}
