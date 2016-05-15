<?php
	include('lib/nusoap.php');
	include('func/functions.php');
	
	$servidor = new nusoap_server();	
	$servidor->configureWSDL('urn:Servidor');
	$servidor->wsdl->schemaTargetNamespace = 'urn:Servidor';	
	
	//função teste
	$servidor->register(
		'exemplo',
		array('nome'=>'xsd:string', 'idade'=>'xsd:int'),
		array('retorno'=>'xsd:string')
	);

	//retornar todas as cidades
	$servidor->register(
		'getCities',
		array('a'=>'xsd:string'),
		array('retorno'=>'xsd:Array')
	);

	//retornar todos os passeios de uma cidade
	$servidor->register(
		'getPasseiosCidade',
		array('id_cidade'=>'xsd:int'),
		array('retorno'=>'xsd:Array')
	);

	//retornar todos os passeios de uma cidade
	$servidor->register(
		'getPontosPasseio',
		array('id_passeio'=>'xsd:int'),
		array('retorno'=>'xsd:Array')
	);
	
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$servidor->service($HTTP_RAW_POST_DATA);
?>