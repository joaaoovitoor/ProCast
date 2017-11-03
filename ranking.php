<?php
	include('verificar_logado.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>Ranking</title>
		<link rel="stylesheet" href="css/ranking.css" type="text/css"/>
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
		<?php
			include('menu2.php');
		?>
		<div class="banner">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center  texto_sombra"><strong>Ranking</strong></h1> 
                    <p class="text-center  texto_sombra">
                        Veja os <strong>melhores</strong> jogadores dos torneios <br>e se inspire para jogar e alcançar o sucesso
                    </p>
                </div>
            </div>
        </div>
		<div class="container-fluid">
		<div class="row">
				<div class="col-sm-3 col-md-3"></div>
<?php 
	include('conexao.php');
	
	$sqlsel1 = "SELECT * FROM colocacao ORDER BY colocacao DESC LIMIT 3;";
	$resul1 = mysqli_query($conexao,$sqlsel1);
	$sqlsel2 = "SELECT * FROM colocacao ORDER BY colocacao DESC LIMIT 20 OFFSET 3;";
	$resul2 = mysqli_query($conexao,$sqlsel2);
	$cont1=1;
	$cont2=4;
	if (mysqli_num_rows($resul1)>0){
		while ($con1=mysqli_fetch_array($resul1)) 
		{
			$sqlusuario='SELECT * FROM usuario WHERE id_usuario='.$con1['id_usuario'].';';
			$resulusuario=mysqli_query($conexao,$sqlusuario);
			$dados=mysqli_fetch_array($resulusuario);
			/*$sqlclube='SELECT * FROM clube WHERE id_usuario='.$con1['id_usuario'].';';
			$resulclube=mysqli_query($conexao,$sqlclube);
			$dadoclube=mysqli_fetch_array($resulclube);*/
?>
			<div class="col-sm-2 col-md-2">
					<div class="thumbnail">
						<img src="img/<?php echo($cont1);?>.png" alt="Primeiro Lugar">
						<div class="caption">
							<p align="center"><img src="uploads/<?php echo $dados['foto_perfil']; ?>" class="img-circle rk" alt="Foto Primeiro Lugar"></p>
							<h3 align="center"><?php echo ($dados['nome']); ?></h3>
							<h4 align="center"><?php //echo ($dadoclube['nome_clube']); ?></h4>
							<h4 align="center"><?php echo ($con1['colocacao']); ?> pts.</h4>
						</div>
					</div>
				</div>
<?php
		$cont1++; 
		}
	}
	else{
		echo "Nenhum registro";
	}
?>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="table-responsive col-md-10 col-md-offset-1">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="text-center">Posição</th>
								<th class="text-center"></th>
								<th class="text-center">Jogador</th>
								<th class="text-center">Clube</th>
								<th class="text-center">Pontuação</th>
							</tr>
						</thead>
						<tbody>
<?php 
	if(mysqli_num_rows($resul2)>0){
		while($con2=mysqli_fetch_array($resul2)){
			$sqlusuario2='SELECT * FROM usuario WHERE id_usuario='.$con2['id_usuario'].';';
			$resulusuario2=mysqli_query($conexao,$sqlusuario2);
			$dados2=mysqli_fetch_array($resulusuario2);
			/*$sqlclube2='SELECT * FROM clube WHERE id_usuario='.$con2['id_usuario'].';';
			$resulclube2=mysqli_query($conexao,$sqlclube2);
			$dadoclube2=mysqli_fetch_array($resulclube2);*/
?>
						<tr>
							<td class="text-center texto-ranking"><h4><?php echo($cont2);?></h4></td>
							<td align="center"><img src="uploads/<?php echo $dados2['foto_perfil']; ?>" class="img-circle rk2" align="Outras Colocações"></td>
							<td class="text-center texto-ranking"><h4><?php echo ($dados2['nome']); ?></h4></td>
							<td class="text-center texto-ranking"><h4><?php //echo ($dadoclube2['nome_clube']); ?></h4></td>
							<td class="text-center texto-ranking"><h4><?php echo ($con2['colocacao']); ?> pts.</h4></td>
						</tr>
<?php 
		$cont2++;
		}
	}
	else{
		echo "Nenhum resultado";
	}
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php
	include('rodape.html');
?>
		</div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>
</html>	
