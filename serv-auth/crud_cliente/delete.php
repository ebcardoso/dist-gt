<?php
	include('../mysql/mysql.php');

	session_start();
	$login = $_SESSION["username"];
			
	mysql_query("DELETE FROM cliente WHERE username_cliente = '$login'") or die(mysql_error());

	header("Location: comSucessoContaDeletada.php");
?>