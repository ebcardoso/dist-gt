<?php
	include('../nusoap_lib/nusoap.php');

	$servidor = new nusoap_server();	
	$servidor->configureWSDL('urn:Servidor');
	$servidor->wsdl->schemaTargetNamespace = 'urn:Servidor';	
	
	//conexão com o mysql
	$host = "localhost";
	$user = "root";
	$pass = "";
	$banco = "bd_banco";

	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
	mysql_select_db($banco) or die(mysql_error());
	//---------------------------------

	function criarConta($user_titular, $saldo){
		$query = "INSERT INTO conta (user_titular, saldo) values ('$user_titular', '$saldo')";
		$chamada = mysql_query($query) or die (mysql_error());
	}	
	$servidor->register(
		'criarConta',
		array('user_titular'=>'xsd:string', 'saldo'=>'xsd:float')
	);

	//ver se a pessoa tem ou não uma conta cadastrada no sistema
	//se sim, a variavel resultado vai ser maior que zero
	function ver_se_tem_conta($user_titular) {
		$chamada = mysql_query("SELECT * FROM conta WHERE user_titular = '$user_titular'") or die (mysql_error());
		$resultado = mysql_num_rows($chamada);
		return($resultado);
	}
	$servidor->register(
		'ver_se_tem_conta',
		array('user_titular'=>'xsd:string'),
		array('retorno'=>'xsd:int')
	);
	
	function pegar_saldo($user_titular) {
		$consulta = "SELECT saldo FROM conta WHERE user_titular = '$user_titular'";
		$chamada = mysql_query($consulta) or die (mysql_error());
		$dados = mysql_fetch_array($chamada);
		$saldo = $dados['saldo'];
		return($saldo);
	}
	$servidor->register(
		'pegar_saldo',
		array('user_titular'=>'xsd:string'),
		array('retorno'=>'xsd:int')
	);

	function cancelar_conta($user_titular) {
		$consulta = "DELETE FROM conta WHERE user_titular = '$user_titular'";
		$exec = mysql_query($consulta) or die (mysql_error());
	}
	$servidor->register(
		'cancelar_conta',
		array('user_titular'=>'xsd:string')
	);

	function extrato_das_movimentacoes($user_titular) {
		$consulta = "SELECT * FROM conta co, movimentacao mov WHERE co.id_conta = mov.id_conta AND co.user_titular = '$user_titular'";
		$exec = mysql_query($consulta) or die (mysql_error());

		$rows = Array();
		while($row = mysql_fetch_array($exec)){
			array_push($rows, $row);
		}
		return($rows);
	}
	$servidor->register(
		'extrato_das_movimentacoes',
		array('user_titular'=>'xsd:string'),
		array('retorno'=>'xsd:Array')
	);

	function extrato_dos_emprestimos($user_titular) {
		$consulta = "SELECT * FROM conta co, emprestimo emp WHERE co.id_conta = emp.id_conta AND co.user_titular = '$user_titular'";
		$exec = mysql_query($consulta) or die (mysql_error());

		$rows = Array();
		while($row = mysql_fetch_array($exec)){
			array_push($rows, $row);
		}
		return($rows);
	}
	$servidor->register(
		'extrato_dos_emprestimos',
		array('user_titular'=>'xsd:string'),
		array('retorno'=>'xsd:Array')
	);

	function fazer_emprestimo($user_titular, $valor) {
		//incrementar o saldo
		$exec = mysql_query("UPDATE conta SET saldo=saldo+'$valor' WHERE user_titular = '$user_titular'") or die (mysql_error());

		//pegar o id no banco de dados
		$exec = mysql_query("SELECT * FROM conta WHERE user_titular = '$user_titular'") or die (mysql_error());
		$dados = mysql_fetch_array($exec);
		$id = $dados['id_conta'];

		//registrar o empréstimo
		$consulta = "INSERT INTO emprestimo (valor, dia, id_conta) values ('$valor', now(), '$id')";
		$exec = mysql_query($consulta) or die (mysql_error());
	}
	$servidor->register(
		'fazer_emprestimo',
		array('user_titular'=>'xsd:string', 'valor'=>'xsd:float')
	);

	function fazer_pagamento($user_titular, $valor, $descricao) {
		//decrementar o saldo
		$exec = mysql_query("UPDATE conta SET saldo=saldo-'$valor' WHERE user_titular = '$user_titular'") or die (mysql_error());

		//pegar o id no banco de dados
		$exec = mysql_query("SELECT * FROM conta WHERE user_titular = '$user_titular'") or die (mysql_error());
		$dados = mysql_fetch_array($exec);
		$id = $dados['id_conta'];

		//registrar o pagamento
		$consulta = "INSERT INTO movimentacao (id_conta, valor, dia, descricao) values ('$id', '$valor', now(), '$descricao')";
		$exec = mysql_query($consulta) or die (mysql_error());
	}
	$servidor->register(
		'fazer_pagamento',
		array('user_titular'=>'xsd:string', 'valor'=>'xsd:float', 'descricao'=>'xsd:string')
	);

	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$servidor->service($HTTP_RAW_POST_DATA);
?>