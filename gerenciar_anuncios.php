<?php 
	include("menu-admin.html");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Gerencimento de anúncios
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/clubes.css">
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
		</section>
		<br/>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12 ">
						<form action="#" method="POST" >
							<div class="input-group">
							    <span class="input-group-btn">
							     	<button class="btn btn-procast btn-lg" type="submit" name="enviar"> <i class="fa fa-search"></i> Pesquisar ánúncio</button>
							    </span>
							    <input type="text" class="form-control input-lg" placeholder="Digite o nome do clube ou usuário aqui" name="pesquisa_clube">
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		</br>
		<section>
			<div class="tabs tabs-style-linebox">
				<nav>
					<ul>
						<li><a href="#section-linebox-1"><span>Anúncios em andamento</span></a></li>
						<li><a href="#section-linebox-2"><span>Anúncios encerrados</span></a></li>
					</ul>
				</nav>
				<div class="content-wrap">
					<!-- Anúncios em andamento-->
					<section id="section-linebox-1">
						<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
						      <div class="caption">
						      	<img src="img/logo_redcanids.png" class="img-responsive">
						        <h3 class="text-center">Red Canids</h3>
						        <h4 class="text-center">Informações anunciadas</h4>
						        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat velit id mi aliquet, vitae imperdiet velit congue. Nunc bibendum diam eget velit tempus venenatis. Morbi efficitur vitae nibh sit amet vehicula. Pellentesque laoreet  </p>
						        <p class="text-center"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de cotratação:   <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de expiração:</a></p>
						        <p class="text-center"><a href="#" class="btn btn-procast" role="button">Detalhes</a>  <a href="#" class="btn btn-danger" role="button">Excluir</a></p>
						      </div>
						    </div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail">
						      <div class="caption">
						      	<img src="img/logo_redcanids.png" class="img-responsive">
						        <h3 class="text-center">Red Canids</h3>
						        <h4 class="text-center">Informações anunciadas</h4>
						        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat velit id mi aliquet, vitae imperdiet velit congue. Nunc bibendum diam eget velit tempus venenatis. Morbi efficitur vitae nibh sit amet vehicula. Pellentesque laoreet  </p>
						        <p class="text-center"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de cotratação:   <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de expiração:</a></p>
						        <p class="text-center"><a href="#" class="btn btn-procast" role="button">Detalhes</a>  <a href="#" class="btn btn-danger" role="button">Excluir</a></p>
						      </div>
						    </div>
						</div>
						<div class="col-md-4">
							<div class="thumbnail">
						      <div class="caption">
						      	<img src="img/logo_redcanids.png" class="img-responsive">
						        <h3 class="text-center">Red Canids</h3>
						        <h4 class="text-center">Informações anunciadas</h4>
						        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat velit id mi aliquet, vitae imperdiet velit congue. Nunc bibendum diam eget velit tempus venenatis. Morbi efficitur vitae nibh sit amet vehicula. Pellentesque laoreet  </p>
						        <p class="text-center"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de cotratação:   <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de expiração:</a></p>
						        <p class="text-center"><a href="#" class="btn btn-procast" role="button">Detalhes</a>  <a href="#" class="btn btn-danger" role="button">Excluir</a></p>
						      </div>
						    </div>
						</div>
					</div>
				</section>
				<section id="section-linebox-2">
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<div class="thumbnail">
							      <div class="caption">
							      	<img src="img/logo_redcanids.png" class="img-responsive">
							        <h3 class="text-center">Red Canids</h3>
							        <h4 class="text-center">Informações anunciadas</h4>
							        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat velit id mi aliquet, vitae imperdiet velit congue. Nunc bibendum diam eget velit tempus venenatis. Morbi efficitur vitae nibh sit amet vehicula. Pellentesque laoreet  </p>
							        <p class="text-center"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de cotratação:   <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de expiração:</a></p>
							        <p class="text-center"><a href="#" class="btn btn-procast" role="button">Detalhes</a> <a href="#" class="btn btn-default" role="button">Reanunciar</a></p>
							        <p class="text-center"> <a href="#" class="btn btn-danger" role="button">Excluir Permanentemente</a></p>
							      </div>
							    </div>
							</div>
							<div class="col-md-4">
								<div class="thumbnail">
							      <div class="caption">
							      	<img src="img/logo_redcanids.png" class="img-responsive">
							        <h3 class="text-center">Red Canids</h3>
							        <h4 class="text-center">Informações anunciadas</h4>
							        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat velit id mi aliquet, vitae imperdiet velit congue. Nunc bibendum diam eget velit tempus venenatis. Morbi efficitur vitae nibh sit amet vehicula. Pellentesque laoreet  </p>
							        <p class="text-center"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de cotratação:   <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de expiração:</a></p>
							        <p class="text-center"><a href="#" class="btn btn-procast" role="button">Detalhes</a> <a href="#" class="btn btn-default" role="button">Reanunciar</a></p>
							        <p class="text-center"> <a href="#" class="btn btn-danger" role="button">Excluir Permanentemente</a></p>
							      </div>
							    </div>
							</div>
							<div class="col-md-4">
								<div class="thumbnail">
							      <div class="caption">
							      	<img src="img/logo_redcanids.png" class="img-responsive">
							        <h3 class="text-center">Red Canids</h3>
							        <h4 class="text-center">Informações anunciadas</h4>
							        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat velit id mi aliquet, vitae imperdiet velit congue. Nunc bibendum diam eget velit tempus venenatis. Morbi efficitur vitae nibh sit amet vehicula. Pellentesque laoreet  </p>
							        <p class="text-center"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de cotratação:   <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data de expiração:</a></p>
							        <p class="text-center"><a href="#" class="btn btn-procast" role="button">Detalhes</a> <a href="#" class="btn btn-default" role="button">Reanunciar</a></p>
							        <p class="text-center"> <a href="#" class="btn btn-danger" role="button">Excluir Permanentemente</a></p>
							      </div>
							    </div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- Anúncios encerrados -->
			
	
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