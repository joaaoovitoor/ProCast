<?php 
	include("menu-admin.html");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Gerencimento de clubes
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/clubes.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 bg-procast titulo">
						<h1>Clubes cadastrados</h1>
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
							     	<button class="btn btn-procast btn-lg" type="submit" name="enviar"> <i class="fa fa-search"></i> Pesquisar clube</button>
							    </span>
							    <input type="text" class="form-control input-lg" placeholder="Digite o nome do clube aqui" name="pesquisa_clube">
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		</br>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="thumbnail">
					      <img src="img/logo.jpg" alt="...">
					      <div class="caption">
					        <h3>Procast</h3>
					        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat velit id mi aliquet, vitae imperdiet velit congue. Nunc bibendum diam eget velit tempus venenatis. Morbi efficitur vitae nibh sit amet vehicula. Pellentesque laoreet  </p>
					        <p><a href="#" class="btn btn-procast" role="button">Detalhes</a> <a href="#" class="btn btn-default" role="button">Editar</a></p>
					      </div>
					    </div>
					</div>
					<div class="col-md-4">
						<div class="thumbnail">
					      <img src="img/logo.jpg" alt="...">
					      <div class="caption">
					        <h3>Procast</h3>
					        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat velit id mi aliquet, vitae imperdiet velit congue. Nunc bibendum diam eget velit tempus venenatis. Morbi efficitur vitae nibh sit amet vehicula. Pellentesque laoreet  </p>
					        <p><a href="#" class="btn btn-procast" role="button">Detalhes</a> <a href="#" class="btn btn-default" role="button">Editar</a></p>
					      </div>
					    </div>
					</div>
					<div class="col-md-4">
						<div class="thumbnail">
					      <img src="img/logo.jpg" alt="...">
					      <div class="caption">
					        <h3>Procast</h3>
					        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat velit id mi aliquet, vitae imperdiet velit congue. Nunc bibendum diam eget velit tempus venenatis. Morbi efficitur vitae nibh sit amet vehicula. Pellentesque laoreet  </p>
					        <p><a href="#" class="btn btn-procast" role="button">Detalhes</a> <a href="#" class="btn btn-default" role="button">Editar</a></p>
					      </div>
					    </div>
					</div>
				</div>
			</div>
		</section>
<?php 
	include("rodapeadm.html");
?>
	</body>
</html>