<?php
	
	$apikey="RGAPI-f8999a64-bec3-4b2d-acd3-1ab70789db9e";
	$nick ='EKAOKEAOKsdao';
	//$nick ='teste';
	//$nick ='fhgdfkdjkf';
	$nickcod = rawurlencode($nick);

	$urljogo = file_get_contents("https://br1.api.riotgames.com/lol/summoner/v3/summoners/by-name/$nickcod?api_key=$apikey");
	

	$retirar = array('{','"','}');
	$urljogo = str_replace($retirar, '', $urljogo);
	$urljogo = str_replace(',', ':', $urljogo);
	$urlid = explode(':',$urljogo);
	
	if ($urlid[1]) {
		$urlrank = file_get_contents("https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/$urlid[1]?api_key=$apikey");
		
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
	}
		
	else{
		echo('usuário inexistente');
	}	

?>
