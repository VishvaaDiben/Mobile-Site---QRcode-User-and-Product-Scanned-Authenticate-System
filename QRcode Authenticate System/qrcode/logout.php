<?php
session_start();
if(!isset($_SESSION["user"]))
	die("Session not Valid, Please log in");

session_destroy();

header("Location: index.php");

?>