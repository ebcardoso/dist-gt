<?php	
	$host = "localhost";
	$user = "root";
	$pass = "";
	$banco = "bd_auth";
	
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
	mysql_select_db($banco) or die(mysql_error());
?>