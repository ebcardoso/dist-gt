<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<title>Banco</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css" />
	</head>

		<body>
		<div class="container">
			<section id="content">
				<h1>Banco</h1>

				<?php
					include('../../nusoap_lib/nusoap.php');	
					$cliente = new nusoap_client('http://localhost/dist-gt/banco/servidor.php?wsdl');

					session_start();
					$username = $_SESSION['username'];
					$parametros = array('user_titular'=>$username);
					$res = $cliente->call('ver_se_tem_conta', $parametros);

					if ($res > 0) {//quando a pessoa tem conta, mostra o saldo
						$res = $cliente->call('pegar_saldo', $parametros);
						echo "<p> Titular:".$username."<br/>Saldo: R$ ".number_format($res,2,',','.')."</p> <br/>";
					?>
					
					<div class="button">
					<?php
						echo "<p> <a href='extrato_da_conta.php'> Extrato </a>";
					?>
					</div>
					<div class="button">
					<?php
						echo "<a href='fazer_emprestimo.php'> Empréstimo </a>";
					?>
					</div>
					<div class="button">
					<?php
						echo "<a href='cancelar_conta.php?conta=".$username."'> Destruir Conta </a>";
					?>
					</div>
					<?php
					} else {
						echo "<p>Você ainda não possui uma conta </p> <br/>";
						echo "<div class=\"button\"> <a href='criar_conta.php'> Criar Conta </a> </div>";
					}
					echo "<div class=\"button\"> <a href='../indexCliente.php'> Voltar </div> <br/>";
				?>
			</section><!-- content -->
		</div><!-- container -->
	</body>
</html>