<?php include('world/inc/dbFunctions.php');
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
    $sqlkod = "SELECT Name, Population, Code FROM `country` Where Name LIKE :name ORDER BY Name";
    $db = dbConnect();
    $stmt = $db->prepare($sqlkod);
    $stmt->bindValue(':name', $_GET['name'] . '%');
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');

    echo json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    ?>
</body>

</html>