<?php
function dbConnect()
{
    define('DB_USER', 'egytalk');
    define('DB_PASSWORD', '12345');
    define('DB_HOST', 'mariadb');
    define('DB_NAME', 'egytalk');

    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);

    return $db;
}

function postAll($db, $sqlkod, $fname, $lname, $username, $password)
{
    $stmt = $db->prepare($sqlkod);
    $stmt->bindValue(":fn", $fname, PDO::PARAM_STR);
    $stmt->bindValue(":ln", $lname, PDO::PARAM_STR);
    $stmt->bindValue(":user", $username, PDO::PARAM_STR);
    $stmt->bindValue(":pwd", $password, PDO::PARAM_STR);



    try {
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: text/html; charset=utf-8');
        return $rows;
    } catch (Exception $e) {
       return false;
    }
}
