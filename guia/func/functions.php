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

	//retorna a lista de pontos disponíveis em um passeio
	function getPontosPasseio($id_passeio){
		$sql = mysql_query("SELECT po.nome AS nome_ponto FROM ponto po, passeio pa, ponto_passeio pp WHERE pp.id_passeio = pa.id_passeio and pp.id_ponto = po.id_ponto and pa.id_passeio = '$id_passeio'") or die (mysql_error());

		$rows = Array();
		while($row = mysql_fetch_array($sql)){
			array_push($rows, $row);
		}

		return($rows);
	}
?>