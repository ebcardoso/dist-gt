<html>
	<head>
		<title>
			Página de Login
		</title>
	</head>
	
	<body>
		<h1> Index Banco </h1>

		<?php
			include('../../nusoap_lib/nusoap.php');	
			$cliente = new nusoap_client('http://localhost/dist-gt/banco/servidor.php?wsdl');

			session_start();
			$username = $_SESSION['username'];
			$parametros = array('user_titular'=>$username);
			$res = $cliente->call('ver_se_tem_conta', $parametros);

			if ($res > 0) {//quando a pessoa tem conta, mostra o saldo
				$res = $cliente->call('pegar_saldo', $parametros);
				echo "<p> Titular:".$username."<br/>Saldo: R$ ".number_format($res,2,',','.')."</p>";
				echo "<p> <a href='cancelar_conta.php?conta=".$username."'> Destruir Conta </a> </p>";
				echo "<p> <a href='fazer_emprestimo.php'> Empréstimo </a>";
				echo "<p> <a href='extrato_da_conta.php'> Extrato </a>";
			} else {
				echo "<p>Você ainda não possui uma conta</p>";
				echo "<p> <a href='criar_conta.php'> Criar Conta </a> </p>";
			}
			echo "<p> <a href='../indexCliente.php'> Voltar </a>";
		?>
	</body>
</html>