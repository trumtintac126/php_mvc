<?php

namespace Modules\Core;

try {
    $connection = new \PDO($pdoString, $username, $password, $options);
} catch ( \Exception $exception ) {
    echo 'Error connecting to the Database: ' . $exception->getMessage();
    exit;
}