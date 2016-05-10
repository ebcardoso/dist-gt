<?php //usa o cliete soap
	include('lib/nusoap.php');

	$cliente = new nusoap_client('http://localhost/dist-gt/serv_auth/serv_soap.php?wsdl');
	$parametros = array('username'=>$_POST['username'], 'senha'=>$_POST['senha']);
	$resultado = $cliente->call('logar', $parametros);

	echo "Resultado: ".$resultado;

	/*if ($resultado > 0) {
		session_start();
			$_SESSION["username"] = $_POST['username'];
			$_SESSION["senha"] = $_POST['username'];
		echo "<center>você foi autenticado com sucesso....</center>";
		header("Location: indexCliente.php");
	} else {
		echo "<center>você não foi autenticado com suecsso....</center><br/>".$resultado;
		header("Location: ../index.php");
	}*/
?>