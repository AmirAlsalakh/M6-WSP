<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../inc/model/DbEgyTalk.php';

if (!empty($_POST)) {
    $DbEgyTalk = new DbEgyTalk;
    $posts = $DbEgyTalk->getAllPostAndCommentsAndDateOrderedFromUid();

    if ($posts) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($posts, JSON_UNESCAPED_UNICODE);
    } else {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["error" => "Ingen Kommentar hittades"], JSON_UNESCAPED_UNICODE);
    }
}else{
    header('location: searchUid.php');
}
