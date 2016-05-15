<html>
	<head> <title> Comprar Guia </title> </head>

	<body>
		
	<p> Selecione o Passeio </p>

		<?php
			include('lib/nusoap.php');	
			$cliente = new nusoap_client('http://localhost/guia/servidor.php?wsdl');	
			$id = $_GET['passeio'];
			$parametros = array('id_passeio'=>$id);		
			$resultado = $cliente->call('getPontosPasseio', $parametros);
		?>

		<table border='1'>
			<tr>
				<th> Pontos Visitados no Passeio </th>
			</tr>

		<?php
			for($i=0; $i<count($resultado); $i++) {
		    	echo "<tr>";
		    		echo "<td>".$resultado[$i]['nome_ponto'].'</td>';
		    		//echo '<td> <center> <a href=\'detalharPasseio.php?passeio='.$resultado[$i]['id_passeio'].'\'> Ir </a> </center> </td>';
		    	echo "</tr>";
			}
		?>

		</table>

	</body>
</html>