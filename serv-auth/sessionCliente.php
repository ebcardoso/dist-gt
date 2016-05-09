<?php
	session_start();
	
	if(!isset($_SESSION["username"]) || !isset($_SESSION["senha"])) {
		header("Location: index.php");
		exit;
	} else {
		echo "   ";
	}
?>