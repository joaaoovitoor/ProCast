<?php
	
	$apikey="RGAPI-f8999a64-bec3-4b2d-acd3-1ab70789db9e";

	$urlrank = file_get_contents('https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/'.$con['id_nick'].'?api_key='.$apikey.'');
	//pegando resultado do JSON
	$filas = explode('},',$urlrank);

	//fil solo duo
	$filasolo = $filas[0].'}';
	$solo = str_replace("[","", $filasolo);
	$rankings = json_decode($solo);

	echo "<br><br><br>Fila Solo/Duo";
	echo '<br>Tier: '.$rankings->tier;
	echo '<br>Rank: '.$rankings->rank;

	//fila flex
	$filaflex =$filas[1];
	$flex = str_replace("]","", $filaflex);
	$rankingf = json_decode($flex);

	echo "<br><br><br>Fila Flex";
	echo '<br>Tier: '.$rankingf->tier;
	echo '<br>Rank: '.$rankingf->rank;
 		
?>