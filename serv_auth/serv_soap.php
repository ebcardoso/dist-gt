<?php
	include('lib/nusoap.php');
	include('cliente/auth.php');
	
	$servidor = new nusoap_server();	
	$servidor->configureWSDL('urn:Servidor');
	$servidor->wsdl->schemaTargetNamespace = 'urn:Servidor';	
	
	$servidor->register(
		'login',
		array('username'=>'xsd:string',
				'senha'=>'xsd:string'),
		array('retorno'=>'xsd:boolean'),
		'urn:Servidor.exemplo',
		'urn:Servidor.exmeplo',
		'rpc',
		'encoded',
		'NuSOAP PHP.'
	);

	/*$servidor->register(
		'logoff',
		array(),
		array(),
		'urn:Servidor.exemplo',
		'urn:Servidor.exmeplo',
		'rpc',
		'encoded',
		'NuSOAP PHP.'
	);*/
	
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$servidor->service($HTTP_RAW_POST_DATA);
?>