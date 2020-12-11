<?php

namespace Modules\Core;

use App\Controllers\WorkController;

class Route
{
    function __construct()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = rtrim($url, '/');

        $controller = new WorkController();
//        return $controller->index();

        if (strlen($url) == 0) {
            $controller->index();
            return;
        }

        $link      = explode('/', $url);
        $url       = $link[1];
        $method    = (isset($link[2])) ? $link[2] : null;
        $parameter = (isset($link[3])) ? $link[3] : null;


        switch ($url) {
            case 'work':
                switch ($method) {
                    case 'add':
                        return $controller->add();
                    case 'remove':
                        if (! is_null($parameter)) {
                            return $controller->remove($parameter);
                        }

                        header('Location: /work');

                        return ;
                    case 'edit':
                        if (! is_null($parameter)) {
                            return $controller->edit($parameter);
                        }

                        return $controller->index();
                    default:
                        return $controller->index();
                }
            default:
                return $controller->index();
        }
    }
}