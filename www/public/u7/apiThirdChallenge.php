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

    $sqlkod = "SELECT country.name, country.Code, city.Name, city.Population FROM country JOIN city ON country.Code = city.CountryCode WHERE country.Code LIKE :code ORDER BY city.Name  ASC";
    $db = dbConnect();
    $stmt = $db->prepare($sqlkod);
    $stmt->bindValue(':code', $_POST["Kod"]);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');

    echo json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    ?>
</body>

</html>