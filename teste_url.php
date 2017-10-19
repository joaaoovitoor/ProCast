<?php
	$nome = 'xNeg%C3%A3o%20RX';
	
	$urljogo = file_get_contents("https://br1.api.riotgames.com/lol/summoner/v3/summoners/by-name/$nome?api_key=RGAPI-d89b2cfe-8b5f-4f55-80ef-abc61bc8d931");
	
	//echo 'Resultado: '.$urljogo;
	
	$dados = json_decode($urljogo);

	echo '<br>ID: '.$dados->id;

	$id=$dados->id;

	/*$idinteira = explode(':',$urljogo);
	
	$id = explode(',',$idinteira[1]);
	
	echo '<br>';
	
	echo 'id> '.$id[0];*/


	$urlrank = file_get_contents("https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/$id?api_key=RGAPI-d89b2cfe-8b5f-4f55-80ef-abc61bc8d931");

	$filas = explode('},',$urlrank);
	$filasolo = $filas[0].'}';
	$solo = str_replace("[","", $filasolo);
	$rankings = json_decode($solo);

	echo "<br><br><br>Fila Solo/Duo";
	echo '<br>Tier: '.$rankings->tier;
	echo '<br>Rank: '.$rankings->rank;

	$filaflex =$filas[1];
	$flex = str_replace("]","", $filaflex);
	$rankingf = json_decode($flex);

	echo "<br><br><br>Fila Flex";
	echo '<br>Tier: '.$rankingf->tier;
	echo '<br>Rank: '.$rankingf->rank;
	/*

	$posicao = explode(',',$urlrank);
	
	$tier1 = explode(':',$posicao[2]);
	
	$rank1 = explode(':',$posicao[4]);

	echo "<br>Resultado> rank".$urlrank;

	echo "<br>Resultado tier".$tier1[1];

	echo "<br>Resultado rank".$rank1[1];*/
?>