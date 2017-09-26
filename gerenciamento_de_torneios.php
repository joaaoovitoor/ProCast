<?php 
	include("menu-admin.html");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Gerencimento de torneios
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/gerenciamento_de_torneios.css">
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
						<h1>Gerenciamento de torneios</h1>
					</div>
				</div>
			</div>
		</section>
		<br>
		<section>
			<div class="tabs tabs-style-linebox">
				<nav>
					<ul>
						<li><a href="#section-linebox-1"><span>Novo torneio</span></a></li>
						<li><a href="#section-linebox-2"><span>Torneios encerrados</span></a></li>
						<li><a href="#section-linebox-3"><span>Torneios em andamento</span></a></li>
					</ul>
				</nav>
				<div class="content-wrap">
					<!-- Nova mensagem -->
			
					<section id="section-linebox-1">
						<h1 class="text-center"> Novo torneio</h1>
						<div class="container-fluid">
							<div class="row">
								<form method="POST" action="#">
									<div class="form-group col-md-12">
										<h4>Nome do torneio:</h4>
										<input type="text" name="nome_torneio" placeholder="Nome do torneio" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<h4>Data de início</h4><input type="date" name="data_incio" class="form-control" placeholder="Dia/Mês/Ano">
									</div>
									<div class="form-group col-md-6">
										<h4>Data do término</h4><input type="date" name="data_fim" class="form-control" placeholder="Dia/Mês/Ano">
									</div>
									<div class="form-group col-md-12">
										<h4>Inserir imagem:</h4>
										<input type="file" name="imagem" class="btn btn-default">
									</div>
									<div class="form-group col-md-12">
										<h4>Descrição:</h4>
										<textarea class="form-control" name="descricao_torneio" placeholder="Digite a descrição"></textarea>
									</div>
									<div class="form-group">
										<input type="submit" name="enviar" class="btn btn-primary center-block" value="Publicar">
									</div>
								</form>
							</div>	
						</div>
					</section>
					<!-- Mensagens criadas -->
					<section id="section-linebox-2">
						<div class="row">
						  <div class="col-sm-12 col-md-12">
						    <div class="thumbnail">
						      <img src="..." alt="...">
						      <div class="caption">
						        <h3>Nome do torneio</h3>
						        <p style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod lorem orci, a commodo nulla tempor vel. Aliquam sed pellentesque mi, id porttitor nunc. Aliquam eget ullamcorper nibh. Mauris elementum porttitor nunc vel imperdiet. Proin pharetra mauris in dolor bibendum, in efficitur urna facilisis. Sed quis est et lacus malesuada vulputate. Etiam facilisis tortor quis nisl interdum semper. Sed velit mi, tristique nec nisl ac, viverra accumsan augue. Nam feugiat leo ut ornare consectetur. Vestibulum ornare cursus justo, ac molestie eros lacinia ut. Fusce pulvinar efficitur elit quis aliquet. Nam maximus orci sed arcu consequat, et mollis risus eleifend. Mauris condimentum odio et fringilla euismod. </p>
						        <hr>
						        <p style="font-size: 14px;">Data de início: 24/08/2017</p>
						        <p style="font-size: 14px;">Data de encerramento: 11/08/2017</p>
						        <p style="font-size: 14px;">Participantes: 500</p>
						        <p><a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil"></i> Editar</a> <a href="#" class="btn btn-danger" role="button"><i class="fa fa-close"></i> Excluir</a></p>
						      </div>
						    </div>
						  </div>
						</div>
					</section>
					<!-- Mensagens arquivadas -->
					<section id="section-linebox-3">
						<div class="row">
						  <div class="col-sm-12 col-md-12">
						    <div class="thumbnail">
						      <img src="..." alt="...">
						      <div class="caption">
						        <h3>Nome do torneio</h3>
						        <p style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod lorem orci, a commodo nulla tempor vel. Aliquam sed pellentesque mi, id porttitor nunc. Aliquam eget ullamcorper nibh. Mauris elementum porttitor nunc vel imperdiet. Proin pharetra mauris in dolor bibendum, in efficitur urna facilisis. Sed quis est et lacus malesuada vulputate. Etiam facilisis tortor quis nisl interdum semper. Sed velit mi, tristique nec nisl ac, viverra accumsan augue. Nam feugiat leo ut ornare consectetur. Vestibulum ornare cursus justo, ac molestie eros lacinia ut. Fusce pulvinar efficitur elit quis aliquet. Nam maximus orci sed arcu consequat, et mollis risus eleifend. Mauris condimentum odio et fringilla euismod. </p>
						        <hr>
						        <p style="font-size: 14px;">Data de início: 1/09/2017</p>
						        <p style="font-size: 14px;">Data de encerramento: 11/10/2017</p>
						        <p style="font-size: 14px;">Participantes: 330</p>
						        <p><a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil"></i> Editar</a> <a href="#" class="btn btn-danger" role="button"><i class="fa fa-close"></i> Encerrar</a></p>
						      </div>
						    </div>
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