<?php

/**
 * Instans av klassen skapar en koppling till databasen egytalk
 * och tillhandahåller ett antal metoder för att hämta och manipulera
 * data i databasen.
 *
 */
class DbEgyTalk
{

    public function __construct()
    {
        // Definierar konstanter med användarinformation.
        define('DB_USER', 'egytalk');
        define('DB_PASSWORD', '12345');
        define('DB_HOST', 'mariadb');
        define('DB_NAME', 'egytalk');
        // Skapar en anslutning till MySql och databasen world
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        $this->db = new PDO($dsn, DB_USER, DB_PASSWORD);
    }

    function getUserFromUid($uid)
    {
        $sql = "SELECT username FROM user WHERE uid = :uid";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':uid', $uid);
        $stmt->execute();

        $user = [];

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user['username'];
        } else {
            return $user;
        }
    }

    function getChatFromUid($uid)
    {
        $sql = "SELECT * FROM post WHERE uid = :uid";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':uid', $uid);

        $stmt->execute();
        $info = [];

        if ($stmt->rowCount() > 0) {
            $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $info;
        } else {
            return $info;
        }
    }

    function getPostAndCommentsFromUid($uid)
    {
        $sql = "SELECT post.* , user.firstname , user.surname, user.username FROM post NATURAL JOIN user WHERE uid = :uid";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':uid', $uid);
        $stmt->execute();

        $infos = [];

        if ($stmt->rowCount() > 0) {

            $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($infos as &$info) {
                $sqlComments = "SELECT comment.*, user.firstname, user.surname, user.username FROM comment JOIN user ON comment.uid = user.uid WHERE comment.pid = :pid";
                $stmtC = $this->db->prepare($sqlComments);
                $stmtC->bindValue(':pid', $info['pid']);
                $stmtC->execute();
                $comments = $stmtC->fetchAll(PDO::FETCH_ASSOC);

                $info['comments'] = $comments;
            }

            return $infos;
        } else {
            return $infos;
        }
    }

    function getAllPostAndCommentsFromUid()
    {
        $stmt = $this->db->prepare("SELECT `post`.* , `user`.`firstname` , `user`.`surname`, `user`.`username` FROM `post` NATURAL JOIN `user`");
        $stmt->execute();

        $infos = [];
        if ($stmt->rowCount() > 0) {

            $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($infos as &$info) {
                $sqlComments = "SELECT comment.*, user.firstname, user.surname, user.username FROM comment JOIN user ON comment.uid = user.uid WHERE comment.pid = :pid";
                $stmtC = $this->db->prepare($sqlComments);
                $stmtC->bindValue(':pid', $info['pid']);
                $stmtC->execute();
                $comments = $stmtC->fetchAll(PDO::FETCH_ASSOC);

                $info['comments'] = $comments;
            }

            return $infos;
        } else {
            return $infos;
        }
    }

    function getAllPostAndCommentsAndDateOrderedFromUid()
    {
        $stmt = $this->db->prepare("SELECT post.* , user.firstname , user.surname, user.username FROM post NATURAL JOIN user ORDER BY post.date DESC");
        $stmt->execute();

        $infos = [];
        if ($stmt->rowCount() > 0) {

            $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($infos as &$info) {
                $sqlComments = "SELECT comment.*, user.firstname, user.surname, user.username FROM comment JOIN user ON comment.uid = user.uid WHERE comment.pid = :pid ORDER BY comment.date DESC";
                $stmtC = $this->db->prepare($sqlComments);
                $stmtC->bindValue(':pid', $info['pid']);
                $stmtC->execute();
                $comments = $stmtC->fetchAll(PDO::FETCH_ASSOC);

                $info['comments'] = $comments;
            }
            return $infos;
        } else {
            return $infos;
        }
    }
}