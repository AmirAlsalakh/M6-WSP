<?php
if (!empty($_POST)) {
    include('egytalk/inc/dbFunctions.php');

    if (isset($_POST["uid"])) {
        $uid = filter_input(INPUT_POST, "uid", FILTER_SANITIZE_SPECIAL_CHARS);
        $db = dbConnect();
        $posts = getPostAndCommentsFromUid($db, $uid);

        if ($posts) {
            echo json_encode("posts: ");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        } else {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(["error" => "Ingen användare med uid $uid hittades"], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
    }
}else{
    header("Location: searchUid.php");
}