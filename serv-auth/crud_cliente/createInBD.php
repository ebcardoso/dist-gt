<?php
	include('../mysql/mysql.php');

	$name = $_POST['name'];
	$login = $_POST['username'];
	$pass = $_POST['pass'];			
			
	mysql_query("INSERT INTO cliente (nome_cliente, username_cliente, senha_cliente) values ('$name', '$login', '$pass')") or die(mysql_error());

	header("Location: cadastradoComSucesso.php");
?>