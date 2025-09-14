<?php
include("metoder/saveMetod.php");

if (!empty($_POST)) {
    $fname = $_POST["fname"] ?? "";
    $lname = $_POST["lname"] ?? "";
    $uname = $_POST["uname"] ?? "";
    $password = $_POST["password"] ?? "";

    $user = new User($fname, $lname, $uname, $password);
    $user->save();

    echo "<p>Användaren har sparats!</p>";
}
?>

<body>
    <?php
    include("metoder/regForm.php");
    ?>
</body>
</body>