<?php

namespace My\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

use BasilFX\HttpCode\Http\Response;

use My\Controllers\Response as MyResponse;

class ApiController extends Controller
{
    public function afterExecuteRoute(Dispatcher $dispatcher)
    {
        $result = $dispatcher->getReturnedValue();

        if ($result instanceof Response\HttpCode) {
            $dispatcher->setReturnedValue(
                $result->toResponse($this->response)
            );
        }
    }

    /**
     * Throw a JSON response.
     */
    public function throwJsonAction()
    {
        throw new MyResponse\Api();
    }

    /**
     * Return a JSON response.
     */
    public function returnJsonAction()
    {
        return new MyResponse\Api();
    }
}
