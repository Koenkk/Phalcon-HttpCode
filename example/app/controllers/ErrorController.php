<?php

namespace My\Controllers;

use Phalcon\Mvc\Controller;

class ErrorController extends Controller
{
    /**
     * Redirect user to the login page.
     */
    public function show401Action()
    {
        return $this->view->pick("error/show401");
    }

    /**
     * Renders a 403 error page.
     *
     * @uses app/views/error/show403.volt
     */
    public function show403Action()
    {
        return $this->view->pick("error/show403");
    }

    /**
     * Renders a 404 error page.
     *
     * @uses app/views/error/show404.volt
     */
    public function show404Action()
    {
        return $this->view->pick("error/show404");
    }

    /**
     * Renders a 500 error page.
     *
     * @uses app/views/error/show500.volt
     */
    public function show500Action()
    {
        return $this->view->pick("error/show500");
    }
}
