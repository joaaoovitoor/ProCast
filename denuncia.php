<?php 
	include("menu-admin.html");
?>
		<title>Denúncias</title>
		<meta name="viewport" content="width-device-width, initial-scale=1">
		<!-- Adicionando CSS Bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/perso.css">
		<div class="container-fluid">
			<div class="row">
						<div class="col-md-12 bg-procast titulo">
							<h1>Denúncias</h1>
						</div>
					</div>
			<div class="espaco"> 
			Organizar por: <button class="btn btn-default "><span class="glyphicon glyphicon-sort-by-order" aria-hidden="true"></span> Data</button>&nbsp&nbsp<button class="btn btn-default "><span class="glyphicon glyphicon-sort-by-order-alt" aria-hidden="true"></span> Tipo</button>
		</div>
		<br>
		<div class="col-md-3">
			<ul class="list-group">	
				
					<li class="list-group-item active"><center>
						<img src="img/teste.png" class="img-den"></center></li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nome:</li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Motivo:</li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Denunciado por:</li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Número de denúncias:</li>
					<li class="list-group-item"><center>
						<button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comunicar</button>
						<button class="btn btn-default "><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Banir usuário</button>
					</center></li>
				
			</ul>
		</div>
		</div>
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php 
	include("rodapeadm.html");
?>
	</body>
</html>