<?php
include_once "constant.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "libs/helpers.php";

try {
    $pdo = new PDO("mysql:host=$database_config->host;dbname=$database_config->dbname;charset=$database_config->charset", $database_config->user, $database_config->pass);
} catch (PDOException $e) {
    diePage('Connection failed: ' . $e->getMessage());
}

include BASE_PATH . "libs/lib-location.php";


