<?php

namespace My\Plugins;

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use BasilFX\HttpCode\Mvc\Dispatcher;
use BasilFX\HttpCode\Http\Response\HttpCode;

class WebPlugin extends Plugin
{
    /**
     * This action is executed before a HttpCode is handled.
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     * @param HttpCode $code
     * @return boolean
     */
    public function beforeHttpCode(Event $event, Dispatcher $dispatcher, HttpCode $code)
    {
        ($event);

        if (in_array($code->getCode(), [401, 403, 404, 500])) {
            $dispatcher->forward([
                "namespace" => "My\\Controllers",
                "controller" => "error",
                "action" => "show{$code->getCode()}"
            ]);

            return false;
        }
    }
}
