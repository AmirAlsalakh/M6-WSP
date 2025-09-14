<?php
include("egytalk/inc/dbFunctions.php");
?>

<body>
    <h1>Klotterplanket</h1>
    <section>
        <?php include("klotterForm.php"); ?>
    </section>
    <?php
    $db = dbConnect();
    $sqlkod = "SELECT post.* , user.firstname, user.surname, user.username FROM post NATURAL JOIN user ORDER BY date DESC";
    $stmt = $db->prepare($sqlkod);
    $stmt->execute();

    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: text/html; charset=utf-8');

    foreach ($posts as $post) {
        echo "<article>";
        echo "<p><strong>". $post['username'] . " " . $post['firstname'] . " " .$post['surname'] . "</strong></p>";
        echo "<p>" . $post['post_txt'] . "</p>";
        echo "<p class='time'><time>" . $post['date'] . "<time></p>";
        echo "<section>";
        echo "</section>";
        echo "</article>";
    }
    ?>
    
</body>