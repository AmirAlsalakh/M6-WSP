<?php
include $_SERVER['DOCUMENT_ROOT'] . '/../inc/model/DbWorld.php';

if (!empty($_GET)) {
    $name = $_GET['name'];
    $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
    $DbWorld = new DbWorld;
    $posts = $DbWorld->getCountryByText($name);
    header('Content-Type: application/json');

    echo json_encode($posts, JSON_UNESCAPED_UNICODE);
}
