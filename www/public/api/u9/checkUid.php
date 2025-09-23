<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../inc/model/DbEgyTalk.php';


if (isset($_POST["uid"]) && !empty($_POST["uid"])) {
    $uid = filter_input(INPUT_POST, "uid", FILTER_SANITIZE_SPECIAL_CHARS);

    $DbEgyTalk = new DbEgyTalk;
    
    $posts = $DbEgyTalk->getChatFromUid($uid);

    if ($posts) {
        //echo json_encode("posts: ");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($username, JSON_UNESCAPED_UNICODE);
    } else {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["error" => "Ingen användare med uid $uid hittades"], JSON_UNESCAPED_UNICODE);
    }
} else {
    header('location: searchUid.php');
}