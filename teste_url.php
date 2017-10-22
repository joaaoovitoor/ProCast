<?php
	
	$apikey="RGAPI-f8999a64-bec3-4b2d-acd3-1ab70789db9e";
<<<<<<< HEAD
<<<<<<< HEAD
	$nick ='mirielesilverio';
	//$nick ='teste';
	//$nick ='fhgdfkdjkf';
	$nickcod = rawurlencode($nick);

	$urljogo = file_get_contents("https://br1.api.riotgames.com/lol/summoner/v3/summoners/by-name/$nickcod?api_key=$apikey");
	

	$retirar = array('{','"','}');
	$urljogo = str_replace($retirar, '', $urljogo);
	$urljogo = str_replace(',', ':', $urljogo);
	$urlid = explode(':',$urljogo);
	
	if ($urlid[1]) {
=======
	$nick ='xNegão RX';
	//$nick ='teste';
	//$nick ='fhgdfkdjkf';
=======
	$urlrank = file_get_contents('https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/'.$con['id_nick'].'?api_key='.$apikey.'');
>>>>>>> 32978a992c02cdd3cc2f9359370cc84808cd7604
	
	//solo/duo
	$filas = explode('},',$urlrank);
	$filasolo = $filas[0].'}';
	$solo = str_replace("[","", $filasolo);
	$rankings = json_decode($solo);

<<<<<<< HEAD
>>>>>>> 6057714ad4d5f700212b9af5fd01c2f9602b33f9
		$urlrank = file_get_contents("https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/$urlid[1]?api_key=$apikey");
		
		//solo/duo
		$filas = explode('},',$urlrank);
		$filasolo = $filas[0].'}';
		$solo = str_replace("[","", $filasolo);
		$rankings = json_decode($solo);
=======
	if ($rankings->rank){
		echo "<br><br><br>Fila Solo/Duo";
		echo '<br>Tier: '.$rankings->tier;
		echo '<br>Rank: '.$rankings->rank;
>>>>>>> 32978a992c02cdd3cc2f9359370cc84808cd7604

		//flex
		$filaflex =$filas[1];
		$flex = str_replace("]","", $filaflex);
		$rankingf = json_decode($flex);

<<<<<<< HEAD
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
<<<<<<< HEAD
	}
		
	else{
		echo('usuário inexistente');
=======
		
	}
	else
	{
		echo "Jogador inexistente";
>>>>>>> 6057714ad4d5f700212b9af5fd01c2f9602b33f9
	}	
=======
		echo "<br><br><br>Fila Flex";
		echo '<br>Tier: '.$rankingf->tier;
		echo '<br>Rank: '.$rankingf->rank;
	}
	else
	{
		echo ('usuario não possui rank');
	}
>>>>>>> 32978a992c02cdd3cc2f9359370cc84808cd7604

?>
