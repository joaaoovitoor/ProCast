<!DOCTYPE html>
<?php 
	include('menu-admin.html');
?>
<html>
	<head>
		<title>
			Mensagens
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<style type="text/css">
		body
		{
			margin: 0px;
			padding: 0px;
		}
		.bg-procast
		{
			background-color: #02314C;
			color:white;
		}
		.titulo
		{
			padding: 50px;
		}
		.btn-procast
		{
			background-color: #02314C;
			color:white;
		}
	</style>
	<body>
		<section>
			<div class="container-fluid bg-procast">
				<div class="row align-items-center">
					<div class="col-md-12 titulo">
						<h1>Mensagens </h1>
					</div>
				</div>
			</div>
		</section>
		<br>
		<section>
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-md-12 col-xs-12">
						<div class="card mb-3">
						  <div class="card-body">
						    <h4 class="card-title">Titulo da mensagem</h4>
						    <p class="card-text">texto da mensagem</p>
						    <p class="card-text"><small class="text-muted">Data de envio</small></p>
						     <p class="card-text"><small class="text-muted">Nome</small></p>
						      <p class="card-text"><small class="text-muted">Email</small></p>
						    <p class="card-text"><button class="btn btn-procast"><i class="fa fa-refresh"></i> Responder</button> <button class="btn btn-danger"><i class="fa fa-close"></i> Excluir</button></p>
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
