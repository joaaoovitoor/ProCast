<?php
	$nome = 'xNeg%C3%A3o%20RX';
	
	
	
	$urljogo = file_get_contents("https://br1.api.riotgames.com/lol/summoner/v3/summoners/by-name/$nome?api_key=RGAPI-d89b2cfe-8b5f-4f55-80ef-abc61bc8d931");
	
	echo 'Resultado: '.$urljogo;
	
	$idinteira = explode(':',$urljogo);
	
	$id = explode(',',$idinteira[1]);
	
	echo '<br>';
	
	echo 'id> '.$id[0];


	$urlrank = file_get_contents("https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/$id[0]?api_key=RGAPI-d89b2cfe-8b5f-4f55-80ef-abc61bc8d931");

	$posicao = explode(',',$urlrank);
	
	$tier1 = explode(':',$posicao[2]);
	
	$rank1 = explode(':',$posicao[4]);

	echo "<br>Resultado> rank".$urlrank;

	echo "<br>Resultado tier".$tier1[1];

	echo "<br>Resultado rank".$rank1[1];
?>