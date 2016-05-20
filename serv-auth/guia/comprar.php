<html>
	<head> <title> Confirmar Compra </title> </head>
	<body>
		<h1> Compra Efetuada Com Sucesso </h1>
		<?php
			include('../../nusoap_lib/nusoap.php');	
			$cliente = new nusoap_client('http://localhost/dist-gt/guia/servidor.php?wsdl');

			//registrando no servidor do guia
			$id = $_GET['passeio'];
			session_start();
			$username = $_SESSION['username'];
			$parametros = array('id_passeio'=>$id, 'username'=>$username);				

			$cliente->call('registrarCompra', $parametros);

			//registrando no servidor do banco
			$cliente2 = new nusoap_client('http://localhost/dist-gt/banco/servidor.php?wsdl');
			$valor = $_GET['valor'];
			$parametros = array('user_titular'=>$username, 'valor'=>$valor, 'descricao'=>'Compra do Guia');		
			$cliente2->call('fazer_pagamento', $parametros);
		?>
	</body>
</html>