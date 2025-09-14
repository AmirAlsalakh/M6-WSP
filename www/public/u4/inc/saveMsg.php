<?php
include("../egytalk/inc/dbFunctions.php");
session_start();

if ($_SESSION['CSRFToken'] === $_POST['CSRFToken']) {

    $msg = $_POST['message'];
    $msg = htmlspecialchars($msg);
    
    $db = dbConnect();
    $stmt = $db->prepare("INSERT INTO post(uid, post_txt, date) VALUES (:uid , :post_txt, :date)");
    $stmt->bindValue(":uid", $_SESSION['uid']);
    $stmt->bindValue(":post_txt", $msg);
    $stmt->bindValue(":date", date("Y-m-d H:i:s"));
    $stmt->execute();

    header("location: ../index.php?page=klotterplank");
} else {
    header("location: ../blockerad.php");
}
