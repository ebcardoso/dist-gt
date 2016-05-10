<?php
	include('lib/nusoap.php');
	
	$servidor = new nusoap_server();	
	$servidor->configureWSDL('urn:Serv_soap');
	$servidor->wsdl->schemaTargetNamespace = 'urn:Serv_soap';	
	
	//functions
	function logar($username, $senha) {
		echo("\n Cheguei Aqui \n");

		error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
		$conexao = mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("bd_auth") or die(mysql_error());

		$sql = mysql_query("SELECT * FROM cliente WHERE username_cliente = ".$username." and senha_cliente = ".$senha) or die(mysql_error());
		$row = mysql_num_rows($sql);
	
		return $row;
	}
	
	function logoff() {
		session_start();
		session_destroy();
		header("Location: ../../index.php");
	}

	$servidor->register(
		'logar',
		array('username'=>'xsd:string', 'senha'=>'xsd:string'),
		array('retorno'=>'xsd:integer')
	);

	/*$servidor->register(
		'logoff',
		array(),
		array(),
		'urn:serv_soap.logoff',
		'urn:serv_soap.logoff',
		'rpc',
		'encoded',
		'NuSOAP PHP.'
	);*/
	
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$servidor->service($HTTP_RAW_POST_DATA);

?>