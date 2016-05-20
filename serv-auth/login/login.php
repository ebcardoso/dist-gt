<?php
	include('../mysql/mysql.php');

	$login = $_POST['username'];
	$senha = $_POST['senha'];			
			
	$sql = mysql_query("SELECT * FROM cliente WHERE username_cliente = '$login' and senha_cliente = '$senha'") or die(mysql_error());
	$row = mysql_num_rows($sql);
	$res = mysql_fetch_array($sql);
			
	if ($row > 0) {
		session_start();
		$_SESSION["nome"] = $res["nome_cliente"];
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