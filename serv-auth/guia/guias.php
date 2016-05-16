<html>
	<head> <title> Comprar Guia </title> </head>

	<body>
		
	<h1> Escolha um Guia </h1>

<?php
	include('lib/nusoap.php');	
	$cliente = new nusoap_client('http://localhost/guia/servidor.php?wsdl');	
	$parametros = array('i'=>'Breno');		
	$resultado = $cliente->call('getAllGuias', $parametros);
?>

	<table border='1'>
		<tr>
			<th> Cidade </th>
			<th> Nome </th>
			<th> E-Mail </th>
			<th> Ação </th>
		</tr>

<?php
	for($i=0; $i<count($resultado); $i++) {
    	echo "<tr>";
    		echo "<td>".$resultado[$i]['cidade'].'</td>';
    		echo "<td>".$resultado[$i]['nome'].'</td>';
    		echo "<td>".$resultado[$i]['email'].'</td>';
    		echo '<td> <center> <a href=\'escolherPasseio2.php?guia='.$resultado[$i]['id_guia'].'\'> Mostrar Passeios </a> </center> </td>';
    	echo "</tr>";
	}
?>

	</table>	
	</body>
</html>