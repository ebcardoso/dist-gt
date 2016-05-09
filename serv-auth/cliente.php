<?php
	include('lib/nusoap.php');	
	
	$cliente = new nusoap_client('http://localhost/dist-gt/servidor.php?wsdl');	
	
	$parametros = array('nome'=>'Breno', 'idade'=>22);		
	$resultado = $cliente->call('exemplo', $parametros);
	
	echo utf8_encode($resultado);
	
?>