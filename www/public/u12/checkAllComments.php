<?php
include('egytalk/inc/dbFunctions.php');

$db = dbConnect();
$posts = getAllPostAndCommentsFromUid($db);

if ($posts) {
    echo json_encode("posts: ");
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(["error" => "Ingen Kommentar hittades"], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}
