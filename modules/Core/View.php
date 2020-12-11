<?php

namespace Modules\Core;

class View
{
    public function __construct() {
    }

    public function render($name, $data = null) {
        require 'app/Views/' . $name . '.php';
    }
}