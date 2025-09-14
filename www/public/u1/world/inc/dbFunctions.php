<?php
function dbConnect()
{

    define('DB_USER', 'world');
    define('DB_PASSWORD', '12345');
    define('DB_HOST', 'mariadb');
    define('DB_NAME', 'world');

    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);

    return $db;
}

function postAll($db,$sqlkod)
{
    $stmt = $db->prepare($sqlkod);
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: text/html; charset=utf-8');

    return $rows;
}


