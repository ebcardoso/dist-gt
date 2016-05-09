<?php
	include('lib/nusoap.php');	
	
	$servidor = new nusoap_server();	
	$servidor->configureWSDL('urn:Servidor');
	$servidor->wsdl->schemaTargetNamespace = 'urn:Servidor';	
	
	function exemplo($nome, $idade){
		return($nome.' -> '.$idade);
	}
	
	
	$servidor->register(
		'exemplo',
		array('nome'=>'xsd:string',
				'idade'=>'xsd:int'),
		array('retorno'=>'xsd:string'),
		'urn:Servidor.exemplo',
		'urn:Servidor.exmeplo',
		'rpc',
		'encoded',
		'Apenas um exemplo utilizando o NuSOAP PHP.'
	);	
	
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$servidor->service($HTTP_RAW_POST_DATA);
?>