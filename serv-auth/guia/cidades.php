<html>
	<head> <title> Comprar Guia </title> </head>

	<body>
		
	<h1> Selecione uma Cidade </h1>

<?php
	include('../../nusoap_lib/nusoap.php');	
	$cliente = new nusoap_client('http://localhost/dist-gt/guia/servidor.php?wsdl');	
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