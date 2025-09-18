<?php 
include('world/inc/dbFunctions.php');

$sqlkod = "SELECT Name, Population, Code FROM `country` ORDER BY Name";
$db = dbConnect();
$posts = postAll($db, $sqlkod);

header('Content-Type: application/json');

echo json_encode($posts, JSON_UNESCAPED_UNICODE ); // | JSON_PRETTY_PRINT
