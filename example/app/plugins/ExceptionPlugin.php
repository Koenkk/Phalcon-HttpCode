<?php

namespace My\Plugins;

use Phalcon\Dispatcher;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Mvc\Dispatcher\Exception as DispatcherException;
use Phalcon\Mvc\User\Plugin;

use BasilFX\HttpCode\Http\Response;

/**
 * ExceptionPlugin
 *
 * Handles exceptions in controllers/actions.
 */
class ExceptionPlugin extends Plugin
{
    /**
     * This action is executed before execute any action in the application.
     *
     * @param Event $event
     * @param MvcDispatcher $dispatcher
     * @param Exception $exception
     * @return boolean
     */
    public function beforeException(Event $event, MvcDispatcher $dispatcher, \Exception $exception)
    {
        ($event);

        if ($exception instanceof DispatcherException) {
            switch ($exception->getCode()) {
                case Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
                case Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
                    throw new Response\Http404();
            }
        } elseif ($exception instanceof Response\HttpCode) {
            return;
        }

        // Only show the 500 handler if debug is disabled.
        if (!$this->config->debug) {
            throw new Response\Http500();
        }
    }
}
