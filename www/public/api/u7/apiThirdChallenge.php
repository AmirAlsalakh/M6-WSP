<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../inc/model/DbWorld.php';

if (!empty($_POST)) {
    $code = $_POST['kod'];
    $code = filter_var($code, FILTER_SANITIZE_SPECIAL_CHARS);

    $DbWorld = new DbWorld;
    $posts = $DbWorld->codeCountry($code);

    if ($posts) {
        header('Content-Type: application/json');

        echo json_encode($posts, JSON_UNESCAPED_UNICODE);
    } else {
        header('Content-Type: text/html; charset=utf-8');
        echo "<p> Hittade inte ett land med en sådan kod </p>";
        echo "<p> Fösök igen </p>" . "<a href = 'writeCode.php'>Här</a>";
    }
} else {
    header('location: writeCode.php');
}