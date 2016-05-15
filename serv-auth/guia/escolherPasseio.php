<html>
	<head> <title> Comprar Guia </title> </head>

	<body>
		
	<p> Selecione o Passeio </p>

		<?php
			include('lib/nusoap.php');	
			$cliente = new nusoap_client('http://localhost/guia/servidor.php?wsdl');	
			$id = $_GET['cidade'];
			$parametros = array('id_cidade'=>$id);		
			$resultado = $cliente->call('getPasseiosCidade', $parametros);
		?>

		<table border='1'>
			<tr>
				<th> Nome do Passeio </th>
				<th> Ações </th>
			</tr>

		<?php
			for($i=0; $i<count($resultado); $i++) {
		    	echo "<tr>";
		    		echo "<td>".$resultado[$i]['nome'].'</td>';
		    		echo '<td> <center> <a href=\'detalharPasseio.php?passeio='.$resultado[$i]['id_passeio'].'\'> Ir </a> </center> </td>';
		    	echo "</tr>";
			}
		?>

		</table>

	</body>
</html>