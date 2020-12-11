<?php

namespace App\Controllers;

use Modules\Core\View;

class AbstractController
{
    /**
     * View
     *
     * @var View
     */
    protected $view;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Request handle
     *
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function request() {
        return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
    }

    /**
     * Redirect handle
     *
     * @param string $location Location
     */
    public function redirect($location) {
        $response = \Symfony\Component\HttpFoundation\Response::create(null,
            \Symfony\Component\HttpFoundation\Response::HTTP_FOUND,
            ['Location' => $location]);

        $response->send();
        exit;
    }
}