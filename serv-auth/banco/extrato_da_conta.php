<html>
<head> <title> Extrato da Conta </title> </head>

<body>
	<h1> Extrato da Conta </h1>

	<?php
		include('lib/nusoap.php');	
		$cliente = new nusoap_client('http://localhost/banco/servidor.php?wsdl');	
		
		session_start();
		$user_titular = $_SESSION['username'];
		$par = array('user_titular'=>$user_titular);		
		$res = $cliente->call('extrato_das_movimentacoes', $par);
		$res2 = $cliente->call('extrato_dos_emprestimos', $par);
		$res3 = $cliente->call('pegar_saldo', $par);

		echo "Saldo Atual: R$".number_format($res3, 2, '.', '');
	?>

	<br/><br/>

	<table border='1'>
		<tr>
			<th> Movimentação </th>
			<th> Valor </th>
			<th> Data </th>
		</tr>

		<?php
			for($i=0; $i<count($res); $i++) {
		    	echo "<tr>";
		    		echo "<td>".$res[$i]['descricao']."</td>";
		    		echo "<td> R$ ".number_format($res[$i]['valor'], 2, '.', '').'</td>';
		    		echo "<td>".$res[$i]['dia']."</td>";
		    	echo "</tr>";
			}
		?>
	</table>
	<br/>
	<table border='1'>
		<tr>
			<th> Valor do Empréstimo </th>
			<th> Data </th>
		</tr>

		<?php
			for($i=0; $i<count($res2); $i++) {
		    	echo "<tr>";
		    		echo "<td> R$ ".number_format($res2[$i]['valor'], 2, '.', '').'</td>';
		    		echo "<td>".$res2[$i]['dia']."</td>";
		    	echo "</tr>";
			}
		?>
	</table>
</body>
</html>