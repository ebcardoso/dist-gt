<?php
	include('../mysql/mysql.php');

	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];	
			
	session_start();
	$login_atual = $_SESSION['username'];

	if (strcmp($pass1, $pass2) == 0) {
		mysql_query("UPDATE cliente set senha_cliente='$pass1' WHERE username_cliente='$login_atual'") or die(mysql_error());

		header("Location: comSucessoSenhaAlterada.php");
	} else {
		echo "As senhas Diferem";
	}
?>