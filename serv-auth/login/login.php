<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$banco = "bd_auth";

	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
	mysql_select_db($banco) or die(mysql_error());

	$login = $_POST['username'];
	$senha = $_POST['senha'];			
			
	$sql = mysql_query("SELECT * FROM cliente WHERE username_cliente = '$login' and senha_cliente = '$senha'") or die(mysql_error());
	$row = mysql_num_rows($sql);
			
	if ($row > 0) {
		session_start();
		$_SESSION["username"] = $_POST['username'];
		$_SESSION["senha"] = $_POST['senha'];
		echo "<center>você foi autenticado com sucesso....</center>";
		header("Location: ../indexCliente.php");
	} else {
		echo "<center>você não foi autenticado com suecsso....</center>";
		header("Location: ../index.php");
	}
?>

<html>
	<head>
		<title> Página de Login </title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	</head>
	
	<body>
		
	</body>
</html>