<?php
	ob_start();
	include('verificar_logado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <title>Clube</title>
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
	</head>
	<body>
		<?php
            include('menu2.php');
        ?>
        <!--BANNER CLUBE-->
		<div class="banner clube">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center  texto_sombra"><strong>Clube</strong></h1> 
                    <p class="text-center  texto_sombra">
                       Administre seus jogadores, obtenha<br>e altere as informações do clube
                    </p>
                </div>
            </div>
        </div>
		<div class="container-fluid">
			<div class="row">
				<!-- CARD COM INFORMAÇÕES -->
				<div class="col-md-5">
			        <div class="cartao-grande">

					<?php
			        	$sqlsel='SELECT * FROM clube WHERE id_usuario='.$con['id_usuario'].';';
			        	$resul=mysqli_query($conexao,$sqlsel);
			        	$con2=mysqli_fetch_array($resul);
			        	echo('<label for="anexo" class="arq2"><img src="uploads/'.$con2['logo_clube'].'" class="img-circle img-responsive perfil_img"></label>');
			        ?>
			            <div class="clube-cartao">
			                <div class="row">
			                    <div class="col-sm-12">
			                        <span class="coach-name"><p>Nome do clube</p></span>
			                        <span class="coach-job"><p>Descriçaõ: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p></span>
			                    </div>
			                </div>
			            </div>
			            <div class="descricao">
			                    
			                    <p><strong>Ranking:</strong> Suporte</p>
			                    <p><strong>Data de criação:</strong> 05/04/2017</p>
			                    <p><strong>Jogadores:</strong> 8 </p>
			                    <p><strong>Partidas jogadas:</strong> 25 </p> 
			                    <p><strong>Vitórias:</strong> 20 </p> 
			                    <p><strong>Derrotas:</strong> 5 </p> 
			            </div>
			        </div>
				</div>
				<div class="col-md-7">
					<section>
						<div class="tabs tabs-style-linebox">
							<!-- MENU -->
							<nav>
								<ul>
									<li><a href="#1"><span>Jogadores</span></a></li>
									<li><a href="#2"><span>Evento</span></a></li>
									<li><a href="#3"><span>Torneio</span></a></li>
									<li><a href="#4"><span>Vídeos</span></a></li>
									<li><a href="#5"><span>Fotos</span></a></li>
									<li><a href="#6"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
								</ul>
							</nav>
							<div class="content-wrap">
								<!-- MENU - CLUBE -->
								<section id="1">
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
								</section>
								<!-- MENU - EVENTO -->
								<section id="2">
									<div class="container-fluid">
										<h4 align="center">Crie um evento</h4>
										<div class="form-group">
											Nome do Evento <input type="text" class="form-control" name="nome" placeholder="Nome" maxlength="15" required>
										</div>
										<div class="form-group">
							                Descrição
							                <textarea class="form-control" rows="3" placeholder="Descreva sobre o novo evento"></textarea>
							            </div>
							            <div class="form-group">
							            Data <input type="date" class="form-control cinza-esc" id="data_evento" placeholder="Digite a data do evento" name="data_evento">
							            </div>
							            <div class="form-group">
											Horário <input type="text" class="form-control" name="nome" placeholder="Horário" maxlength="15" required>
										</div>
							            <br><input class="form-control azul" type="submit" name="confirmar" value="Criar">
									</div>
								</section>
								<!-- MENU - TORNEIO -->
								<section id="3">
									<div class="cartao-equipe cinza">
								      <h2>Card title</h2>
								      This card has supporting text below as a natural lead-in to additional content.<br>
								      <small class="text-muted">Last updated 3 mins ago</small>
						            </div>
								</section>
								<!-- MENU VÍDEOS -->
								<section id="4">
									<input class="form-control azul" type="submit" value="Compartilhar Vídeo" data-toggle="collapse" data-target="#publicacao" aria-expanded="false" aria-controls="collapseExample"><br>
									<div class="collapse" id="publicacao">
									<div class="card card-body">
										<div class="form-group">
										    <label class="form-control-label" for="formGroupExampleInput">Nome do Vídeo</label>
											<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nome">
										</div>
										<div class="form-group">
										    <label for="exampleFormControlTextarea1">Descrição</label>
										    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Faça uma breve descrição do vídeo"></textarea>
										</div>
										<div class="form-group">
										    <label for="exampleFormControlTextarea1">Link</label>
										    <a href="ajuda.php"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
										    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
										</div>
										<br><input class="form-control" type="submit" name="publicar" value="Publicar"><br>
									</div>
									</div>
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
								<!-- MENU - FOTOS -->
								<section id="5">
									<input class="form-control azul" type="submit" value="Compartilhar Foto" data-toggle="collapse" data-target="#foto" aria-expanded="false" aria-controls="collapseExample"><br>
									<div class="collapse" id="foto">
									<div class="card card-body">
										<div class="form-group">
										    <label for="exampleFormControlTextarea1">Link</label>
										    <a href="ajuda.php"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
										    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
										</div>
										<br><input class="form-control" type="submit" name="publicar" value="Publicar"><br>
									</div>
									</div>
									<div class="esp-instagram">
									<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:37.5% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BFJ8MEJuM8m/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">aconchego ❤  #cat #cute #vscocam #love</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">Uma publicação compartilhada por Maira Souza (@mairasouza__) em <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-05-08T17:52:19+00:00">Mai 8, 2016 às 10:52 PDT</time></p></div>										</blockquote>
<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>

<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:33.21875% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BF1cQL1uM51/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">nature ❤</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">Uma publicação compartilhada por Maira Souza (@mairasouza__) em <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-05-25T15:19:51+00:00">Mai 25, 2016 às 8:19 PDT</time></p></div></blockquote>
<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
									</div>
								</section>
								<!-- MENU - ALTERAR-->
								<section id="6">
									<div class="row">
										<div class="col-md-6">
											<div class="cartao-equipe">
								                <div class="media">
								                    <div class="media-left">
								                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
								                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Excluir </button>
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
										<div class="col-md-6">
											<div class="cartao-equipe">
								                <div class="media">
								                    <div class="media-left">
								                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
								                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Excluir</button>
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
									<div class="row">
										<div class="col-md-6">
											<div class="cartao-equipe">
								                <div class="media">
								                    <div class="media-left">
								                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
								                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Excluir </button>
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
										<div class="col-md-6">
											<div class="cartao-equipe">
								                <div class="media">
								                    <div class="media-left">
								                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
								                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Excluir</button>
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
									<div class="row">
										<div class="col-md-6">
											<div class="cartao-equipe">
								                <div class="media">
								                    <div class="media-left">
								                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
								                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Excluir </button>
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
										<div class="col-md-6">
											<div class="cartao-equipe">
								                <div class="media">
								                    <div class="media-left">
								                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
								                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Excluir</button>
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
								</section>
							</div>
						</div>
					</section>
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
