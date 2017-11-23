<?php
	include('verificar_logado.php');

	$cod=urldecode($_GET['pesq']);
	$sqlper=('SELECT * FROM usuario WHERE nick="'.$cod.'";');
	$resul_perf=mysqli_query($conexao,$sqlper);
	$dados_perf=mysqli_fetch_array($resul_perf);
?>
<html lang="pt-br">
	<head>
        <title>Perfil</title>
	    <!--MENU PERFIL-->
	    <link rel="stylesheet" type="text/css" href="css/perfil/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/perfil/tabstyles.css" />
  		<script src="js/modernizr.custom.js"></script>
  		<!--ESTILO PERFIL-->
  		<link rel="stylesheet" href="css/perfil/perfil.css">
  		<script src="js/bootstrap.js"></script>
	    <script src="js/jquery.js"></script>
		<?php
			include('link_head.html');
		?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	</head>
	<body>
	<?php
        include('menu2.php');
    ?>
	<div class="banner-perfil perfil">s
		<div class="container-fluid">
			<div class="row">
				<!-- CARD COM INFORMAÇÕES - GRANDE -->
				<div class="col-md-offset-0 col-md-5 hidden-sm hidden-xs">
			        <div class="cartao-grande spc-cartao">
			        	<div class="col-md-offset-4 col-md-4">
			        		<?php
			        			if($dados_perf['foto_perfil']){
			        				$cam='uploads/'.$dados_perf['foto_perfil'];
			        			}
			        			else{
			        				$cam='img/perfil_icon.png';
			        			}
			        			echo('<label for="anexo" class="arq2"><img src="'.$cam.'" class="img-circle img-responsive perfil_img"></label>');
			        		?>
			        	</div>
			        	<div class="text-center col-xs-12">
			        	</div>
						<div class="row">
			                <div class="col-md-1"></div>
			                <div class="col-md-10">
			                    <div class="informacoes">
			                        Nick<br><?php echo $dados_perf['nick'];?>
			                    </div>
			                </div>
			            </div>
			            <div class="clube-cartao">
			                <div class="row">
			                    <div class="col-sm-6">
			                        <span class="coach-name"><p>Clube</p></span>
			                        <span class="coach-job"><p>Red Canids</p></span>
			                    </div>
			                    <div class="col-sm-6">
			                        <img src="img/logo_redcanids.png" width="100">
			                    </div>
			                </div>
			            </div>
			            <div class="descricao">
		                    <p><strong>Sobre:</strong></p>
		                    <?php
		                    if($dados_perf['descricao']==NULL){
								echo '<p>Nenhuma descrição</p>';
							}else{
		                    	echo ('<p>'.$dados_perf['descricao'].'</p>');
							}
		                    ?>
		                    <p><strong>Função Primária:</strong>
		                    <?php 
								$sqlsel='SELECT * FROM funcao WHERE id_funcao='.$dados_perf['funcao_1'].';';
								$resul=mysqli_query($conexao,$sqlsel);
								$con2=mysqli_fetch_array($resul);
								echo($con2['nome_funcao']);
							?>
		                    </p>
		                    <p><strong>Função Secundária:</strong>
		                    <?php 
								$sqlsel='SELECT * FROM funcao WHERE id_funcao='.$dados_perf['funcao_2'].';';
								$resul=mysqli_query($conexao,$sqlsel);
								$con2=mysqli_fetch_array($resul);
								echo($con2['nome_funcao']);
							?>
		                    </p>
		                   <?php 
		                   		include('api.php');
								include('ver_url.php');
							?>
			            </div>
			        </div>
				</div>
				<!-- CARD COM INFORMAÇÕES - PEQUENO -->
				<div class="hidden-md hidden-lg">
					<div class="cartao">
					 <img src="img/perfil_icon.png" class="img-circle">
                        <p>Nick: <?php echo $dados_perf['nick'];?> </p>
                        <p>Clube: Red Canids</p>
		                <p>SOBRE MIM:
		                <?php
		                    if($dados_perf['descricao']==NULL){
								echo 'Crie uma descrição<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>';
							}else{
		                    	echo $dados_perf['descricao'];
							}
	                    ?>
		                </p>
		            </div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<!-- MENU -->
			<div class="col-md-7">
			<section><div class="tabs tabs-style-linebox">
				<nav>
					<ul>
						<li><a href="#1"><span>Clube</span></a></li>
						<li><a href="#2"><span>Agenda</span></a></li>
						<li><a href="#3"><span>Vídeos</span></a></li>
						<li><a href="#4"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></a></li>
					</ul>
				</nav>
				<div class="content-wrap">
				<!--MENU - CLUBE-->
				<section id="1">
		            <?php 
					$sqlclube='SELECT * FROM clube WHERE id_usuario='.$dados_perf['id_usuario'].';';
					$resulclube = mysqli_query($conexao,$sqlclube);
					$dados=mysqli_fetch_array($resulclube);
					$rows=mysqli_num_rows($resulclube);
					if($rows>0)
					{
						$dataexplode = explode("-",$dados['dta_criacao']);
						$cont=2;
						for($i=0;$i<3;$i++)
						{
							$datainv[$i]=$dataexplode[$cont];
							$cont--;
						}
						$datacerto=implode("/", $datainv);
						echo "Jogadores do seu clube:";
						for($v=0;$v<$rows;$v++){ 
						?>
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
			        <?php 
			    		}
					}
					else{
						echo 'Usuário não participa de nenhum clube!';
					}
					?>
				</section>
				<!--MENU - AGENDA-->
				<section id="3">
					<div class="cartao-equipe">
		                <div class="media">
		                    <div class="media-left">
		                        <blockquote>
									<h5>Autor: <a href="#">Alguém</a></h5>
									<p>Dia: 05/04/2017</p>
									<p>Horário: 17:30</p>
								</blockquote>
		                    </div>
		                    <div class="media-body">
		                        <h3>Título do Evento</h3>
		                        <h4>Descrição: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
		                        </h4>
		                    </div>
		                </div>
		            </div>   
				</section>
				<!--MENU - VÍDEO-->
				<section id="4">
					<div class="card mb-3">
						<div class="embed-responsive embed-responsive-16by9">
				  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/-6JqoJrM9IM"></iframe>
				</div>
						<div class="card-body">
							<h4 class="card-title">Nome do Vídeo</h4>
							<p class="card-text">Descrição do Vídeo</p>
							<p class="card-text"><small class="text-muted">Publicado em:20/08/2017</small></p>
						</div>
					</div>
				</section>
				<!--MENU - ALTERAR-->
				<section id="5">
				   <div class="text-center">Denunciar jogador</div>
				   <form action="#" method="POST">
				   		<div class="form-group">
				   			Motivo:
				   			<select name="motivo">
				   				<option value="1">Informações falsas</option>
				   				<option value="2">Vídeos de outra autoria</option>
				   				<option value="3">Conteúdo inadequado</option>
				   				<option value="4">Comportamento indevido</option>
				   			</select>
				   		</div>
				   		<div class="form-group">
				   			Descreva a denúncia:<br>
				   			<textarea name="desc_denuncia" cols="100" rows="3" placeholder="Escreva aqui sobre os motivos da denúncia" style="resize: none;" required=""></textarea>
				   		</div>
				   		<div class="form-group">
				   			<input class="form-control azul" type="submit" name="denunciar" value="Denunciar" style="width: 200px;">
				   		</div>
				   </form>
				   <?php 
				   		if(isset($_POST['denunciar']))
				   		{
				   			$motivo=$_POST['motivo'];
				   			$desc_denuncia = $_POST['desc_denuncia'];

				   			if(empty($desc_denuncia))
				   			{
				   				echo('<script>alert("Digite a descrição da denúncia!");</script>');
								echo('<script>window.location="ver_jogador.php";</script>');
				   			}
				   			else
				   			{
				   				$sqlden='INSERT INTO denuncia(descricao_denuncia, tipo_denuncia, data_denuncia, id_usuario, id_denunciante) 
				   				VALUES ("'.$desc_denuncia.'","'.$motivo.'", NOW(),'.$dados_perf['id_usuario'].','.$con['id_usuario'].');';
				   				$den=mysqli_query($conexao,$sqlden);
				   				if($den)
				   				{
				   					echo('<script>alert("Denuncia realizada com sucesso!");</script>');
									echo('<script>window.location="ver_jogador.php";</script>');
				   				}
				   				else
				   				{
				   					echo('<script>alert("Erro ao fazer denúncia!");</script>');
									echo('<script>window.location="ver_jogador.php";</script>');
				   				}
				   			}
				   		}
				   ?>
				</section>
				</div>
			</div></section>
			</div>
		</div>
	</div>
	<?php
		include('rodape.html');
	?>
	<!--Validação-->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <!--Modal-->
    <script>
	    $('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').focus()
		})
	</script>
	<!-- Menu perfil -->
	<script src="js/cbpFWTabs.js"></script>
	<script>
	(function() {

	[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
		new CBPFWTabs( el );
	});

	})();
	</script>
    </body>
</html>