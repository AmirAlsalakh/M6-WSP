<?php

include('egytalk/inc/dbFunctions.php');

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username']) && isset($_POST['password'])) {
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sqlkod = "INSERT INTO user(uid, firstname, surname, username, password) VALUES(UUID(), :fn, :ln,:user,:pwd)";
    $db = dbConnect();
    $stmt = $db->prepare($sqlkod);
    $stmt->bindValue(":fn", $fname, PDO::PARAM_STR);
    $stmt->bindValue(":ln", $lname, PDO::PARAM_STR);
    $stmt->bindValue(":user", $username, PDO::PARAM_STR);
    $stmt->bindValue(":pwd", $password, PDO::PARAM_STR);

    try {
        $stmt->execute();
        header('Location: createUser.php');

    } catch (Exception $e) {
        header('Content-Type: text/html; charset=utf-8');
        echo "<p>Kunde inte lägga till användaren. Kontrollera användarnamnet</p>";
        echo "<a href = 'createUser.php'>Försök igen</a>";
    }
}