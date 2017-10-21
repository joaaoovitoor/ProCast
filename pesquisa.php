<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>Pesquisa</title>
		<link rel="stylesheet" href="css/pesquisa.css" type="text/css"/>
		<link rel="stylesheet" href="css/perfil/perfil.css" type="text/css"/>
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
                    <h1 class="text-center  fonte_branca texto_sombra"><strong>Pesquisa</strong></h1> 
                    <p class="text-center  fonte_branca texto_sombra">
                       Encontre clubes e jogadores
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
			<!--Caixa de Pesquisa-->
        	<div class="row">
				<div class="col-md-offset-2 col-md-8 espaco">
					<div class="col-auto">
				      <label class="sr-only" for="inlineFormInputGroup">Pesquisa</label>
				      <div class="input-group mb-2 mb-sm-0">
				        <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
				        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pesquisa">
				      </div>
				    </div>
				</div>
			</div>
			<!--Filtros-->
			<div class="row">
        		<div class="col-md-offset-2 col-md-2 espaco">
        			Idade
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="idade" value="1" >
					   13-15
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="idade" value="2" >
					   16-19
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="idade" value="3" >
					   20-23
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="idade" value="4" >
					   25-28
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="idade" value="5" >
					   29+
					  </label>
					</div>
        		</div>
				<div class="col-md-2">
        			Região
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="regiao" value="1" >
					   Norte
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="regiao" value="2" >
					   Nordeste
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="regiao" value="3" >
					   Centro-Oeste
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="regiao" value="4" >
					   Sudeste
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="regiao" value="5" >
					   Sul
					  </label>
					</div>
        		</div>
				<div class="col-md-2">
        			Função
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="funcao" value="1" >
					   Atirador
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="funcao" value="2" >
					   Caçador
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="funcao" value="3" >
					   Meio
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="funcao" value="4" >
					   Suporte
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="funcao" value="5" >
					   Topo
					  </label>
					</div>
        		</div>
				<div class="col-md-2">
        			Elo
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="elo" value="1" >
					  Bronze
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="elo" value="2" >
					   Prata
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="elo" value="3" >
					   Ouro
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="elo" value="4" >
					   Platina
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="elo" value="5" >
					   Diamante
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="elo" value="5" >
					   Mestre
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="radio" name="elo" value="5" >
					   Desafiante
					  </label>
					</div>
        		</div>
        	</div>
			<!--Card com Informações-->
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="cartao-equipe">
			            <div class="media">
			                <div class="media-left">
			                    <img class="media-object img-circle profile-img" src="img/fotinha.png">
			                    <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</button>
			                </div>
			                <div class="media-body">
			                    <h3 class="media-heading">Nick carinha</h3>
			                    <h5>Nome carinha</h5>
			                    <p>Função primária: Atirador</p>
			                    <p>Função primária: Meio</p> 
			                    <p>Posição: Alguma coisa</p>
			                </div>
			            </div>
			        </div>
				</div>
			</div>
        </div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>
</html>	
<?php
 include('rodape.html');
?>