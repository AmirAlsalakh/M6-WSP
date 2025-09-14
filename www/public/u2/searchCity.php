<?php include('world/inc/dbFunctions.php');

if (isset($_POST['submit'])) {
    $submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_SPECIAL_CHARS);
    $sqlkod = "SELECT Name, Population FROM `city` WHERE Name LIKE :s ORDER BY Name";
    $db = dbConnect();
    $posts = postAll($db, $sqlkod, $submit);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <input type="text" name="submit" placeholder="Sök stad" required>
        <input type="submit" value="Sök">
    </form>

    <?php
    if (!empty($_POST)) {
        foreach ($posts as $post) {
            echo ('<p>Stadens namn är: ' . htmlspecialchars($post['Name']) . '</p>');
            echo ('<p>Stadens befolkning är: ' . htmlspecialchars($post['Population']) . '</p>');
        }
    }

    ?>
</body>
</html>