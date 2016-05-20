<html>
	<head>
		<title> Página de Login </title>
	</head>
	
	<body>
		
<?php		
	include('lib/nusoap.php');	
	$cliente = new nusoap_client('http://localhost/banco/servidor.php?wsdl');

	session_start();
	$username = $_SESSION['username'];
	$saldo = $_POST['saldo'];
	$parametros = array('user_titular'=>$username, 'saldo'=>$saldo);
	$cliente->call('criarConta', $parametros);
?>

<p> <a href="index.php"> Conta Criada Com Sucesso </a> </p>

	</body>
</html>