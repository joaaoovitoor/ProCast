<?php
	include('verificar_logado.php');;
	if ($con['clube']=="") 
	{
		echo('<script>alert("Você não possui clube!");window.location="verificar_perfil.php";</script>');
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
        <?php 
        	if ($con['clube']=="") 
			{
				echo('<script>alert("Você não possui clube!");window.location="verificar_perfil.php";</script>');
			}
        ?>
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
									<li><a href="#3"><span>Agenda</span></a></li>
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
								<section id="3">
								<?php
										$sqlsel='SELECT * FROM agenda where cl='.$con['clube'].';';
										$res=mysqli_query($conexao,$sqlsel);
										if (mysqli_num_rows($res)) {
											while ($control=mysqli_fetch_array($res)) {
												$data=explode('-', $control['data']);

								?>
								<div class="cartao-equipe">
					                <div class="media">
					                    <div class="media-left">
					                        <blockquote>
												<h5>Autor: Clube</h5>
												<p>Dia: <?php echo $data[2].'-'.$data[1].'-'.$data[0]; ?></p>
												<p>Horário: <?php echo $control['hora']; ?></p>
											</blockquote>
					                    </div>
					                    <div class="media-body">
					                        <h3><?php echo $control['evento']; ?></h3>
					                        <h4>Descrição: <?php echo $control['descricao_evento']; ?>
					                        </h4>
					                    </div>
					                </div>
					            </div> 
					            <?php
					            		}
										}  
										else
										{
											echo
											('
												<h1 class="text-center"><img src="img/triste.png"></h1>
												<h3 class="text-center">Sem eventos marcados</h3>

											');
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
									<?php
										$sqlsel='SELECT * FROM clube WHERE id_clube='.$con['clube'].';';
										$resul=mysqli_query($conexao,$sqlsel);
										$cl=mysqli_fetch_array($resul);
										$sqlsel='SELECT * FROM video WHERE tipo="C" and id_usuario='.$cl['id_usuario'].';';
										$resul=mysqli_query($conexao,$sqlsel);
										if (mysqli_num_rows($resul))
										{
											while ($vd=mysqli_fetch_array($resul))
											{

												$id = explode('=',$vd['url']);

												if(strstr($id[1],'&')==true)
												{
													$idNovo = explode('&',$id[1]);
												}else{

													$idNovo[0] = $id[1];

												}
												echo
													('
														<div class="card mb-3">
															<div class="embed-responsive embed-responsive-16by9">
																<iframe width="560" height="315" class="embed-responsive-item" src="http://www.youtube.com/embed/'.$idNovo[0].'" frameborder="0" allowfullscreen ng-show="showvideo"></iframe>
														  		
															</div>
															<div class="card-body">
																<h4 class="card-title">'.$vd['titulo_video'].'</h4>
																<p class="card-text">'.$vd['descricao_video'].'</p>
																<p class="card-text"><small class="text-muted">Publicado em: '.$vd['data_video'].'</small></p>
																
										                	
															</div>
														</div>
													');	

											}
											
										}
										else
										{
											echo
											('
												<h1 class="text-center"><img src="img/triste.png"></h1>
												<h3 class="text-center">Você ainda não possui nenhum vídeo</h3>
												<h5 class="text-center">Clique em compartilhar vídeo</h5>

											');
										}
									?>

								</section>
								<!--FIM MENU - VÍDEOS-->
								<!-- MENU - FOTOS -->
								<section id="5">
									<?php
										$sqlsel='SELECT * from foto where id_clube='.$con['clube'].';';
										$res=mysqli_query($conexao,$sqlsel);
										if (mysqli_num_rows($res)) {
											while ($control=mysqli_fetch_array($res)) {
												# code...
											
									?>
									<div class="col-md-4">
											<a href="uploads/<?php echo($control['foto']); ?>" target="blank">
												<div class="thumbnail foto">
	      											<img src="uploads/<?php echo($control['foto']); ?>" alt="...">
	     											<div class="caption">
												        <p class="text-center"><?php echo($control['legenda_foto']); ?></p>
												        <p class="text-center"><?php echo($control['data_foto']); ?></p>
												    </div>
												</div>
											</a>
										</div>
									<?php
												}
											}
									?>
									
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
