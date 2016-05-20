<html>
<head> <title> Cancelar Conta </title> </head>

<body>

<?php
	include('lib/nusoap.php');	
	$cliente = new nusoap_client('http://localhost/banco/servidor.php?wsdl');
	$username = $_GET['conta'];
	$parametros = array('user_titular'=>$username);
	$res = $cliente->call('cancelar_conta', $parametros);
?>
<p> <a href="index.php"> Conta Cancelada Com Sucesso </a> </p>

</body>
</html>