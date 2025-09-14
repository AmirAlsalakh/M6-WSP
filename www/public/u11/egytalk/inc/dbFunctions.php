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

function getUserFromUid($db)
{
    $sql = "SELECT username FROM user";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['username'];
    } else {
        return false;
    }
}

function getAllPostAndCommentsFromUid($db)
{
    $sql = "SELECT post.* , user.firstname , user.surname, user.username FROM post NATURAL JOIN user";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($infos as &$info) {
            $sqlComments = "SELECT comment.*, user.firstname, user.surname, user.username FROM comment JOIN user ON comment.uid = user.uid WHERE comment.pid = :pid";
            $stmtC = $db->prepare($sqlComments);
            $stmtC->bindValue(':pid', $info['pid']);
            $stmtC->execute();
            $comments = $stmtC->fetchAll(PDO::FETCH_ASSOC);

            $info['comments'] = $comments;
        }

        return $infos;
    } else {
        return false;
    }
}