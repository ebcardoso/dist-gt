<html>
	<head>
		<title> Página de Login </title>
	</head>
	
	<body>
		
<?php		
	include('../../nusoap_lib/nusoap.php');	
	$cliente = new nusoap_client('http://localhost/dist-gt/banco/servidor.php?wsdl');

	session_start();
	$username = $_SESSION['username'];
	$valor = $_POST['valor'];
	$parametros = array('user_titular'=>$username, 'valor'=>$valor);
	$cliente->call('fazer_emprestimo', $parametros);
?>

<p> <a href="index.php"> Empréstimo Feito Com Sucesso </a> </p>

	</body>
</html>