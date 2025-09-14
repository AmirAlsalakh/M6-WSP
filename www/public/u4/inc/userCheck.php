<?php
include("metoder/userMetod.php");

$message = "";
if (!empty($_POST)) {
    $username = $_POST['username'] ?? "";

    $auth = new UserAuth();
    $user = $auth->username($username);
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

if (isset($user)) {
    if ($user) {
        echo "<p style='color:green'>Användaren finns</p>";
    } else {
        echo "<p style='color:red'>Användaren finns inte</p>";
    }
}
?>

<body>
    <?php
    include("metoder/userForm.php");
    ?>
</body>