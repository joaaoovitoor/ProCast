<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>Criação de Clube</title>
	    <!--ESTILO-->
       	<link rel="stylesheet" href="css/clube/estilo.css">
		<script src="js/jquery.js"></script>
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
		<?php
			include('menu2.php');
		?>
		<div class="banner">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center  texto_sombra"><strong>Criação de clube</strong></h1> 
                    <p class="text-center  texto_sombra">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>Ut enim ad minim veniam
                    </p>
                </div>
            </div>
        </div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-offset-1 col-md-8 col-sm-offset-1 col-sm-8 col-xs-offset-1 col-xs-6">
					<div class="form-group">
						Nome do clube <input type="text" class="form-control" name="nome" placeholder="Nome" maxlength="15" required>
					</div>
					<div class="form-group">
		                Descrição
		                <textarea class="form-control" rows="3" placeholder="Descreva sobre seu clube"></textarea>
		            </div>
				</div>
				<div class="col-md-3 col-sm-3">
					<br><button type="file" class="btn btn-default btn-lg"><p><i class="fa fa-cloud-upload fa-5x" aria-hidden="true"></i></p>Importar logo</button>
				</div>
			</div>
		</div>
		
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
			            <div class="MultiCarousel-inner">
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			            </div>
			            <button class="btn leftLst"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
			            <button class="btn rightLst"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
			        </div>
			    </div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
				<div class="form-group">
				<input type="submit" name="envio" value="Criar" class="form-control btn btn-outro">
				</div>
				</div>
				
			</div>
			
		</div>
		

		<!--RODAPÉ-->
		<?php
		 include('rodape.html');
		?>
		<!---->
		<script src="js/item.js"></script>
        
       
	</body>
</html>	