<?php
if (!empty($_POST)) {
    include $_SERVER['DOCUMENT_ROOT'] . '/../inc/model/DbEgyTalk.php';

    if (isset($_POST["uid"]) && !empty($_POST["uid"])) {

        $uid = $_POST["uid"];

        $uid = filter_var($uid, FILTER_SANITIZE_SPECIAL_CHARS);

        $DbEgyTalk = new DbEgyTalk;
        $posts = $DbEgyTalk->getPostAndCommentsFromUid($uid);

        if ($posts) {
            //echo json_encode("posts: ");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($posts, JSON_UNESCAPED_UNICODE);
        } else {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(["error" => "Ingen användare med uid $uid hittades"], JSON_UNESCAPED_UNICODE);
        }
    }
} else {
    header("Location: searchUid.php");
}