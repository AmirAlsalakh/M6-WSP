<?php
if (!isset($_SESSION['inloggad'])) {
	header("Location: index.php");
}
?>
<!doctype html>
<html lang="sv">

<head>
	<meta charset="utf-8">
	<title>Du är inloggad</title>
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
				include("inc/meny2.php");
				?>
			</nav>
			<aside>
				<?php
				include("inc/aside.php");
				?>
			</aside>
		</section>

		<p>Hej: <?php echo ($_SESSION["username"]); ?></p>
		<p>Ditt namn är: <?php echo ($_SESSION["name"]); ?></p>
		<p>Du har id: <?php echo ($_SESSION["uid"]); ?></p>

		<p>Logga ut:</p>
		<a href="metoder/logout.php">här</a>

		<main>
				<?php
				include("inc/start.php");

				$page = "hem";
				if (isset($_GET["page"])) {
					$page = $_GET["page"];
				}

				switch ($page) {
					case "blogg":
						include("pages/blogg2.php");
						break;
					case "bilder":
						include("pages/bilder2.php");
						break;
					case "kontakt":
						include("pages/kontakt2.php");
						break;
					case "klotterplank":
						include("inc/klotterplank.php");
						break;
					case "userCheck":
						include("inc/userCheck.php");
						break;
					default:
						include('pages/hem2.php');
				}
				?>
		</main>