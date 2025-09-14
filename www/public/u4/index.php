<?php
session_start();
$_SESSION['CSRFToken'] = bin2hex(random_bytes(32));

if (isset($_SESSION['inloggad'])) {
	include("strukturer/inloggad.php");
} else {
	include("strukturer/inloggningEllerRegistration.php");
}
?>