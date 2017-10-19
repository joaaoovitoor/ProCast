<?php
	
	$apikey="RGAPI-52ab3dd2-16d3-404c-bdc5-14279ce28ec6";
	$nick ="xNegão RX";
	$nickcod = rawurlencode($nick);
	echo $nickcod;
	
	$urljogo = file_get_contents("https://br1.api.riotgames.com/lol/summoner/v3/summoners/by-name/$nickcod?api_key=$apikey");
	
	$dados = json_decode($urljogo);

	echo '<br>ID: '.$dados->id;

	$id=$dados->id;

	$urlrank = file_get_contents("https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/$id?api_key=$apikey");

	//solo/duo
	$filas = explode('},',$urlrank);
	$filasolo = $filas[0].'}';
	$solo = str_replace("[","", $filasolo);
	$rankings = json_decode($solo);

	echo "<br><br><br>Fila Solo/Duo";
	echo '<br>Tier: '.$rankings->tier;
	echo '<br>Rank: '.$rankings->rank;

	//flex
	$filaflex =$filas[1];
	$flex = str_replace("]","", $filaflex);
	$rankingf = json_decode($flex);

	echo "<br><br><br>Fila Flex";
	echo '<br>Tier: '.$rankingf->tier;
	echo '<br>Rank: '.$rankingf->rank;
?>