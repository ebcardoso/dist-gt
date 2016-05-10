<?php
	include("auth/sessionCliente.php");
?>

<html>
	<head> <title> Logout </title> </head>
	<body>
		<a href='login/logout.php'> Sair (<?php echo $_SESSION["username"]; ?>) </a>
	</body>
</html>