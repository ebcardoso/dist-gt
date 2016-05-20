<html>
	<head> <title> Detalhando Passeio </title> </head>

	<body>

		<?php
			include('lib/nusoap.php');	
			$cliente = new nusoap_client('http://localhost/guia/servidor.php?wsdl');	
			$id = $_GET['passeio'];
			
			//pegando os pontos
			$parametros = array('id_passeio'=>$id);		
			$resultado = $cliente->call('getPontosPasseio', $parametros);

			//pegando os dados de um passeio
			$resultado2 = $cliente->call('getDadosPasseio', $parametros);

			//pegando nome do guia
			$par = array('id_passeio'=>$id);
			$res = $cliente->call('getGuiaDoPasseio', $par);

			//pegando nome do guia
			$res2 = $cliente->call('getEmailGuia', $par);
		?>

		<h1> Detalhes do Passeio </h1>
		<p>
			Guia: <?php echo $res;?> <br/>
			E-Mail: <?php echo $res2;?> <br/>
			Saída: <?php echo $resultado2[0]['horaInicial']?> <br/>
			Chegada: <?php echo $resultado2[0]['horaFinal']?>
		</p>

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

		<p> <?php echo "<a href='comprar.php?passeio=".$id."&valor=".$resultado2[0]['preco']."'> Comprar </a>"; ?> </p>

	</body>
</html>