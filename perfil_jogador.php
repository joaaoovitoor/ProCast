<?php
	include('verificar_logado.php');
    if($con['categoria_usuario']==2)
    {
    	header('location:perfil_investidor.php');
    }
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
	    <script src="js/jquery.js"></script>
	    <script src="js/pesq_cidade.js"></script>
		<?php
			include('link_head.html');
		?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
	<?php
        include('menu2.php');
    ?>
	<div class="banner-perfil perfil">
		<div class="container-fluid">
			<div class="row">
				<!-- CARD COM INFORMAÇÕES - GRANDE -->
				<div class="col-md-offset-0 col-md-5 hidden-sm hidden-xs">
			        <div class="cartao-grande spc-cartao">
			        	<div class="col-md-offset-4 col-md-4">
			        		<?php
			        			$cam='uploads/'.$con['foto_perfil'];
			        			echo('<label for="anexo" class="arq2"><img src="'.$cam.'" class="img-circle img-responsive perfil_img"><p class="text-center">Clique para escolher uma nova foto</p></label>');
			        		?>
			        	</div>
						<div class="text-center col-xs-12">
			        		<form action="#" method="POST" enctype="multipart/form-data">
			        			<input type="file" name="anexo" id="anexo">
			        			<button type="submit" class="btn btn_foto" data-toggle="tooltip" data-placement="right" title="Clique no cículo acima e selecione a foto que deseja. Após isso, clique neste botão!">Confirmar envio de foto</button>
	                        </form>
			        	</div>
			        	<?php
			        		if (isset($_FILES['anexo']))
	                        {
	                        	$extensao=strtolower(substr($_FILES['anexo']['name'], -4));
	                            $novo_nome=md5(time().$con['id_usuario']).$extensao;
	                            $diretorio="uploads/";
	                        	if(move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome))
	                        	{
	                        		$sqlup='update usuario set foto_perfil="'.$novo_nome.'" where id_usuario='.$con['id_usuario'].';';
		                            mysqli_query($conexao,$sqlup);
		                            echo('<script>window.location="verificar_perfil.php";</script>');
	                        	}
	                        	else
	                        	{
	                        		echo('<script>swal("Primeiro escolha uma nova foto", "Para escolher uma foto nova clique sobre a antiga", "error");</script>');
	                        	}
	                            
	                        }
			        	?>
			            <div class="row">
			                <div class="col-md-1"></div>
			                <div class="col-md-10">
			                    <div class="informacoes">
			                        <p>Nick</p><p><?php echo $con['nick'];?></p>
			                        <a href="mudarnick.php?idnick=<?php echo($con['id_nick'].'&nick='.$con['nick']) ?>"><p><button type="submit" class="btn btn_foto" data-toggle="tooltip" data-placement="right" title="Ao mudar de Nick dentro do jogo, clique aqui para atualiza-lo!">Atualizar Nick</button></p></a>
			                        <?php if($con['status_pagamento']=="F"){ ?>
			                        <a href="boleto/boleto.php" target="_blank"><p><button type="submit" class="btn btn_foto" data-toggle="tooltip" data-placement="right" title="Você ainda não pagou seu boleto! Clique aqui para gera-lo! Se você já o pagou, aguarde 4 dias úteis!">Gerar boleto!</button></p></a>
			                        <?php } ?>
			                    </div>
			                </div>
			            </div>
			            <div class="clube-cartao">
			                <div class="row">
			                    
			                    	<?php 
			                    		if(!empty($con['clube']))
			                    		{
			                    			$sqlup='SELECT * FROM clube WHERE id_clube='.$con['clube'].';';
			                    			$resul=mysqli_query($conexao,$sqlup);
			                    			$cl=mysqli_fetch_array($resul);
			                    			echo
			                    			('
			                    				<div class="col-sm-6">
				                    				<span class="coach-name"><p>Clube</p></span>
				                        			<span class="coach-job"><p>'.$cl['nome_clube'].'</p></span>
			                        			</div>
							                    <div class="col-sm-6">
							                        <img src="uploads/'.$cl['logo_clube'].'" width="100">
							                    </div>
			                    			');
			                    		}
			                    		else
			                    		{
			                    			echo
			                    			('
			                    				<div class="col-sm-12">
				                    				<span class="coach-name"><p>Você ainda não está em um clube</p></span>
				                        			<span class="coach-job"><p>Fique atento na aba de convites</p></span>
			                        			</div>
			                    			');
			                    		}
			                    	?>
			                        
			                    
			                </div>
			            </div>
			            <div class="descricao">
		                    <p><strong>Sobre mim:</strong></p>
		                    <?php
		                    if($con['descricao']==NULL){
								echo '<p data-toggle="modal" class="cp" data-target="#desc">Crie uma descrição <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></p>';
							}else{
		                    	echo ('<p>'.$con['descricao'].'</p>');
							}
		                    ?>
		                     
							<div class="modal fade" id="desc" tabindex="-1" role="dialog" aria-labelledby="descLabel">
								<div class="modal-dialog" role="document">
								    <div class="modal-content">
								      	<div class="modal-header">
								        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        	<h4 class="modal-title" id="descLabel">Sobre você</h4>
								      	</div>
									    <div class="modal-body">
									    	<form action="#" method="POST">
									      		<textarea name="descricao" rows="5" class="form-control" placeholder="Digite aqui algo sobre você"></textarea>
									    </div>
									    <div class="modal-footer">
									        	<button type="submit" class="btn btn-block azul">Salvar Mudanças</button>
									        </form>
									    </div>
								    </div>
								</div>
							</div>	
							<?php 
								if (isset($_POST['descricao'])) {
									if(!empty($_POST['descricao']))
									{
										$sqlup='update usuario set descricao="'.$_POST['descricao'].'" where id_usuario='.$con['id_usuario'].';';
										mysqli_query($conexao,$sqlup);
	                           			echo('<script>window.location="verificar_perfil.php";</script>');
									}
									else
									{
										echo('<script>swal("Digite algo na descrição", "", "error");</script>');

									}
								}
							?>
		                    <p><strong>Função Primária:</strong>
		                    <?php 
								$sqlsel='SELECT * FROM funcao WHERE id_funcao='.$con['funcao_1'].';';
								$resul=mysqli_query($conexao,$sqlsel);
								$con2=mysqli_fetch_array($resul);
								echo($con2['nome_funcao']);
							?>
		                    </p>
		                    <p><strong>Função Secundária:</strong>
		                    <?php 
								$sqlsel='SELECT * FROM funcao WHERE id_funcao='.$con['funcao_2'].';';
								$resul=mysqli_query($conexao,$sqlsel);
								$con2=mysqli_fetch_array($resul);
								echo($con2['nome_funcao']);
							?>
		                    </p>
		                   <?php 
								include('teste_url.php');
							?>
			            </div>
			        </div>
				</div>
				<!-- CARD COM INFORMAÇÕES - PEQUENO -->
				<div class="hidden-md hidden-lg">
					<div class="cartao">
					 	<?php
		        			$cam='uploads/'.$con['foto_perfil'];
		        			echo('<label for="anexo" class="arq2"><img src="'.$cam.'" class="img-circle img-responsive perfil_img"><p class="text-center">Clique para escolher uma nova foto</p></label>');
			        	?>
			        	<form action="#" method="POST" enctype="multipart/form-data">
		        			<input type="file" name="anexo" id="anexo">
		        			<button type="submit" class="btn btn_foto" data-toggle="tooltip" data-placement="right" title="Clique no cículo acima e selecione a foto que deseja. Após isso, clique neste botão!">Confirmar envio de foto</button>
                        </form>
                        <?php
			        		if (isset($_FILES['anexo']))
	                        {
	                        	$extensao=strtolower(substr($_FILES['anexo']['name'], -4));
	                            $novo_nome=md5(time().$con['id_usuario']).$extensao;
	                            $diretorio="uploads/";
	                        	if(move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome))
	                        	{
	                        		$sqlup='update usuario set foto_perfil="'.$novo_nome.'" where id_usuario='.$con['id_usuario'].';';
		                            mysqli_query($conexao,$sqlup);
		                            echo('<script>window.location="verificar_perfil.php";</script>');
	                        	}
	                        	else
	                        	{
	                        		echo('<script>swal("Primeiro escolha uma nova foto", "Para escolher uma foto nova clique sobre a antiga", "error");</script>');
	                        	}
	                            
	                        }
			        	?>
                        <p>Nick: <?php echo $con['nick'];?> </p>
                        <a href="mudarnick.php?idnick=<?php echo($con['id_nick'].'&nick='.$con['nick']) ?>"><p><button type="submit" class="btn btn_foto" data-toggle="tooltip" data-placement="right" title="Ao mudar de Nick dentro do jogo, clique aqui para atualiza-lo!">Atualizar Nick</button></p></a>
                        <p>Clube: 
	                    	<?php 
	                    		if(!empty($con['clube']))
	                    		{
	                    			$sqlup='SELECT * FROM clube WHERE id_clube='.$con['clube'].';';
	                    			$resul=mysqli_query($conexao,$sqlup);
	                    			$cl=mysqli_fetch_array($resul);
	                    			echo
	                    			(
	                    				$cl['nome_clube']
	                    			);
	                    		}
	                    		else
	                    		{
	                    			echo
	                    			('
	                    				<div class="col-sm-12">
		                    				<span class="coach-name"><p>Você não criou seu clube</p></span>
	                        			</div>
	                    			');
	                    		}
	                    	?>
                    	</p>
		                <p><strong>Sobre mim:</strong>
		                <?php
		                    if($con['descricao']==NULL){
								echo 'Crie uma descrição<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>';
							}else{
		                    	echo $con['descricao'];
							}
	                    ?>
		                </p>
	                    <p>Função Primária: 
	                    <?php 
							$sqlsel='SELECT * FROM funcao WHERE id_funcao='.$con['funcao_1'].';';
							$resul=mysqli_query($conexao,$sqlsel);
							$con2=mysqli_fetch_array($resul);
							echo($con2['nome_funcao']);
						?>
	                    </p>
	                    <p>Função Secundária: 
	                    <?php 
							$sqlsel='SELECT * FROM funcao WHERE id_funcao='.$con['funcao_2'].';';
							$resul=mysqli_query($conexao,$sqlsel);
							$con2=mysqli_fetch_array($resul);
							echo($con2['nome_funcao']);
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
						<li><a href="#2"><span>Convites</span></a></li>
						<li><a href="#3"><span>Agenda</span></a></li>
						<li><a href="#4"><span>Vídeos</span></a></li>
						<li><a href="#5"><span>Mensagens</span></a></li>
						<li><a href="#6"><span>Dados</span></a></li>
					</ul>
				</nav>
				<div class="content-wrap">
				<!--MENU - CLUBE-->
				<section id="1">
		            <?php
						if(empty($con['clube']))
						{
							echo 
							('
								<h1 class="text-center"><img src="img/triste.png"></h1>
								<h3 class="text-center">Você ainda não está em nenhum clube</h3>
								<h5 class="text-center">Fique atento aos convites na aba ao lado</h5>
							');
						}
						else
						{
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
						                        <img class="media-object img-circle profile-img" src="uploads/'.$ctrl['foto_perfil'].'">
						                        <a class="btn btn-default " href="escrever_mensagem.php?rm='.$ctrl['id_usuario'].'"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</a>
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
				<!--MENU - CONVITES-->
				<section id="2">
					<div class="container-fluid">
						<div class="cartao-equipe">
			                <div class="media">
			                    	<?php
										$sqlsel='SELECT * FROM convite WHERE (id_jogador='.$con['id_usuario'].') AND (status="F");';
										$resul=mysqli_query($conexao,$sqlsel);
										if (mysqli_num_rows($resul)) {
											while ($con_co=mysqli_fetch_array($resul))
											{
												$sqlsel='SELECT * FROM clube WHERE id_clube='.$con_co['id_clube'].';';
												$resul=mysqli_query($conexao,$sqlsel);
												$con_cl=mysqli_fetch_array($resul);	
												$sqlsel='SELECT * FROM usuario WHERE id_usuario='.$con_co['id_investidor'].';';
												$resul=mysqli_query($conexao,$sqlsel);
												$con_inv=mysqli_fetch_array($resul);
												$sqlsel='SELECT * FROM estado WHERE id='.$con_inv['estado'].';';
												$resul=mysqli_query($conexao,$sqlsel);
												$con_es=mysqli_fetch_array($resul);	
												$sqlsel='SELECT * FROM cidade WHERE id='.$con_inv['cidade'].';';
												$resul=mysqli_query($conexao,$sqlsel);
												$con_cd=mysqli_fetch_array($resul);	
												echo
												('
													<div class="media-left">
														<img class="media-object img-circle profile-img" src="img/fotinha.png">
								                        <a href="perfil_jogador.php?ac='.$con_co['id_convite'].'" class="btn btn-default "><i class="fa fa-check" aria-hidden="true"></i> Aceitar</a>
							                    	</div>
								                    	<div class="media-body">
								                        <h3 class="media-heading">Clube '.$con_cl['nome_clube'].'</h3>
								                        <h5>Investidor '.$con_inv['nome'].' '.$con_inv['sobrenome'].'</h5>
								                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> '.$con_cd['nome'].' - '.$con_es['nome'].'</p>
								                        <p>'.$con_cl['descricao_clube'].'</p>
								                    </div>
														
												');	
											}
										}
										else
										{
											echo
											('
												<h1 class="text-center"><img src="img/triste.png"></h1>
												<h3 class="text-center">Você ainda não possui nenhum convite</h3>
												<h5 class="text-center"><a href="home.php">Contrate um plano para se divulgar! Aumente suas chances de ser convidado</a></h5>
	
											');
										}
										if (isset($_GET['ac'])) {
											$id_ac=$_GET['ac'];
											$sqlsel='SELECT * FROM convite WHERE id_convite='.$id_ac.';';
											$resul=mysqli_query($conexao,$sqlsel);
											$con_co=mysqli_fetch_array($resul);	
											$sqlsel='SELECT * FROM clube WHERE id_clube='.$con_co['id_clube'].';';
											$resul=mysqli_query($conexao,$sqlsel);
											$con_cl=mysqli_fetch_array($resul);	
											$sqlup='UPDATE convite set status="V" WHERE id_convite='.$id_ac.';';
											mysqli_query($conexao,$sqlup);
											$sqlup='UPDATE usuario set clube='.$con_cl['id_clube'].' WHERE id_usuario='.$con_co['id_jogador'].';';
											mysqli_query($conexao,$sqlup);
											if(mysqli_query($conexao,$sqlup))
											{
												echo('<script>alert("Parabéns! Agora você faz parte do clube '.$con_cl['nome_clube'].'");</script>');
												echo('<script>window.location="verificar_perfil.php";</script>');
											}
										}
										
									?>
			                </div>
		            	</div>
						<br>
					</div>
				</section>
				<!--MENU - AGENDA-->
				<section id="3">
					<div class="cartao-equipe">
						<input class="form-control azul" type="submit" value="Novo Evento" data-toggle="collapse" data-target="#evento" aria-expanded="false" aria-controls="collapseExample"><br>
						<div class="collapse" id="evento">
							<div class="card card-body">
								<form action="#" method="POST">
									<div class="form-group col-md-12">
									    <label for="titulo_evento">Título do Evento</label>
									    <input type="text" name="titulo_evento" class="form-control" id="titulo_evento"  required="" placeholder="Título do evento">
									</div>
									<div class="form-group col-md-6">
									    <label class="form-control-label" for="data">Data do Evento</label>
										<input type="text" name="data" class="form-control" id="data"  required="" placeholder="dd/mm/aaaa">
									</div>
									<div class="form-group col-md-6">
									    <label class="form-control-label" for="horario">Horário do Evento</label>
										<input type="text" name="horario" class="form-control" id="horario"  required="" placeholder="hh:mm">
									</div>
									<div class="form-group col-md-12">
									    <label for="desc">Descrição</label>
									    <textarea class="form-control" id="descricao_evento" name="descricao_evento" rows="3" placeholder="Faça uma breve descrição do evento" required=""></textarea>
									</div>
									<div class="col-md-12">
										<input class="form-control" type="submit" name="agendar" value="Agendar"><br>
									</div>
								</form>
							</div>
						</div>
						<?php
							if (isset($_POST['agendar'])) {
								$titulo=$_POST['titulo_evento'];
								$data=$_POST['data'];
								$horario=$_POST['horario'];
								$descricao_agd=$_POST['descricao_evento'];
								if(!empty($titulo)&&!empty($data)&&!empty($horario)&&!empty($descricao_agd))
								{
									$data=explode('/', $data);
									if($data[0]>31 || $data[0]<1 || $data[1]>12 || $data[1]<1)
									{
										echo ('<script>window.alert("Data Inválida");</script>');
											header('location:perfil_jogador.php');
									}
									else
									{
										$data2=$data[2].$data[1].$data[0];
										$sqlin='INSERT INTO agenda (hora,data,evento,descricao_evento,id_usuario) VALUES ("'.$horario.'","'.$data2.'","'.$titulo.'","'.$descricao_agd.'",'.$con['id_usuario'].');';
										if(mysqli_query($conexao,$sqlin))
										{
											echo ('<script>window.alert("Evento agendado com sucesso!");</script>');
											header('location:perfil_jogador.php');
										}
									}
								}
								else
								{
									echo ('<script>window.alert("Preencha todos os campos!");</script>');
								}
							}
							$sqlsel='SELECT * FROM agenda WHERE id_usuario='.$con['id_usuario'].' ORDER BY data DESC;';
							$resul=mysqli_query($conexao,$sqlsel);
							if (mysqli_num_rows($resul))
							{
								while ($ag=mysqli_fetch_array($resul))
								{
									$data=explode('-', $ag['data']);
									echo 
									('
										<div class="media">
						                    <div class="media-left">
						                        <blockquote>
													<h5>Autor: <a href="ver_jogador.php?pesq='.$con['nick'].'" target="blank">'.$con['nome'].'</a></h5>
													<p>Dia: <br>'.$data[2].'-'.$data[1].'-'.$data[0].'</p>
													<p>Horário: '.$ag['hora'].'</p>
												</blockquote>
						                    </div>
						                    <div class="media-body">
						                    	<div class="col-md-10">
													<h3>'.$ag['evento'].'</h3>
							                        <h4>Descrição: </h4>
							                        <p>'.$ag['descricao_evento'].'</p>
						                    	</div>
						                    	<div class="col-md-1 text-right">
						                    		<a href="perfil_jogador.php?excvt='.$ag['id_agenda'].'" class="btn-lg btn-default text-center"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						                    	</div>
						                    	<div class="col-md-1">
						                    		<a data-toggle="modal" class="btn-lg btn-default text-center" data-target="#alterar_evt"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						                    	</div>						                        
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
									<h3 class="text-center">Você ainda não possui nenhum evento agendado</h3>
									<h5 class="text-center">Clique em Novo evento</h5>

								');
							}	
							if (isset($_GET['excvt'])) {
								$id_ex=$_GET['excvt'];
								$sqlex='DELETE FROM agenda WHERE id_agenda='.$id_ex.';';
								if(mysqli_query($conexao,$sqlex))
								{
									echo ('<script>window.alert("Evento excluído com sucesso!");</script>');
									header('location:perfil_jogador.php');
								}
							}
							echo ('
							<div class="modal fade" id="alterar_evt" tabindex="-1" role="dialog" aria-labelledby="descLabel">
								<div class="modal-dialog" role="document">
								    <div class="modal-content">
								      	<div class="modal-header">
								        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        	<h4 class="modal-title" id="descLabel">Sobre você</h4>
								      	</div>
									    <div class="modal-body">
									    	<form action="#" method="POST">
									      		<textarea name="descricao" rows="5" class="form-control" placeholder="Digite aqui algo sobre você"></textarea>
									    </div>
									    <div class="modal-footer">
									        	<button type="submit" class="btn btn-block azul">Salvar Mudanças</button>
									        </form>
									    </div>
								    </div>
								</div>
							</div>');
						?>
		                
		            </div>   
				</section>
				<!--MENU - VÍDEO-->
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
									$sqlin='INSERT INTO video (titulo_video,descricao_video,url,id_usuario,data_video) values ("'.$nome.'","'.$desc.'","'.$link.'",'.$con['id_usuario'].',NOW());';
									if(mysqli_query($conexao,$sqlin)){
										echo ('<script>window.alert("Vídeo enviado com sucesso!");</script>');
										header('location:perfil_jogador.php'); 

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
							$sqlsel='SELECT * FROM video WHERE id_usuario='.$con['id_usuario'].';';
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
				<!--MENU - MENSAGEM-->
				<section id="5">
					<?php 
						$sqlsel='SELECT * FROM mensagem WHERE id_receber='.$con['id_usuario'].' AND view="F";';
						$resul=mysqli_query($conexao,$sqlsel);
						if(mysqli_num_rows($resul))
						{
							while($con_msg=mysqli_fetch_array($resul))
							{
								$sqlsel='select * from usuario where id_usuario="'.$con_msg['id_enviar'].'";';
                                $resul2=mysqli_query($conexao,$sqlsel);
                                $con_nick=mysqli_fetch_array($resul2);
					?>
							<a href=<?php echo('"conteudo_msg.php?msg='.$con_msg['id_mensagem'].'"'); ?>>
								<div class="message-item" id="m16">
									<div class="message-inner">
										<div class="message-head clearfix">
											<div class="avatar pull-left"><img src=<?php echo('"uploads/'.$con_nick['foto_perfil'].'"'); ?> class="img-circle" width="40px"></div>
											<div class="user-detail">
												<h5 class="handle"><?php echo($con_nick['nick']); ?></h5>
												<div class="post-meta">
													<div class="asker-meta">
														<span class="qa-message-what"></span>
														<span class="qa-message-when">
															<span class="qa-message-when-data"><?php echo($con_msg['data']); ?></span>
														</span>
													</div>
												</div>
												<p>
													<div class="qa-message-content">
														<?php
															echo($con_msg['mensagem']);
														?>
													</div>
												</p>
											</div>
										</div>
										
									</div>
								</div>
							</a>
					<?php
							}
						}
						else
						{
							echo
							('
								<h1 class="text-center"><img src="img/triste.png"></h1>
								<h3 class="text-center">Você não possui nenhuma mensagem não lida</h3>

							');
						}
						
					?>
				</section>
					
					<!--Fim da mensagem-->
				<!--MENU - ALTERAR-->
				<section id="6">
				    <!--Formulário para alterar-->
					<form action="#" method="post">
						<div class="col-md-6">
							<div class="form-group">
								Nome <input type="text" class="form-control" name="nome_edt" value="<?php echo $con['nome'];?>" maxlength="15">
							</div>
							<div class="form-group">
								Sobrenome <input type="text" class="form-control" name="sobrenome_edt"  maxlength="15" value="<?php echo $con['sobrenome'];?>">
							</div>
							<div class="form-group">
								Nick <input type="text" class="form-control" value="<?php echo $con['nick'];?>" readonly>
							</div>
							<div class="form-group">
								Função primária
								<select name="funcao1_edt" class="form-control">
								<?php
									//função do cara
									$sqlsel='SELECT * FROM funcao WHERE id_funcao='.$con['funcao_1'].';';
									$resul=mysqli_query($conexao,$sqlsel);
									$con2=mysqli_fetch_array($resul);
									echo ('<option value="'.$con['funcao_1'].'" selected>'.$con2['nome_funcao'].'</option>');
									//outras funções
									$sql_funcao='SELECT * FROM funcao WHERE NOT id_funcao='.$con['funcao_1'].';';
									$resul_funcao=mysqli_query($conexao,$sql_funcao);
									while ($con_funcao=mysqli_fetch_array($resul_funcao))
									{
										echo
										('
											<option value="'.$con_funcao['id_funcao'].'">'.$con_funcao['nome_funcao'].'</option>
										');
									}
								?>
								</select>
							</div>
							<div class="form-group">
								Função secundária
								<select name="funcao2_edt" class="form-control">
								<?php
									//função do cara
									$sqlsel='SELECT * FROM funcao WHERE id_funcao='.$con['funcao_2'].';';
									$resul=mysqli_query($conexao,$sqlsel);
									$con2=mysqli_fetch_array($resul);
									echo ('<option value="'.$con['funcao_2'].'" selected>'.$con2['nome_funcao'].'</option>');
									//outras funções
									$sql_funcao='SELECT * FROM funcao WHERE NOT id_funcao='.$con['funcao_2'].';';
									$resul_funcao=mysqli_query($conexao,$sql_funcao);
									while ($con_funcao=mysqli_fetch_array($resul_funcao))
									{
										echo
										('
											<option value="'.$con_funcao['id_funcao'].'">'.$con_funcao['nome_funcao'].'</option>
										');
									}
								?>
								</select>
							</div>
							<div class="form-group">
								Senha <input type="password" name="senha_edt" value="<?php echo base64_decode($con['senha']); ?>"maxlength="25" class="form-control">
							</div>
							<div class="form-group">
								Telefone <input type="text" class="form-control" name="telefone_edt" value="<?php echo $con['telefone'];?>" id="telefone">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								Sexo <input type="text" class="form-control" value=
								"<?php 
									if ($con['sexo']=='f'){
										echo 'Feminino';
									}else{
										echo 'Masculino';
									}
								?>"
								readonly>
							</div>
							<div class="form-group">
								E-mail<input type="email" name="email_edt" value="<?php echo $con['email'];?>" class="form-control" readonly>
							</div>
							
							<div class="form-group">
								CPF <input type="text" class="form-control" value="<?php echo $con['cpf'];?>" readonly>
							</div>
							<div class="form-group">
								Data de nascimento<input type="text" class="form-control" value="<?php echo $con['dta_nascimento'];?>" readonly>
							</div>
							<div class="form-group">
								Estado
								<select name="estado_edt" id="estado" class="form-control">
									<?php
										//estado do cara
										$sql_estado='SELECT nome FROM estado WHERE id='.$con['estado'].';';
										$resul_estado=mysqli_query($conexao,$sql_estado);
										$con_estado=mysqli_fetch_array($resul_estado);
										echo ('<option value="'.$con['estado'].'" selected>'.$con_estado['nome'].'</option>');
										//outros estados
										$sqlsel='SELECT * FROM estado WHERE NOT id='.$con['estado'].';';
										$resul=mysqli_query($conexao,$sqlsel);
										while ($con2=mysqli_fetch_array($resul))
										{
											echo
											('
												<option value="'.$con2['id'].'">'.$con2['nome'].'</option>
											');
										}
									?>
								</select>
							</div>
							<div class="form-group">
								Cidade
								<select name="cidade_edt" id="cidade" class="form-control">
								  <?php
										//cidade do cara
										$sql_cidade='SELECT nome FROM cidade WHERE id='.$con['cidade'].';';
										$resul_cidade=mysqli_query($conexao,$sql_cidade);
										$con_cidade=mysqli_fetch_array($resul_cidade);
										echo ('<option value="'.$con['cidade'].'" selected>'.$con_cidade['nome'].'</option>');
									?>
								</select>
							</div>
							<div class="form-group">
								Status da conta: <input type="text" class="form-control" name="status" value="<?php if($con['status_pagamento']=="F"){ echo "Pagamento pendente!";}else{echo 'Pagamento realizado!';} ?>" readonly>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
				                Sobre mim
				                <textarea class="form-control" rows="3" placeholder="Descreva sobre você" name="descricao_edt" maxlength="200"><?php echo $con['descricao'];?></textarea>
				            </div>
							<p><input class="form-control azul" type="submit" name="editar" value="Editar"></p>
							<input class="form-control azul" type="submit" name="excluir" value="Excluir" data-toggle="modal" data-target="#confirmar" >
						</div>
					</form>
						
						<!--Confirmar excluir-->
						<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Confirmar exclusão</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <form action="#" method="post">
							    <div class="modal-body">
							    	E-mail <input type="text" class="form-control" name="email_verificacao" value="<?php echo $con['email'];?>" id="telefone">
									Senha <input type="password" name="senha_verificacao" placeholder="Senha" maxlength="25" class="form-control">
							    </div>
						    	<div class="modal-footer">
                                    <input class="form-control" type="submit" name="confirmar" value="Confirmar">
						      	</div>
						      </form>
						      <!--Excluir-->
								<?php
									if(isset($_POST['confirmar']))
									{
								    	$sqlsel=('SELECT email,senha FROM usuario WHERE email="'.$email_usuario.'" ;');
										$email_verificacao=$_POST['email_verificacao'];
										$senha_verificacao=base64_decode($_POST['senha_verificacao']);
										if($email_verificacao==$con['email'] && $senha_verificacao==$con['senha']){
											header ('excluir.php');
										}else{
										}
										$resul=mysqli_query($conexao,$sqlsel);
										$con=mysqli_fetch_array($resul);
									}
							    ?>
						    </div>
						  </div>
						</div>
					<!--Excluir conta-->
					<!--Editar informações-->
					<?php
						if(isset($_POST['editar']))
						{
							//resgata
							$nome=$_POST['nome_edt'];
							$sobrenome=$_POST['sobrenome_edt'];
							$funcao_1=$_POST['funcao1_edt'];
							$funcao_2=$_POST['funcao2_edt'];
							$senha=base64_encode($_POST['senha_edt']);
							$estado=$_POST['estado_edt'];
							$cidade=$_POST['cidade_edt'];
							$telefone=$_POST['telefone_edt'];
							$descricao=$_POST['descricao_edt'];
							//confere funções iguais
							if ($funcao_1==$funcao_2) {
								echo('<script>alert("As funções devem ser diferentes");</script>');
								echo('<script>window.location="cadastro.php";</script>');
								exit();
							}else{
								//edita
								$sqledt=('UPDATE usuario set nome="'.$nome.'", sobrenome="'.$sobrenome.'", funcao_1="'.$funcao_1.'", funcao_2="'.$funcao_2.'", senha="'.$senha.'",  estado="'.$estado.'", cidade="'.$cidade.'", telefone="'.$telefone.'", descricao="'.$descricao.'" WHERE id_usuario='.$con['id_usuario'].' ;');
								$editado=mysqli_query($conexao,$sqledt);
								if($editado)
								{
									echo ('<script>window.alert("Dados alterados com sucesso!");window.location.href="perfil_jogador.php";</script>');
								}
								else
								{	
									echo ('<script>window.alert("Erro ao Editar Dados!");window.location.href="perfil_jogador.php";</script>');
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
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
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
		<script>
			  $('[data-toggle="tooltip"]').tooltip();
		</script>
    </body>
</html>