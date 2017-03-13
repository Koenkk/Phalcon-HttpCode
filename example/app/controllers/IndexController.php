<?php

namespace My\Controllers;

use Phalcon\Mvc\Controller;

use BasilFX\HttpCode\Http\Response;

class IndexController extends Controller
{
    /**
     * Renders the index page.
     */
    public function indexAction()
    {
        return $this->view->pick("index/index");
    }

    /**
     * Throw a 401.
     */
    public function throw401Action()
    {
        throw new Response\Http401();
    }

    /**
     * Throw a 403.
     */
    public function throw403Action()
    {
        throw new Response\Http403();
    }

    /**
     * Throw a 404.
     */
    public function throw404Action()
    {
        throw new Response\Http404();
    }

    /**
     * Throw a 403.
     */
    public function throw500Action()
    {
        throw new Response\Http500();
    }
}
