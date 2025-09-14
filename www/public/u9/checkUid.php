<?php

include('egytalk/inc/dbFunctions.php');

if (isset($_POST["uid"])) {
    $uid = filter_input(INPUT_POST, "uid", FILTER_SANITIZE_SPECIAL_CHARS);
    $db = dbConnect();
    $username = getChatFromUid($db, $uid); 

    if ($username) {
        echo json_encode("posts: ");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($username, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    } else {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["error" => "Ingen användare med uid $uid hittades"]);
    }
}
