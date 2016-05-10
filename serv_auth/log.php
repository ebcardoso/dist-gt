<?php //usa o cliete soap
	include('lib/nusoap.php');	
	
	$cliente = new nusoap_client('http://localhost/dist-gt/serv_auth/serv_soap.php?wsdl');
	
	$username = $_POST['username'];
	$senha = $_POST['senha'];

	$parametros = array('username'=>$username, 'senha'=>$senha);
	$resultado = $cliente->call('login', $parametros);
	
	//echo utf8_encode($resultado);
?>