<?php
	include("session.php");
?>

<html>
	<head>
		<title> Página Inicial - Cliente </title>
	</head>

	<body>

	<?php
		echo "Nome: <b>".$_SESSION['nome']."</b> <br/>";
		echo "Username: <b>".$_SESSION['username']."</b> <br/>";
	?>

		<a href='guia/index.php'>
			<img src="icon/shopping.png"/>
		</a>
		<a href='crud_cliente/update.php'>
			<img src="icon/pass.png"/>
		</a>
		<a href='crud_cliente/delete.php'>
			<img src="icon/cancel.png"/>
		</a>
		<a href='banco/index.php'> <img src="icon/banco.png"/> </a>
		<a href='login/logout.php'>
			<img src="icon/close.png"/>
		</a>
	</body>
</html>