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

function getUserFromUid($db, $uid)
{
    $sql = "SELECT username FROM user WHERE uid = :uid";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':uid', $uid);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['username'];
    } else {
        return false;
    }
}

function getChatFromUid($db, $uid)
{
    $sql = "SELECT * FROM post WHERE uid = :uid";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':uid', $uid);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $info;

    } else {
        return false;
    }
}