<?php
	include('verificar_logado.php');
	include('conexao.php');
	$sqlsel='SELECT * FROM clube WHERE id_clube='.$con['clube'].';';
	$resul=mysqli_query($conexao,$sqlsel);
	if (mysqli_num_rows($resul)<=0) 
	{
		echo('<script>alert("Você não possui clube!");window.location="perfil_jogador
			.php";</script>');
	}
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
                       Veja as informações do seu clube<br>e quais são seus colegas de time!
                </div>
            </div>
        </div>
		<div class="container-fluid">
			<div class="row">
				<!-- Cartão com informações -->
				<div class="col-md-5">
			        <div class="cartao-grande">
			        	<?php 
			        		$sqlsel='SELECT * FROM clube WHERE id_clube='.$con['clube'].';';
				        	$resul=mysqli_query($conexao,$sqlsel);
				        	$con2=mysqli_fetch_array($resul);
				        	$cam='uploads/'.$con2['logo_clube'];
			        	?>
			            <p align="center"><img src="<?php echo $cam; ?>" class="img-responsive" width="75%"></p>
			            <div class="clube-cartao">
			                <div class="row">
			                    <div class="col-sm-12">
			                        <span class="coach-name"><p><?php echo $con2['nome_clube']; ?></p></span>
			                        <span class="coach-job"><p>Descriçaõ: <?php echo $con2['descricao_clube']; ?></p></span>
			                    </div>
			                </div>
			            </div>
			            <div class="descricao">
			                    
			                    <?php 
			                    	$dataexplode = explode("-",$con2['dta_criacao']);
									$cont=2;
									for($i=0;$i<3;$i++)
									{
										$datainv[$i]=$dataexplode[$cont];
										$cont--;
									}
									$datacerto=implode("/", $datainv);
									$sqlnumjog='SELECT * FROM usuario WHERE clube='.$con2['id_clube'].' AND categoria_usuario=1;';
									$resulnumjog=mysqli_query($conexao,$sqlnumjog);
									$numjog=mysqli_num_rows($resulnumjog);
			                    ?>
			                    <p><strong>Data de criação:</strong> <?php echo $datacerto; ?></p>
			                    <p><strong>Jogadores:</strong> <?php echo $numjog; ?> </p>
			                    <p><strong>Partidas jogadas:</strong> 0 </p> 
			                    <p><strong>Vitórias:</strong> 0 </p> 
			                    <p><strong>Derrotas:</strong> 0 </p> 
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
									<!-- <li><a href="#3"><span>Torneio</span></a></li> -->
									<li><a href="#4"><span>Vídeos</span></a></li>
									<li><a href="#5"><span>Fotos</span></a></li>
								</ul>
							</nav>
							<div class="content-wrap">
								<!-- MENU - CLUBE -->
								<section id="1">
						            <?php
										if(empty($con['clube']))
										{
											echo 
											('
												<h1 class="text-center"><img src="img/triste.png"></h1>
												<h3 class="text-center">Seu clube ainda não possui jogadores</h3>
											');
										}
										else
										{
											$sqlseli='SELECT * FROM usuario WHERE clube='.$con['clube'].' AND categoria_usuario=2;';
											$resuli=mysqli_query($conexao,$sqlseli);
											while ($ctrli=mysqli_fetch_array($resuli))
											{
												echo
												('
													<div class="cartao-equipe">
										                <div class="media">
										                    <div class="media-left">
										                        <img class="media-object img-circle img-responsive perfil_img" src="uploads/'.$ctrli['foto_perfil'].'">
										                        <p><a class="btn btn-default " href="escrever_mensagem.php?rm='.$ctrli['id_usuario'].'"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</a></p>
										                    </div>
										                    <div class="media-body">
										                        <h3 class="media-heading">'.$ctrli['nome'].' '.$ctrli['sobrenome'].'</h3>');
										                        
										                        if($ctrli['descricao']==NULL)
										                        {
										                        	echo '<h5>Nenhuma descrição!</h5>';
										                        }
										                        else
										                        {
										                        	echo '<h5>'.$ctrli['descricao'].'<h5>';
										                        }
										                        echo ('
										                        <h5>Usuário Investidor e dono do clube '.$con2['nome_clube'].'</h5>
										                    </div>
										                </div>
										            </div>
												');
											}

											$sqlsel='SELECT * FROM usuario WHERE clube='.$con['clube'].' AND categoria_usuario=1;';
											$resul=mysqli_query($conexao,$sqlsel);
											while ($ctrl=mysqli_fetch_array($resul))
											{
												$sqlsel='SELECT * FROM funcao WHERE id_funcao='.$ctrl['funcao_1'].';';
												$resul1=mysqli_query($conexao,$sqlsel);
												$f1=mysqli_fetch_array($resul1);
												$sqlsel='SELECT * FROM funcao WHERE id_funcao='.$ctrl['funcao_2'].';';
												$resul2=mysqli_query($conexao,$sqlsel);
												$f2=mysqli_fetch_array($resul2);
												echo
												('
													<div class="cartao-equipe">
										                <div class="media">
										                    <div class="media-left">
										                        <img class="media-object img-circle img-responsive perfil_img" src="uploads/'.$ctrl['foto_perfil'].'">
										                        <p><a class="btn btn-default " href="escrever_mensagem.php?rm='.$ctrl['id_usuario'].'"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</a></p>
										                    </div>
										                    <div class="media-body">
										                        <h3 class="media-heading">'.$ctrl['nick'].'</h3>
										                        <h5>'.$ctrl['nome'].' '.$ctrl['sobrenome'].'</h5>
										                        <p>Função primária: '.$f1['nome_funcao'].'</p>
										                        <p>Função primária: '.$f2['nome_funcao'].'</p> 
										                    </div>
										                </div>
										            </div>
												');
											}
										}
									?>
						            
						            
								</section>
								<!--FIM MENU - CLUBE-->
								<!-- MENU - TORNEIO -->
								<!-- <section id="3">
									<div class="cartao-equipe cinza">
								      <h2>Card title</h2>
								      This card has supporting text below as a natural lead-in to additional content.<br>
								      <small class="text-muted">Last updated 3 mins ago</small>
						            </div>
								</section> -->
								<!--FIM MENU - TORNEIO-->
								<!-- MENU VÍDEOS -->
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
								<!--FIM MENU - VÍDEOS-->
								<!-- MENU - FOTOS -->
								<section id="5">
									<div class="esp-instagram">
									<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:37.5% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BFJ8MEJuM8m/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">aconchego ❤  #cat #cute #vscocam #love</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">Uma publicação compartilhada por Maira Souza (@mairasouza__) em <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-05-08T17:52:19+00:00">Mai 8, 2016 às 10:52 PDT</time></p></div>										</blockquote>
<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>

<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:33.21875% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BF1cQL1uM51/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">nature ❤</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">Uma publicação compartilhada por Maira Souza (@mairasouza__) em <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-05-25T15:19:51+00:00">Mai 25, 2016 às 8:19 PDT</time></p></div></blockquote>
<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
									</div>
								</section>
								<!--FIM MENU - FOTOS-->
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
