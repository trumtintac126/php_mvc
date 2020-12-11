<?php

require "config.php";
try {
    $connection = new PDO($pdoString);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);

    echo "Database and table products created successfully.";
} catch (\Exception $exception) {
    echo $exception->getMessage();
}