<?php 
	include('mysql.php');

	function exemplo($nome, $idade){
		return($nome.' -> '.$idade);
	}

	//retorna a lista de todas as cidades do sistema
	function getCities($a){
		$sql = mysql_query("SELECT * FROM cidade") or die (mysql_error());
		//$row = array();
		//$row = mysql_fetch_array($sql);

		$rows = Array();
		while($row = mysql_fetch_array($sql)){
			array_push($rows, $row);
		}

		return($rows);
	}

	//retorna a lista de passeios disponíveis em uma cidade
	function getPasseiosCidade($id_cidade){
		$sql = mysql_query("SELECT * FROM passeio WHERE id_cidade = '$id_cidade'") or die (mysql_error());

		$rows = Array();
		while($row = mysql_fetch_array($sql)){
			array_push($rows, $row);
		}

		return($rows);
	}

	//retorna a lista de passeios disponíveis em uma cidade
	function getPasseiosGuia($id_guia){
		$sql = mysql_query("SELECT * FROM passeio WHERE id_guia = '$id_guia'") or die (mysql_error());

		$rows = Array();
		while($row = mysql_fetch_array($sql)){
			array_push($rows, $row);
		}

		return($rows);
	}

	//retorna a lista de pontos disponíveis em um passeio
	function getPontosPasseio($id_passeio){
		$sql = mysql_query("SELECT po.nome AS nome_ponto FROM ponto po, passeio pa, ponto_passeio pp WHERE pp.id_passeio = pa.id_passeio and pp.id_ponto = po.id_ponto and pa.id_passeio = '$id_passeio'") or die (mysql_error());

		$rows = Array();
		while($row = mysql_fetch_array($sql)){
			array_push($rows, $row);
		}

		return($rows);
	}

	//retorna a lista de pontos disponíveis em um passeio
	function getDadosPasseio($id_passeio){
		$sql = mysql_query("SELECT * FROM passeio WHERE id_passeio = '$id_passeio'") or die (mysql_error());

		$rows = Array();
		while($row = mysql_fetch_array($sql)){
			array_push($rows, $row);
		}

		return($rows);
	}

	//retorna passeios em uma certa daata
	function getPasseiosData($data){
		$sql = mysql_query("SELECT * FROM passeio WHERE vigenciaFinal >= now() AND vigenciaFinal <= '$data'") or die (mysql_error());

		$rows = Array();
		while($row = mysql_fetch_array($sql)){
			array_push($rows, $row);
		}

		return($rows);
	}

	//retorna os dados do guia responsável pelo passeio
	function getGuiaDoPasseio($id_passeio) {
		$query = "SELECT gui.nome AS nome_guia FROM guia gui, passeio pa WHERE pa.id_guia = gui.id_guia AND pa.id_passeio = '$id_passeio' ";
		$sql = mysql_query($query);

		$rows = mysql_fetch_array($sql);

		return($rows['nome_guia']);
	}

	//retorna o e-mail do guia responsável pelo passeio
	function getEmailGuia($id_passeio) {
		$query = "SELECT gui.email AS email_guia FROM guia gui, passeio pa WHERE pa.id_guia = gui.id_guia AND pa.id_passeio = '$id_passeio' ";
		$sql = mysql_query($query);

		$rows = mysql_fetch_array($sql);

		return($rows['email_guia']);
	}

	//retorna a lista de pontos disponíveis em um passeio
	function getAllGuias($i){
		$sql = mysql_query("SELECT * FROM guia ORDER BY cidade") or die (mysql_error());

		$rows = Array();
		while($row = mysql_fetch_array($sql)){
			array_push($rows, $row);
		}

		return($rows);
	}

	function registrarCompra($id_passeio, $username) {
		$consulta = "INSERT INTO compra (id_passeio, username) values ('$id_passeio', '$username')";
		$exec = mysql_query($consulta) or die (mysql_error());
	}
?>