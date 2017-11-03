<?php
	include('verificar_logado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Clubes</title>
	    <link rel="stylesheet" href="css/controle_clubes.css">
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
		<?php
			include('menu2.php');
		?>
		<div class="box-investidor">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-offset-4 col-xs-8 col-md-offset-1 col-md-1">
						<img src="img/perfil_icon.png" alt="" class="img-circle">
					</div>
					<div class="col-xs-12 col-md-5">
						<h4>Nome do investidor</h4>
						<p>
							In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
						</p>
						<p>
							<strong>Número de clubes:</strong> 
						</p>
						<p>
							<strong>Número de jogadores:</strong> 
						</p>
						<div>
							<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#modal_adc_clube">
							  	<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Adicionar clube
							</button>
							<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#modal_adc_evento">
							  	<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Agendar evento
							</button>
						</div>
					</div>
				</div>
			</div>				
		</div>
		<div class="container-fluid">
			<div class="row">
				<form action="" method="POST" class="no-radius">
					<div class="input-group input-group-lg">
					  	<input type="text"  name="pesquisa_texto" class="form-control pesquisa" placeholder="Pesquisar clube" aria-describedby="pesquisar">
					  	<span class="input-group-btn" id="pesquisar">
					  		<button type="submit" name="pesquisar_btn" class="btn btn-lg pesquisa"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
					  	</span>
					</div>
				</form>
			</div>
			<div class="row corpo">
				<h3><strong>Clubes Patrocinados</strong></h3>
				<div class="col-xs-12 col-md-3 clube-card">
					<img src="img/clube_icon.png" alt="" class="img-circle img-responsive">
					<h4 class="text-center"><strong>Nome do Clube</strong></h4>
					<p>
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
						<strong>Número de jogadores:</strong>
					</p>
					<p>
						<span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 
						<strong>Total de partidas ganhas:</strong>
					</p>
					<p>
						<span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 
						<strong>Total de partidas perdidas:</strong>
					</p>
					<p>
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> 
						<strong>Data de criação:</strong>
					</p>
					<div class="btn-group col-md-offset-4 col-xs-offset-7 " role="group">
						<button class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Jogadores"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></button> 

						<button class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Enviar mensagem"> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button>

						<button class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Marcar Evento"> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></button>
						
						<button class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Desfazer investimento"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
					</div>
				</div>
			</div>
		</div>

		<!--MODAIS-->
		<!--Modal novo clube-->
		<div class="modal fade" id="modal_adc_clube" tabindex="-1" role="dialog" aria-labelledby="adc_clube_label">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
				    <div class="modal-header cinza-esc">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        	<h4 class="modal-title" id="adc_clube_label">Adicionar clube</h4>
			      	</div>
			      	<div class="modal-body cinza-cl">
			        	<div class="row">
			        		<form action="">
			        			<div class="form-group">
								    <label for="nome_clube" class="col-sm-2 control-label">Nome do clube:</label>
								    <div class="col-sm-10">
								      	<input type="text" class="form-control cinza-esc" id="nome_clube" placeholder="Digite o nome do clube" name="nome_clube">
								    </div>
								</div>
			        		</form>
			        	</div>
			      	</div>
			      	<div class="modal-footer cinza-esc">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				        <button type="button" class="btn btn-primary">Criar clube</button>
			     	</div>
			    </div>
			</div>
		</div>
		<!--fim novo clube-->
		<!--Modal novo clube-->
		<div class="modal fade" id="modal_adc_evento" tabindex="-1" role="dialog" aria-labelledby="adc_evento_label">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
				    <div class="modal-header cinza-esc">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        	<h4 class="modal-title" id="adc_clube_label">Adicionar Evento</h4>
			      	</div>
			      	<div class="modal-body cinza-cl">
			        	<div class="row">
			        		<form action="">
			        			<div class="form-group">
								    <label for="tipo_evento" class="col-sm-2 control-label">Tipo do Evento:</label>
								    <div class="col-sm-10">
								      	<input type="text" class="form-control cinza-esc" id="tipo_evento" placeholder="Digite o tipo do evento" name="tipo_evento">
								    </div>
								</div>
								<div class="form-group">
								    <label for="data_evento" class="col-sm-2 control-label">Data do Evento:</label>
								    <div class="col-sm-10">
								      	<input type="date" class="form-control cinza-esc" id="data_evento" placeholder="Digite a data do evento" name="data_evento">
								    </div>
								</div>
			        		</form>
			        	</div>
			      	</div>
			      	<div class="modal-footer cinza-esc">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				        <button type="button" class="btn btn-primary">Criar clube</button>
			     	</div>
			    </div>
			</div>
		</div>
		<!--fim novo clube-->

		<?php
			include('rodape.html');
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script>
    		$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			})
    	</script>
	</body>
</html>