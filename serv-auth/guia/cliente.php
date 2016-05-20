<?php
	// http://www.thiengo.com.br
	// Por: Vinícius Thiengo
	// Em: 25/11/2013
	// Versão: 1.0
	// cliente.php
	include('../../nusoap_lib/nusoap.php');
	
	
	$cliente = new nusoap_client('http://localhost/dist-gt/guia/servidor.php?wsdl');
	
	
	$parametros = array('nome'=>'Breno',
						'idade'=>22);
						
		
	$resultado = $cliente->call('exemplo', $parametros);
	
	echo utf8_encode($resultado);
	
?>