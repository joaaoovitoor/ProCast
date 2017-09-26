<?php 
	include("menu-admin.html");
?>
<html>
	<body>
	<title>Administração</title>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="img/noticias.jpg" alt="Notícias">
					<div class="caption">
						<h3 align="center">Gerenciar notícias</h3>
						<p align="center"><a href="gerenciamento_noticias.php" class="btn btn-default" role="button">Ver notícias</a></p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="img/usuario.jpg" alt="Usuário">
					<div class="caption">
						<h3 align="center">Gerenciar usuários</h3>
						<p align="center"><a href="gerenciar_usuarios.php" class="btn btn-default" role="button">Ver usuários</a></p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="img/clubes.jpg" alt="Clubes">
					<div class="caption">
						<h3 align="center">Gerenciar clubes</h3>
						<p align="center"><a href="clubes.php" class="btn btn-default" role="button">Ver clubes</a></p>
					</div>
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="img/torneio.jpg" alt="Torneio">
						<div class="caption">
							<h3 align="center">Gerenciar torneios</h3>
							<p align="center"><a href="gerenciamento_de_torneios.php" class="btn btn-default" role="button">Ver torneios</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="img/anuncio.jpg" alt="Anúncios">
						<div class="caption">
							<h3 align="center">Gerenciar anúncios</h3>
							<p align="center"><a href="gerenciar_anuncios.php" class="btn btn-default" role="button">Ver anúncios</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="img/denuncia.jpg" alt="Denúncias">
						<div class="caption">
							<h3 align="center">Denúncias</h3>
							<p align="center"><a href="denuncia.php" class="btn btn-default" role="button">Ver denúncias</a></p>
						</div>
					</div>
				</div>
			</div>
	</div>
<?php 
	include("rodapeadm.html");
?>
	</body>
</html>
