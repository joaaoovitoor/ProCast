<?php 
	include('menu-admin.html');
	include ('conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Gerencimento de anúncios
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/clubes.css">
		<link rel="stylesheet" type="text/css" href="css/anunciante.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/perfil/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/perfil/tabstyles.css" />
		<meta charset="UTF-8"/>
		<style type="text/css">
			.perf{
				width: 200px;
				height: 200px;
			}
		</style>
		
	</head>
	<body>
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 bg-procast titulo">
						<h1>Gerenciamento de anúncios</h1>
					</div>
				</div>
			</div>
		</section><br>
		<section>
			<div class="tabs tabs-style-linebox">
				<nav>
					<ul>
						<li><a href="#1"><span>Anúncios em andamento</span>
							<span class="badge">
							<?php
								$sql='SELECT * FROM anuncio_jog WHERE status_pagamento="0";';
								$resul=mysqli_query($conexao,$sql);
								$quantidade_pendente=mysqli_num_rows($resul);
								echo $quantidade_pendente;
							?>
							</span>
						</a></li>
						<li><a href="#2"><span>Anúncios aprovados</span>
							<span class="badge">
							<?php
								$sql='SELECT * FROM anuncio_jog WHERE status_pagamento="T";';
								$resul=mysqli_query($conexao,$sql);
								$quantidade_pendente=mysqli_num_rows($resul);
								echo $quantidade_pendente;
							?>
							</span>
						</a></li>
						<li><a href="#2"><span>Anúncios reprovados</span>
							<span class="badge">
							<?php
								$sql='SELECT * FROM anuncio_jog WHERE status_pagamento="F";';
								$resul=mysqli_query($conexao,$sql);
								$quantidade_pendente=mysqli_num_rows($resul);
								echo $quantidade_pendente;
							?>
							</span>
						</a></li>
					</ul>
				</nav>
				<div class="content-wrap">
				<!--Anúncios em andamento-->
				<section id="1">
					<div class="container">
						<div class="row">
							<?php
								$sqlsel='SELECT * FROM anuncio_jog WHERE status_pagamento="0"';
								$resul=mysqli_query($conexao,$sqlsel);
								if (mysqli_num_rows($resul)>0)
								{
									while ($con_anuncio=mysqli_fetch_array($resul)) 
									{
									
										$sqlsel2='SELECT * FROM usuario WHERE id_usuario='.$con_anuncio['id_usuario_an'].'';
										$resul2=mysqli_query($conexao,$sqlsel2);
										$consulta_usuario=mysqli_fetch_array($resul2);
										$sql_est='SELECT * FROM estado WHERE id='.$consulta_usuario['estado'].'';
										$res_est=mysqli_query($conexao,$sql_est);
										$consulta_est=mysqli_fetch_array($res_est);
										$sql_cid='SELECT * FROM cidade WHERE id='.$consulta_usuario['cidade'].'';
										$res_cid=mysqli_query($conexao,$sql_cid);
										$consulta_cid=mysqli_fetch_array($res_cid);
										
							?>
							<div class='list-card'>
								<div class="col-md-5">
									<img src='uploads/<?php echo $consulta_usuario['foto_perfil'];?>' class="perf">
								</div>
								<div class="col-md-3">
									<?php 
										$dataexplode = explode("-",$con_anuncio['data_criacao_anuncio']);
										$datahora = explode(" ",$dataexplode[2]);
										$dataexplode[2]= $datahora[0];
										$cont=2;
										for($i=0;$i<3;$i++)
										{
											$datainv[$i]=$dataexplode[$cont];
											$cont--;
										}
										$datacerto=implode("-", $datainv);
									?>
									<div class='list-details'>
										<div class='list-name'>
											Nome do anunciado: <?php echo $consulta_usuario['nome'].' '.$consulta_usuario['sobrenome'];?>
										</div>
										<div class='list-name'>
											CPF: <?php echo $consulta_usuario['cpf'];?>
										</div>
										<div class='list-rooms'>
											<p>Estado: <?php echo $consulta_est['nome'];?></p>
											<p>Cidade: <?php echo $consulta_cid['nome'];?></p>
										</div>
										<div class='list-landmark'>
											Data de Criação: <?php echo $datacerto;?>
										</div>
										<div class='list-price'>
											Plano: <?php 
												if($con_anuncio['tipo']==1){
													echo '1 semana por R$9,90';
													$time= strtotime($datacerto."+7 days");
												}elseif ($con_anuncio['tipo']==2){
													echo '14 dias por R$19,90';
													$time= strtotime($datacerto."+14 days");
												}
											?>
										</div>
										<div class="list-landmark">
											Data de vencimento: <?php echo date('d/m/Y', $time); ?>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<form action="#" method="POST">
										<input type="hidden" name="id_usuario" value="<?php echo $consulta_usuario['id_usuario']; ?>">
										
										<p><button name="aprovar" type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>APROVAR</button></p>
										<p><button name="reprovar" type="submit" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i>REPROVAR</button></p>
									</form>
								</div>
							</div>
							<?php
							
										if(isset($_POST['aprovar']))
										{
											$id_usuario_an=$_POST['id_usuario'];
											$sqlalt=('UPDATE anuncio_jog set status_pagamento="T" WHERE id_usuario_an='.$id_usuario_an.';');
											mysqli_query($conexao,$sqlalt);
											$sqlalt=('UPDATE pagamento set status_pagamento="T" WHERE id_usuario='.$id_usuario_an.';');
											mysqli_query($conexao,$sqlalt);
											echo('<script>window.alert("Anúncio Aprovado");window.location="gerenciar_anuncios_jog.php";</script>');
											exit();
										}
										if(isset($_POST['reprovar']))
										{
											$id_usuario_an=$_POST['id_usuario_an'];
											$sqlalt=('UPDATE anuncio_jog set status_pagamento="F" WHERE id_usuario_an='.$id_usuario_an.';');
											mysqli_query($conexao,$sqlalt);
											$sqlalt=('UPDATE pagamento set status_pagamento="F" WHERE id_usuario='.$id_usuario_an.';');
											mysqli_query($conexao,$sqlalt);
											echo('<script>window.alert("Anúncio Reprovado");window.location="gerenciar_anuncios_jog.php";</script>');
											exit();
										}
									
									}
								}
								else
								{
									echo '<p align="center"><img src="img/triste.png"><br>Nenhum Anúncio</p>';
								}
							?>
						</div>
					</div>
				</section>
				<!--Anúncios aprovados-->
				<section id="2">
					<div class="container">
						<div class="row">
							<?php
								$sqlsel='SELECT * FROM anuncio_jog WHERE status_pagamento="T"';
								$resul=mysqli_query($conexao,$sqlsel);
								if (mysqli_num_rows($resul)>0)
								{
									while ($con_anuncio=mysqli_fetch_array($resul)) 
									{
									
										$sqlsel2='SELECT * FROM usuario WHERE id_usuario='.$con_anuncio['id_usuario_an'].'';
										$resul2=mysqli_query($conexao,$sqlsel2);
										$consulta_usuario=mysqli_fetch_array($resul2);
										$sql_est='SELECT * FROM estado WHERE id='.$consulta_usuario['estado'].'';
										$res_est=mysqli_query($conexao,$sql_est);
										$consulta_est=mysqli_fetch_array($res_est);
										$sql_cid='SELECT * FROM cidade WHERE id='.$consulta_usuario['cidade'].'';
										$res_cid=mysqli_query($conexao,$sql_cid);
										$consulta_cid=mysqli_fetch_array($res_cid);
							?>
							<div class='list-card'>
								<div class="col-md-3">
									<img src='uploads/<?php echo $consulta_usuario['foto_perfil'];?>' class="perf">
								</div>
								<div class="col-md-5">
								<div class="col-md-7">
									<div class='list-details'>
										<div class='list-name'>
											Nome do anunciado: <?php echo $consulta_usuario['nome'].' '.$consulta_usuario['sobrenome'];?>
										</div>
										<div class='list-name'>
											CPF: <?php echo $consulta_usuario['cpf'];?>
										</div>
										<div class='list-rooms'>
											<p>Estado: <?php echo $consulta_est['nome'];?></p>
											<p>Cidade: <?php echo $consulta_cid['nome'];?></p>
										</div>
										<div class='list-landmark'>
											Data de Criação: <?php echo $con_anuncio['data_criacao_anuncio'];?>
										</div>
										<div class='list-price'>
											Plano: <?php 
												if($con_anuncio['tipo']==1){
													echo '1 semana por R$9,90';
												}elseif ($con_anuncio['tipo']==2){
													echo '14 dias por R$19,90';
												}
											?>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<p align="center"><i class="fa fa-check fa-5x"></i><br>Aprovado</p>
									<p align="center"><a href="gerenciar_anuncios.php?exc=<?php echo($consulta_usuario['id_usuario']); ?>"><i class="fa fa-times fa-3x"></i><br>Excluir</a></p>
								</div>
							</div>
							<?php
									}
								}
								else
								{
									echo '<p align="center"><img src="img/triste.png"><br>Nenhum Anúncio</p>';
								}
								if (isset($_GET['exc'])) {
									$exc=$_GET['exc'];
									$sqlex=('DELETE FROM anuncio_jog WHERE id_usuario_an='.$exc.';');
									mysqli_query($conexao,$sqlex);
									$sqlex=('DELETE FROM pagamento WHERE id_usuario='.$exc.';');
									if(mysqli_query($conexao,$sqlex)){
									echo('<script>window.alert("Anúncio Excluído");window.location="gerenciar_anuncios_jog.php";</script>');
								}
								}
							?>
						</div>
					</div>
				</section>
				<!--Anúncios reprovados-->
				<section id="3">
					<div class="container">
						<div class="row">
							<?php
								$sqlsel='SELECT * FROM anuncio_jog WHERE status_pagamento="F"';
								$resul=mysqli_query($conexao,$sqlsel);
								if (mysqli_num_rows($resul)>0)
								{
									while ($con_anuncio=mysqli_fetch_array($resul)) 
									{
									
										$sqlsel2='SELECT * FROM usuario WHERE id_usuario='.$con_anuncio['id_usuario_an'].'';
										$resul2=mysqli_query($conexao,$sqlsel2);
										$consulta_usuario=mysqli_fetch_array($resul2);
										$sql_est='SELECT * FROM estado WHERE id='.$consulta_usuario['estado'].'';
										$res_est=mysqli_query($conexao,$sql_est);
										$consulta_est=mysqli_fetch_array($res_est);
										$sql_cid='SELECT * FROM cidade WHERE id='.$consulta_usuario['cidade'].'';
										$res_cid=mysqli_query($conexao,$sql_cid);
										$consulta_cid=mysqli_fetch_array($res_cid);
							?>
							<div class='list-card'>
								<div class="col-md-3">
									<img src='uploads/<?php echo $consulta_usuario['foto_perfil'];?>' class="perf">
								</div>
								<div class="col-md-5">
								<div class="col-md-7">
									<div class='list-details'>
										<div class='list-name'>
											Nome do anunciado: <?php echo $consulta_usuario['nome'].' '.$consulta_usuario['sobrenome'];?>
										</div>
										<div class='list-name'>
											CPF: <?php echo $consulta_usuario['cpf'];?>
										</div>
										<div class='list-rooms'>
											<p>Estado: <?php echo $consulta_est['nome'];?></p>
											<p>Cidade: <?php echo $consulta_cid['nome'];?></p>
										</div>
										<div class='list-landmark'>
											Data de Criação: <?php echo $con_anuncio['data_criacao_anuncio'];?>
										</div>
										<div class='list-price'>
											Plano: <?php 
												if($con_anuncio['tipo']==1){
													echo '1 semana por R$9,90';
												}elseif ($con_anuncio['tipo']==2){
													echo '14 dias por R$19,90';
												}
											?>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<p align="center"><i class="fa fa-times fa-5x"></i><br>Reprovado</p>
									<p align="center"><a href="gerenciar_anuncios.php?exc=<?php echo($consulta_usuario['id_usuario']); ?>"><i class="fa fa-times fa-3x"></i><br>Excluir</a></p>
								</div>
							</div>
							<?php
									}
								}
								else
								{
									echo '<p align="center"><img src="img/triste.png"><br>Nenhum Anúncio</p>';
								}
								
							?>
						</div>
					</div>
				</section
				</div>
			</div>
		</section>
		<script src="js/cbpFWTabs.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<script>
		(function() {

		[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
			new CBPFWTabs( el );
		});

		})();
		</script>
<?php 
	include("rodapeadm.html");
?>
	</body>
</html>