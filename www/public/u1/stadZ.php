<?php
include('world/inc/dbFunctions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Hej</p>
    <?php
    $sqlkod = "SELECT Name, Population FROM `city` WHERE Name LIKE 'Z%' ORDER BY Name ASC";
    $db = dbConnect();
    $posts = postAll($db, $sqlkod);

    foreach ($posts as $post) {
        echo ('<p>Stadens namn är: ' . htmlspecialchars($post['Name']) . '</p>');
        echo ('<p>Stadens befolkning är: ' . htmlspecialchars($post['Population']) . '</p>');
    }
    ?>
</body>

</html>