<html>
	<head> <title> Comprar Guia </title> </head>

	<body>
		
	<h1> Escolha um Guia </h1>

		<?php
			include('lib/nusoap.php');	
			$cliente = new nusoap_client('http://localhost/guia/servidor.php?wsdl');	
			$id = $_GET['guia'];
			$parametros = array('id_guia'=>$id);		
			$resultado = $cliente->call('getPasseiosGuia', $parametros);
		?>

		<table border='1'>
			<tr>
				<th> Nome do Passeio </th>
				<th> Preço </th>
				<th> Ações </th>
			</tr>

		<?php
			for($i=0; $i<count($resultado); $i++) {
		    	echo "<tr>";
		    		echo "<td>".$resultado[$i]['nome'].'</td>';
		    		echo "<td> R$ ".number_format($resultado[$i]['preco'], 2, '.', '').'</td>';
		    		echo '<td> <center> <a href=\'detalharPasseio.php?passeio='.$resultado[$i]['id_passeio'].'\'> Ir </a> </center> </td>';
		    	echo "</tr>";
			}
		?>

		</table>

	</body>
</html>