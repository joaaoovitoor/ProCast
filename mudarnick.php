<?php 
	include('conexao.php');
	include('verificar_logado.php');
	include('api.php');
	$id_nick=$_GET['idnick'];
	$nickant=$_GET['nick'];
	$urljogo = file_get_contents("https://br1.api.riotgames.com/lol/summoner/v3/summoners/".$id_nick."?api_key=$apikey");
 		
 		if($urljogo){
 			$retirar = array('{','"','}');
 			$urljogo = str_replace($retirar, '', $urljogo);
 			$urljogo = str_replace(',', ':', $urljogo);
 			$id_nick = explode(':',$urljogo);
 			if($nickant==$id_nick[5])
 			{
 				echo('<script>alert("Seu nick no League of Legends ainda é o mesmo: '.$id_nick[5].'");</script>');
 				echo ('<script>window.location.href="verificar_perfil.php";</script>');
 			}
 			else
 			{
 				$sqlalt='UPDATE usuario SET nick="'.$id_nick[5].'" WHERE email="'.$_SESSION['email'].'";';
 				$resul=mysqli_query($conexao,$sqlalt);
 				if($resul)
 				{
 					echo ('<script>window.alert("Nick alterado com sucesso!");window.location.href="verificar_perfil.php";</script>');
 				}
 				else
 				{
 					echo ('<script>window.alert("Erro ao alterar nick!");window.location.href="verificar_perfil.php";</script>');
 				}
 			}
 		}
?>