<?php
	function login($login, $senha) {
		error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
		$conexao = mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("bd_auth") or die(mysql_error());

		$sql = mysql_query("SELECT * FROM cliente WHERE username_cliente = '$login' and senha_cliente = '$senha'") or die(mysql_error());
		$row = mysql_num_rows($sql);
				
		if ($row > 0) {
			session_start();
			$_SESSION["username"] = $login;
			$_SESSION["senha"] = $senha;
			echo "<center>você foi autenticado com sucesso....</center>";
			header("Location: ../indexCliente.php");
		} else {
			echo "<center>você não foi autenticado com suecsso....</center>";
			header("Location: ../../index.php");
		}
	}
	
	function logoff() {
		session_start();
		session_destroy();
		header("Location: ../../index.php");
	}
?>

<html>
	<head>
		<title> Página de Login e Logoff </title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	</head>
	
	<body>
		
	</body>
</html>