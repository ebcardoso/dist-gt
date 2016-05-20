<?php
	include('../nusoap_lib/nusoap.php');
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

	//retornar todos os passeios de um guia
	$servidor->register(
		'getPasseiosGuia',
		array('id_guia'=>'xsd:int'),
		array('retorno'=>'xsd:Array')
	);

	//retornar todos os pontos de um passeio
	$servidor->register(
		'getPontosPasseio',
		array('id_passeio'=>'xsd:int'),
		array('retorno'=>'xsd:Array')
	);

	//retornar todos os dados de um passeio
	$servidor->register(
		'getDadosPasseio',
		array('id_passeio'=>'xsd:int'),
		array('retorno'=>'xsd:Array')
	);

	//retorna os passeios até aquela data
	$servidor->register(
		'getPasseiosData',
		array('$data'=>'xsd:string'),
		array('retorno'=>'xsd:Array')
	);

	//retornar o nome do guia de um passeio
	$servidor->register(
		'getGuiaDoPasseio',
		array('id_passeio'=>'xsd:int'),
		array('retorno'=>'xsd:string')
	);

	//retornar o e-mail do guia de um passeio
	$servidor->register(
		'getEmailGuia',
		array('id_passeio'=>'xsd:int'),
		array('retorno'=>'xsd:string')
	);

	//retornar todos os guias
	$servidor->register(
		'getAllGuias',
		array('i'=>'xsd:string'),
		array('retorno'=>'xsd:Array')
	);

	//registrar compra
	$servidor->register(
		'registrarCompra',
		array('id_passeio'=>'xsd:int', 'username'=>'xsd:string')
	);
	
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$servidor->service($HTTP_RAW_POST_DATA);
?>