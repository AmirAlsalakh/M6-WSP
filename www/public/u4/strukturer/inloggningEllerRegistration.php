<!doctype html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <title>Logga in eller Registrera</title>
    <link href="css/styleSheet.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        <header>
            <?php
            include("inc/header.php");
            ?>
        </header>
        <!-- header -->

        <section id="leftColumn">
            <nav>
                <?php
                include("inc/meny.php");
                ?>
            </nav>
            <aside>
                <?php
                include("inc/aside.php");
                ?>
            </aside>
        </section>
        <!-- End leftColumn -->

        <main>
            <section>
                <?php
                include("inc/start.php");

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
                    case "login":
                        include("inc/inloggning.php");
                        break;
                    case "registration":
                        include("inc/registration.php");
                        break;
                    case "userCheck":
                        include("inc/userCheck.php");
                        break;
                    default:
                        include('pages/hem.php');
                }
                ?>

            </section>
        </main>

        <footer>
            <?php
            include("inc/footer.php");
            ?>
        </footer>
    </div>
</body>

</html>