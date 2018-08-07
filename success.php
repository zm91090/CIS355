<?php
session_start();
if(!isset($_SESSION)) {
		//prevents side door
		header("Location: login.php");
	}
?>
Success!