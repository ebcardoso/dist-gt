<html>
	<head> <title> Confirmar Compra </title> </head>
	<body>
		<h1> Compra Efetuada Com Sucesso </h1>
		<?php
			include('lib/nusoap.php');	
			$cliente = new nusoap_client('http://localhost/guia/servidor.php?wsdl');

			//dados pra passar	
			$id = $_GET['passeio'];
			session_start();
			$username = $_SESSION['username'];
			$parametros = array('id_passeio'=>$id, 'username'=>$username);				

			$cliente->call('registrarCompra', $parametros);

			//------------
			$cliente2 = new nusoap_client('http://localhost/banco/servidor.php?wsdl');
			$valor = $_GET['valor'];
			$parametros = array('user_titular'=>$username, 'valor'=>$valor, 'descricao'=>'Compra do Guia');		
			$cliente2->call('fazer_pagamento', $parametros);
		?>
	</body>
</html>