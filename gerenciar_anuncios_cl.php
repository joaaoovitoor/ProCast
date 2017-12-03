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
								$sql='SELECT * FROM anuncio WHERE status="0";';
								$resul=mysqli_query($conexao,$sql);
								$quantidade_pendente=mysqli_num_rows($resul);
								echo $quantidade_pendente;
							?>
							</span>
						</a></li>
						<li><a href="#2"><span>Anúncios aprovados</span>
							<span class="badge">
							<?php
								$sql='SELECT * FROM anuncio WHERE status="1";';
								$resul=mysqli_query($conexao,$sql);
								$quantidade_pendente=mysqli_num_rows($resul);
								echo $quantidade_pendente;
							?>
							</span>
						</a></li>
						<li><a href="#2"><span>Anúncios reprovados</span>
							<span class="badge">
							<?php
								$sql='SELECT * FROM anuncio WHERE status="2";';
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
								$sqlsel='SELECT * FROM anuncio WHERE status="0"';
								$resul=mysqli_query($conexao,$sqlsel);
								if (mysqli_num_rows($resul)>0)
								{
									while ($con_anuncio=mysqli_fetch_array($resul)) 
									{
										$sqlsel3='SELECT * FROM pagamento_an WHERE id_anuncio='.$con_anuncio['id_anuncio'].'';
										$resul3=mysqli_query($conexao,$sqlsel3);
										if (mysqli_num_rows($resul3)>0) 
										{
											while ($con3=mysqli_fetch_array($resul3)) 
											{
												$sqlsel2='SELECT * FROM anunciante WHERE id_anunciante='.$con_anuncio['id_anunciante'].'';
												$resul2=mysqli_query($conexao,$sqlsel2);
												$consulta_anunciante=mysqli_fetch_array($resul2);
										
							?>
							<div class='list-card'>
								<div class="col-md-5">
									<img src='uploads/<?php echo $con_anuncio['anuncio'];?>'>
								</div>
								<div class="col-md-3">
									<div class='list-details'>
										<div class='list-name'>
											Nome do Anúncio: <?php echo $con_anuncio['nome_anuncio'];?>
										</div>
										<div class='list-rooms'>
											<p>Link: <?php echo $con_anuncio['link'];?></p>
											<p>Empresa: <?php echo $consulta_anunciante['nome_empresa'];?></p>
											<p>CNPJ: <?php echo $consulta_anunciante['cnpj'];?></p>
											<p>Nome anunciante: <?php echo $consulta_anunciante['nome_anunciante'].' '.$consulta_anunciante['sobrenome'];?></p>
										</div>
										<div class='list-landmark'>
											Data de Criação: <?php echo $con_anuncio['data_criacao_anuncio'];?>
										</div>
										<div class='list-location'>
											Data de expiração: -
										</div>
										<div class='list-price'>
											Plano: <?php 
												if($con_anuncio['tipo']==1){
													echo '1 semana por R$9,99';
												}elseif ($con_anuncio['tipo']==2){
													echo '15 dias por R$16,99';
												}else{
													echo '1 mês por R$29,99';										
												}
											?>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<form action="#" method="POST">
										<input type="hidden" name="id_anuncio" value="<?php echo($con_anuncio['id_anuncio']);?>">
										<p><button name="aprovar" type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>APROVAR</button></p>
										<p><button name="reprovar" type="submit" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i>REPROVAR</button></p>
									</form>
								</div>
							</div>
							<?php
							
										if(isset($_POST['aprovar']))
										{
											$id_anuncio=$_POST['id_anuncio'];
											$sqlalt=('UPDATE anuncio set status="1" WHERE id_anuncio='.$id_anuncio.';');
											mysqli_query($conexao,$sqlalt);
											$sqlalt=('UPDATE pagamento_an set status_pagamento="T" WHERE id_anuncio='.$id_anuncio.';');
											mysqli_query($conexao,$sqlalt);
											echo('<script>window.alert("Anúncio Aprovado");window.location="gerenciar_anuncios.php";</script>');
											exit();
										}
										if(isset($_POST['reprovar']))
										{
											$id_anuncio=$_POST['id_anuncio'];
											$sqlalt=('UPDATE anuncio set status="2" WHERE id_anuncio='.$id_anuncio.';');
											mysqli_query($conexao,$sqlalt);
											$sqlalt=('UPDATE pagamento_an set status_pagamento="F" WHERE id_anuncio='.$id_anuncio.';');
											mysqli_query($conexao,$sqlalt);
											echo('<script>window.alert("Anúncio Reprovado");window.location="gerenciar_anuncios.php";</script>');
											exit();
										}
									
									}
								}}
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
								$sqlsel='SELECT * FROM anuncio WHERE status="1"';
								$resul=mysqli_query($conexao,$sqlsel);
								if (mysqli_num_rows($resul)>0)
								{
									while ($con_anuncio=mysqli_fetch_array($resul)) 
									{
										$sqlsel2='SELECT * FROM anunciante WHERE id_anunciante='.$con_anuncio['id_anunciante'].'';
										$resul2=mysqli_query($conexao,$sqlsel2);
										$consulta_anunciante=mysqli_fetch_array($resul2);
							?>
							<div class='list-card'>
								<div class="col-md-5">
									<img src='uploads/<?php echo $con_anuncio['anuncio'];?>'>
								</div>
								<div class="col-md-3">
									<div class='list-details'>
										<div class='list-name'>
											Nome do Anúncio: <?php echo $con_anuncio['nome_anuncio'];?>
										</div>
										<div class='list-rooms'>
											<p>Link: <?php echo $con_anuncio['link'];?></p>
											<p>Empresa: <?php echo $consulta_anunciante['nome_empresa'];?></p>
											<p>CNPJ: <?php echo $consulta_anunciante['cnpj'];?></p>
											<p>Nome anunciante: <?php echo $consulta_anunciante['nome_anunciante'].' '.$consulta_anunciante['sobrenome'];?></p>
										</div>
										<div class='list-landmark'>
											Data de Criação: <?php echo $con_anuncio['data_criacao_anuncio'];?>
										</div>
										<div class='list-price'>
											Plano: <?php 
												if($con_anuncio['tipo']==1){
													echo '1 semana por R$9,99';
												}elseif ($con_anuncio['tipo']==2){
													echo '15 dias por R$16,99';
												}else{
													echo '1 mês por R$29,99';										
												}
											?>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<p align="center"><i class="fa fa-check fa-5x"></i><br>Aprovado</p>
									<p align="center"><a href="gerenciar_anuncios.php?exc=<?php echo($con_anuncio['id_anuncio']); ?>"><i class="fa fa-times fa-3x"></i><br>Excluir</a></p>
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
									$sqlex=('DELETE FROM anuncio WHERE id_anuncio='.$exc.';');
									mysqli_query($conexao,$sqlex);
									$sqlex=('DELETE FROM pagamento_an WHERE id_anuncio='.$exc.';');
									mysqli_query($conexao,$sqlex);
									echo('<script>window.alert("Anúncio Excluído");window.location="gerenciar_anuncios.php";</script>');
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
								$sqlsel='SELECT * FROM anuncio WHERE status="2"';
								$resul=mysqli_query($conexao,$sqlsel);
								if (mysqli_num_rows($resul)>0)
								{
									while ($con_anuncio=mysqli_fetch_array($resul)) 
									{
										$sqlsel2='SELECT * FROM anunciante WHERE id_anunciante='.$con_anuncio['id_anunciante'].'';
										$resul2=mysqli_query($conexao,$sqlsel2);
										$consulta_anunciante=mysqli_fetch_array($resul2);
							?>
							<div class='list-card'>
								<div class="col-md-5">
									<img src='uploads/<?php echo $con_anuncio['anuncio'];?>'>
								</div>
								<div class="col-md-3">
									<div class='list-details'>
										<div class='list-name'>
											Nome do Anúncio: <?php echo $con_anuncio['nome_anuncio'];?>
										</div>
										<div class='list-rooms'>
											<p>Link: <?php echo $con_anuncio['link'];?></p>
											<p>Empresa: <?php echo $consulta_anunciante['nome_empresa'];?></p>
											<p>CNPJ: <?php echo $consulta_anunciante['cnpj'];?></p>
											<p>Nome anunciante: <?php echo $consulta_anunciante['nome_anunciante'].' '.$consulta_anunciante['sobrenome'];?></p>
										</div>
										<div class='list-landmark'>
											Data de Criação: <?php echo $con_anuncio['data_criacao_anuncio'];?>
										</div>
										<div class='list-location'>
											Data de expiração: -
										</div>
										<div class='list-price'>
											Plano: <?php 
												if($con_anuncio['tipo']==1){
													echo '1 semana por R$9,99';
												}elseif ($con_anuncio['tipo']==2){
													echo '15 dias por R$16,99';
												}else{
													echo '1 mês por R$29,99';										
												}
											?>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<p align="center"><i class="fa fa-times fa-5x"></i><br>Reprovado</p>
									<p align="center"><a href="gerenciar_anuncios.php?exc=<?php echo($con_anuncio['id_anuncio']); ?>"><i class="fa fa-times fa-3x"></i><br>Excluir</a></p>
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
				</section>
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