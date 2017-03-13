<?php

namespace BasilFX\HttpCode\Mvc;

use Phalcon\Mvc\Dispatcher as MvcDispatcher;

use BasilFX\HttpCode\Http\Response;

/**
 * HttpCode dispatcher.
 *
 * This dispatcher will catch HttpCode exceptions before they are returned to
 * the caller. When caught, a {dispatch:beforeHttpCode} event is fired, to
 * allow processing of HttpCode's.
 *
 * The added benefit of this dispatcher, is that it allows one to throw
 * HttpCode exceptions in controller code and/or dispatcher events.
 *
 * When a HttpCode exception is not caught, its status code and message will be
 * set on the response instance in the dependency injector.
 */
class Dispatcher extends MvcDispatcher
{
    /**
     * @inheritdoc
     */
    protected function _dispatch()
    {
        try {
            return parent::_dispatch();
        } catch (Response\HttpCode $exception) {
            $eventsManager = $this->getEventsManager();

            // Pass the status code onto an event hander.
            if (is_object($eventsManager)) {
                if ($eventsManager->fire("dispatch:beforeHttpCode", $this, $exception) === false) {
                    return parent::_dispatch();
                }
            }

            // No event handler handled the status code, therefore convert it
            // to a appropriate HTTP response.
            $exception->toResponse($this->getDi()->getShared("response"));

            return false;
        }
    }
}
