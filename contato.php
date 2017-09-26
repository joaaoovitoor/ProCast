<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>ProCast</title>
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/contato.css">
	</head>
	<body>
		<?php
			include('menu2.php');
		?>
		<div class="banner">
			<div class="container-fluid">
				<div class="row">
					<h1 class="text-center fonte_branca texto_sombra"><strong>Contate-nos</strong></h1>	
					<p class="text-center fonte_branca texto_sombra">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>Ut enim ad minim veniam
					</p>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row font-25 text-center info">
				<i class="fa fa-phone fonte_azul_claro"></i> (11) 4002-8922
				<i class="fa fa-envelope fonte_azul_claro"></i> Procast@empresa.com
			</div>
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="panel sombra bg_branco form_panel">
						<div class="panel-body">
							<form action="#" method="POST">
								<div class="col-md-6">
									<input type="text" class="form-control input-lg" placeholder="Título da mensagem">
								</div>
								<div class="col-md-6">
									<select name="assunto" class="form-control input-lg">
										<option value="0" class="disabled">Selecione um assunto</option>
										<option value="1">Dicas</option>
										<option value="2">Problemas</option>
										<option value="3">Reclamações</option>
										<option value="3">Propostas</option>
									</select>
								</div>
								<div class="col-md-12 mg_tp">
									<textarea name="mensagem" rows="10" maxlength="1000" class="form-control" placeholder="Escreva sua mensagem"></textarea>
								</div>
								<p class="help-block mg_tp">Envie um print se necessário</p>
								<div class="col-md-12">
									<input type="file" class="btn sem_bg borda_azul fonte_azul_claro mg_bt" name="anexo">
								</div>
								<div class="col-md-12 mg_tp">
									<button type="submit" class="btn btn-block bg_azul_escuro btn-lg fonte_branca" name="enviar" > <strong>Enviar <span class="glyphicon glyphicon-send" aria-hidden="true"></span></strong> </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			include('rodape.html');
		?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>            
	</body>
</html>