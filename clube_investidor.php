<?php
	include('verificar_logado.php');
	if ($con['clube']=="") 
	{
		echo('<script>alert("Você não possui clube!");window.location="criar_clube.php";</script>');
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
			        	$cam='uploads/'.$con2['logo_clube'];
			        	echo('<label for="anexo" class="arq"><p align="center"><img src="'.$cam.'" class="img-responsive" width="75%"><p><p class="text-center">Clique para escolher uma nova foto</p></label>');
			        ?>
			        	<p>
			        		<form action="#" method="POST" enctype="multipart/form-data">
			        			<input type="file" name="anexo" id="anexo">
			        			<button type="submit" class="btn btn_foto">Mudar foto do clube</button>
	                        </form>
                    	</p>
			        	<?php
			        		if (isset($_FILES['anexo']))
	                        {
	                            $extensao=strtolower(substr($_FILES['anexo']['name'], -4));
	                            $novo_nome=md5(time().$con['id_usuario']).$extensao;
	                            $diretorio="uploads/";
	                            if(move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome))
	                        	{
		                            $sqlup='update clube set logo_clube="'.$novo_nome.'" where id_usuario='.$con['id_usuario'].';';
		                            mysqli_query($conexao,$sqlup);
		                            echo('<script>window.location="clube_investidor.php";</script>');
	                        	}
	                        	else
	                        	{
	                        		echo('<script>swal("Primeiro escolha uma nova foto", "Para escolher uma foto nova clique sobre a antiga", "error");</script>');
	                        	}

	                        }
			        	?>

			            <div class="clube-cartao">
			                <div class="row">
			                    <div class="col-sm-12">
			                        <span class="coach-name"><p><?php echo $con2['nome_clube']; ?></p></span>
			                        <span class="coach-job"><p>Descrição: <?php echo $con2['descricao_clube']; ?></p></span>
			                        <a href="pesquisa.php"><p><button type="submit" class="btn btn_foto btn_saircb" data-toggle="tooltip" data-placement="right" title="Clique aqui para buscar jogadores para o seu clube!" name="sair_clube">Buscar jogadores</button></p></a>
			                    </div>
			                </div>
			            </div>
			            <div class="descricao">
			                    <?php 
			                    	$dataexplode=explode("-",$con2['dta_criacao']);
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
									<!-- <li><a href="#3"><span>Torneio</span></a></li> -->
									<li><a href="#4"><span>Vídeos</span></a></li>
									<li><a href="#5"><span>Fotos</span></a></li>
									<li><a href="#6"><span>Dados</span></a></li>
								</ul>
							</nav>
							<div class="content-wrap">
								<!-- MENU - Jogadores -->
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
								<!-- <section id="3">
									<div class="cartao-equipe cinza">
								      <h2>Card title</h2>
								      This card has supporting text below as a natural lead-in to additional content.<br>
								      <small class="text-muted">Last updated 3 mins ago</small>
						            </div>
								</section> -->
								<!-- MENU VÍDEOS -->
								<section id="4">
									<input class="form-control azul" type="submit" value="Compartilhar Vídeo" data-toggle="collapse" data-target="#publicacao" aria-expanded="false" aria-controls="collapseExample"><br>
									<div class="collapse" id="publicacao">
									<div class="card card-body">
										<form action="" method="POST">
											<div class="form-group">
											    <label class="form-control-label" for="nome">Nome do Vídeo</label>
												<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required="">
											</div>
											<div class="form-group">
											    <label for="desc">Descrição</label>
											    <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Faça uma breve descrição do vídeo" required=""></textarea>
											</div>
											<div class="form-group">
											    <label for="link">Link</label>
											    <a href="ajuda.php"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
											    <textarea class="form-control" name="link" id="link" rows="3" required=""></textarea>
											</div>
											<br><input class="form-control" type="submit" name="publicar" value="Publicar"><br>
										</form>
									</div>
									<?php
										if (isset($_POST['publicar'])) 
										{
											$nome=$_POST['nome'];
											$desc=$_POST['desc'];
											$link=$_POST['link'];
											if(!empty($nome)&&!empty($desc)&&!empty($link))
											{
												$sqlsel='SELECT * FROM video WHERE url="'.$link.'" AND id_usuario='.$con['id_usuario'].';';
												$resul=mysqli_query($conexao,$sqlsel);
												if (mysqli_num_rows($resul))
												{
													echo ('<script>window.alert("Link de vídeo já enviado!");</script>');
												}
												else
												{
													$sqlin='INSERT INTO video (titulo_video,descricao_video,url,id_usuario,data_video,tipo) values ("'.$nome.'","'.$desc.'","'.$link.'",'.$con['id_usuario'].',NOW(),"C");';
													if(mysqli_query($conexao,$sqlin)){
														echo ('<script>window.alert("Vídeo enviado com sucesso!");</script>');
														header('location:clube_investidor.php'); 

													}
												}
												
											}
											else
											{
												echo ('<script>window.alert(Todos os campos devem ser preenchidos!");</script>');
											}
										}
									?>
									</div>
										<?php
											$sqlsel='SELECT * FROM video WHERE id_usuario='.$con['id_usuario'].' AND tipo="C";';
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
								<!-- MENU - FOTOS -->
								<section id="5">
									<input class="form-control azul" type="submit" value="Compartilhar Foto" data-toggle="collapse" data-target="#foto" aria-expanded="false" aria-controls="collapseExample"><br>
									<div class="collapse" id="foto">
										<div class="card card-body">
											<div class="form-group">
												<form action="" method="POST" enctype="multipart/form-data">
												    <label for="lgd">Legenda</label>
												    <textarea class="form-control" id="lgd" name="lgd" rows="3"></textarea>
												    <br>
												    <label for="foto_pli"> Anexar foto <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span></label>
	                            					<input type="file" name="foto_pli" id="foto_pli">
											</div>
											<br><input class="form-control" type="submit" name="publicar" value="Publicar"><br>
											</form>
										</div>
									</div>
									<?php
										$sqlsel_cl='SELECT * FROM clube WHERE id_usuario='.$con['id_usuario'].';';
								        $resul_cl=mysqli_query($conexao,$sqlsel_cl);
								        $con2_cl=mysqli_fetch_array($resul_cl);
								        $sqlsel_foto='SELECT * FROM foto WHERE id_clube='.$con2_cl['id_clube'].';';
								        $resul_foto=mysqli_query($conexao,$sqlsel_foto);
								        if (mysqli_num_rows($resul_foto)) {
								        	while ($con2_foto=mysqli_fetch_array($resul_foto))
								        	{
									?>

									<?php
											}
									    }
									    else
											{
												echo
												('
													<h1 class="text-center"><img src="img/triste.png"></h1>
													<h3 class="text-center">Você ainda não possui nenhum vídeo</h3>
													<h5 class="text-center">Clique em compartilhar foto</h5>

												');
											}
									?>
								</section>
								<?php
									if (isset($_POST['publicar'])) 
									{
										$lgd=$_POST['lgd'];
										if($_FILES['foto_pli']['error']==4 || empty($lgd))
				                        {
				                        	echo('<script>alert("Preencha todos os campos!");</script>');
				                           
				                        }
				                        else
				                        {
				                        	$sqlsel_cl='SELECT * FROM clube WHERE id_usuario='.$con['id_usuario'].';';
								        	$resul_cl=mysqli_query($conexao,$sqlsel_cl);
								        	$con2_cl=mysqli_fetch_array($resul_cl);
				                            $extensao=strtolower(substr($_FILES['foto_pli']['name'], -4));
				                            $novo_nome=md5(time().$con['id_usuario']).$extensao;
				                            $diretorio="uploads/";
				                            move_uploaded_file($_FILES['foto_pli']['tmp_name'], $diretorio.$novo_nome);
				                            $sqlin='INSERT INTO foto (data_foto,legenda_foto,foto,id_clube) values (NOW(),"'.$lgd.'","'.$novo_nome.'",'.$con2_cl['id_clube'].');';
				                            if(mysqli_query($conexao,$sqlin))
				                            {
				                            	echo('<script>alert("Foto publicada!");window.location="clube_investidor.php";</script>');
				                            }
				                        }
									}

								?>
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
		<script type="text/javascript">
			$(".arq2").hover(function() {
			  $(this).children("p").show();
			}, function() {
			  $(this).children("p").hide();
			});
		</script>
    </body>
</html>
