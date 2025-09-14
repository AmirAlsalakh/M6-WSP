<?php
include("metoder/logInMetod.php");

$message = "";
if (!empty($_POST)) {
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";

    $auth = new UserAuth();
    $user = $auth->login($uname, $password);

    if ($username) {
        header("Location: index.php");
    } else {
        header("Location: index.php?page=login");
    }
}
?>
    <?php
    $page = "hem";
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

    switch ($page) {
        case "blogg":
            include("pages/blogg.php");
            break;
        case "bilder":
            include("pages/bilder.php");
            break;
        case "kontakt":
            include("pages/kontakt.php");
            break;
        default:
            include('pages/hem.php');
    }
    ?>
<body>
    <?php
    include("metoder/logForm.php");
    ?>
</body>