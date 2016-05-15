<html>
	<head> <title> Comprar Guia </title> </head>

	<body>
		
	<p> Selecione a Cidade </p>

<?php
	include('lib/nusoap.php');	
	$cliente = new nusoap_client('http://localhost/guia/servidor.php?wsdl');	
	$parametros = array('a'=>'Breno');		
	$resultado = $cliente->call('getCities', $parametros);
?>

	<table border='1'>
		<tr>
			<th> Nome do Estádio </th>
			<th> Ações </th>
		</tr>

<?php
	for($i=0; $i<count($resultado); $i++) {
    	echo "<tr>";
    		echo "<td>".$resultado[$i]['nome'].'</td>';
    		echo '<td> <center> <a href=\'escolherPasseio.php?cidade='.$resultado[$i]['id_cidade'].'\'> Ir </a> </center> </td>';
    	echo "</tr>";
	}
?>

	</table>	
	</body>
</html>