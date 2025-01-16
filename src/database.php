<?php

try {
    $dsn = "mysql:host=mariadb;dbname=mariadb";
    $username = "mariadb";
    $password = "mariadb";

    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die($e->getMessage());
}
