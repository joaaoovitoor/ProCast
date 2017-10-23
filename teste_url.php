<?php
	
	$apikey="RGAPI-f8999a64-bec3-4b2d-acd3-1ab70789db9e";

	$urlrank = file_get_contents('https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/'.$con['id_nick'].'?api_key='.$apikey.'');
		//solo/duo
		$filas = explode('},',$urlrank);
		$filasolo = $filas[0].'}';
		$solo = str_replace("[","", $filasolo);
		$rankings = json_decode($solo);

		if ($rankings->rank){
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
		}
		else
		{
			echo ('usuario não possui rank');
		}
?>