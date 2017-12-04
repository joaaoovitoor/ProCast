<?php
	include('verificar_logado.php');
    if($con['categoria_usuario']==1)
    {
    	header('location:perfil_jogador.php');
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
	<div class="banner-perfil banner">
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
			                    <div class="informacoes"><p>
			                        Nome <br><?php echo $con['nome'];?></p>
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
				                        			<a href="pesquisa.php"><p><button type="submit" class="btn btn_foto btn_saircb" data-toggle="tooltip" data-placement="right" title="Clique aqui para buscar jogadores para o seu clube!" name="sair_clube">Buscar jogadores</button></p></a>
			                        			</div>
							                    <div class="col-sm-6">
							                        <img src="uploads/'.$cl['logo_clube'].'" width="200">
							                    </div>
			                    			');
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
			                        
			                    
			                </div>
			            </div>
			            <div class="descricao">
		                    <p><strong>Sobre mim:</strong>
		                    <?php
		                    if($con['descricao']==NULL){
								echo 'Crie uma descrição<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>';
							}else{
		                    	echo $con['descricao'];
							}
		                    ?>
		                    </p> 
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
                        <p>Nome: <?php echo $con['nome'];?> </p>
                        <p>Clube: 
	                    	<?php 
	                    		if(!empty($con['clube']))
	                    		{
	                    			$sqlup='SELECT * FROM clube WHERE id_clube='.$con['clube'].';';
	                    			$resul=mysqli_query($conexao,$sqlup);
	                    			$cl=mysqli_fetch_array($resul);
	                    			echo
	                    			(
	                    				$cl['nome_clube'].'
	                    				<a href="pesquisa.php"><p><button type="submit" class="btn btn_foto btn_saircb" data-toggle="tooltip" data-placement="right" title="Clique aqui para buscar jogadores para o seu clube!" name="sair_clube">Buscar jogadores</button></p></a>'
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
		                <p>SOBRE MIM:
		                <?php
		                    if($con['descricao']==NULL){
								echo 'Crie uma descrição<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>';
							}else{
		                    	echo $con['descricao'];
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
						<li><a href="#1"><span>Jogadores</span></a></li>
						<li><a href="#2"><span>Clube</span></a></li>
						<li><a href="#3"><span>Agenda</span></a></li>
						<li><a href="#4"><span>Mensagens</span></a></li>
						<li><a href="#5"><span>Dados</span></a></li>
					</ul>
				</nav>
				<div class="content-wrap">
				<!--MENU - JOGADORES-->
				<section id="1">
					<?php 
					//dados do clube
					$sqlclube='SELECT * FROM clube WHERE id_usuario='.$con['id_usuario'].';';
					$resulclube = mysqli_query($conexao,$sqlclube);
					$dados=mysqli_fetch_array($resulclube);

					//dados dos membros do clube
					$sqlusercb='SELECT * FROM usuario WHERE clube='.$dados['id_clube'].' AND categoria_usuario=1;';
					$resulusercb=mysqli_query($conexao,$sqlusercb);

					if(mysqli_num_rows($resulclube)>0)
					{
						echo "Jogadores do seu clube:";
						if(mysqli_num_rows($resulusercb)>0)
						{
							while($membrosclube=mysqli_fetch_array($resulusercb))
							{
								$sqlf1='SELECT nome_funcao FROM funcao WHERE id_funcao='.$membrosclube['funcao_1'].';';
								$resulf1=mysqli_query($conexao,$sqlf1);
								$conf1=mysqli_fetch_array($resulf1);

								$sqlf2='SELECT nome_funcao FROM funcao WHERE id_funcao='.$membrosclube['funcao_2'].';';
								$resulf2=mysqli_query($conexao,$sqlf2);
								$conf2=mysqli_fetch_array($resulf2);
							?>
				            <div class="cartao-equipe">
				                <div class="media">
				                    <div class="media-left">
				                        <img class="media-object img-circle img-responsive perfil_img" src="uploads/<?php echo $membrosclube['foto_perfil']; ?>">
				                        <p><a class="btn btn-default " href="escrever_mensagem.php?rm=<?php echo $membrosclube['email']; ?>"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</a></p>
				                    </div>
				                    <div class="media-body">
				                        <a href="ver_jogador.php?pesq=<?php echo $membrosclube['nick']; ?>"><h3 class="media-heading"><?php echo $membrosclube['nick']; ?></h3></a>
				                        <h5><?php echo $membrosclube['nome']." ".$membrosclube['sobrenome']; ?></h5>
				                        <p>Email: <?php echo $membrosclube['email']; ?></p>
				                        <p>Função primária: <?php echo $conf1['nome_funcao']; ?></p>
				                        <p>Função primária: <?php echo $conf2['nome_funcao']; ?></p> 
				                    </div>
				                </div>
				            </div>
				        <?php 
				        	}
			    		}
			    		else
			    		{
			    			echo '<h3 align="center"><img src="img/triste.png"><br>Seu clube ainda não tem jogadores! <a href="pesquisa.php">Encontre-os!</a></h3>';
			    		}
					}
					else
					{
						echo '<h3 align="center"><img src="img/triste.png"><br>Você ainda não criou seu clube! <a href="criar_clube.php">Crie seu clube!</a></h3>';
					}
					?>
				</section>
				<!--MENU - CLUBE-->
				<section id="2">
					<div class="cartao-equipe cinza">
					<?php 
					if(mysqli_num_rows($resulclube)>0)
					{
						$dataexplode = explode("-",$dados['dta_criacao']);
						$cont=2;
						for($i=0;$i<3;$i++)
						{
							$datainv[$i]=$dataexplode[$cont];
							$cont--;
						}
						$datacerto=implode("/", $datainv);
					?>
						<img src="uploads/<?php echo($dados['logo_clube']); ?>" width="75%">
						<h2><?php echo($dados['nome_clube']); ?></h2>
						<?php echo($dados['descricao_clube']); ?><br>
						<small class="text-muted">Data de criação: <?php echo($datacerto); ?></small>
				    <?php 
				 	}
				 	else
				 	{
				 		echo '<h3 align="center"><img src="img/triste.png"><br>Você não possui um clube ainda</h3>';
				 	}
				    ?>
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
													<h5>Autor: '.$con['nome'].'</h5>
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
						                    		<a data-toggle="collapse" data-target="#altevento'.$ag['id_agenda'].'" aria-expanded="false" aria-controls="collapseExample" class="btn-lg btn-default text-center"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						                    	</div>						                        
						                    </div>
						                </div>
									');	
									echo
									('
										<div class="collapse" id="altevento'.$ag['id_agenda'].'">
											<div class="card card-body">
												<form action="#" method="POST">
													<input type="hidden" name="id_evt" value="'.$ag['id_agenda'].'">
													<div class="form-group col-md-12">
													    <label for="alt_evento">Título do Evento</label>
													    <input value="'.$ag['evento'].'" type="text" name="alt_evento" class="form-control" id="alt_evento"  required="" placeholder="Título do evento">
													</div>
													<div class="form-group col-md-6">
													    <label class="form-control-label" for="alt_data">Data do Evento</label>
														<input value="'.$ag['data'].'" type="text" name="alt_data" class="form-control" id="alt_data" required="" placeholder="dd/mm/aaaa">
													</div>
													<div class="form-group col-md-6">
													    <label class="form-control-label" for="alt_horario">Horário do Evento</label>
														<input type="text" value="'.$ag['hora'].'" name="alt_horario" class="form-control" id="alt_horario"  required="" placeholder="hh:mm">
													</div>
													<div class="form-group col-md-12">
													    <label for="alt_descricao_evento">Descrição</label>
													    <textarea class="form-control" id="alt_descricao_evento" name="alt_descricao_evento" rows="3" placeholder="Faça uma breve descrição do evento" required="">'.$ag['descricao_evento'].'</textarea>
													</div>
													<div class="col-md-12">
														<input class="form-control" type="submit" name="alt_agendar" value="Alterar"><br>
													</div>
												</form>
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
							if(isset($_POST['alt_agendar']))
							{
								$id_evt=$_POST['id_evt'];
								$alt_titulo=$_POST['alt_evento'];
								$alt_data=$_POST['alt_data'];
								$alt_horario=$_POST['alt_horario'];
								$alt_descricao_agd=$_POST['alt_descricao_evento'];
								if(!empty($alt_titulo)&&!empty($alt_data)&&!empty($alt_horario)&&!empty($alt_descricao_agd))
								{
									$sqlup='UPDATE agenda SET hora="'.$alt_horario.'",data="'.$alt_data.'",evento="'.$alt_titulo.'",descricao_evento="'.$alt_descricao_agd.'" WHERE id_agenda='.$id_evt.';';
									if (mysqli_query($conexao,$sqlup)) {
										echo ('<script>window.alert("Alterado com sucesso!");</script>');
										header('location:perfil_jogador.php');
									}
								}
								else
								{
									echo ('<script>window.alert("Preencha todos os campos!");</script>');
								}

							}
						?>
		                
		            </div>   
				</section>
				<!--MENU - MENSAGEM-->
				<section id="4">
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
				<!--MENU - ALTERAR-->
				<section id="5">
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
								E-mail <input type="text" class="form-control" value="<?php echo $con['email'];?>" readonly=>
							</div>
							<div class="form-group">
								Senha <input type="password" name="senha_edt" maxlength="25" class="form-control" value="<?php echo base64_decode($con['senha']);?>">
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
								CPF <input type="text" class="form-control" value="<?php echo $con['cpf'];?>" readonly>
							</div>
							<div class="form-group">
								CNPJ <input type="text" class="form-control" value="<?php echo $con['cnpj'];?>" <?php if ($con['cnpj']=="nao_declarado"){}else echo " readonly"; ?>>
							</div>
							<div class="form-group">
								Data de nascimento<input type="text" class="form-control" value="<?php echo $con['dta_nascimento'];?>" readonly>
							</div>
							<div class="form-group">
								Telefone <input type="text" class="form-control" name="telefone_edt" value="<?php echo $con['telefone'];?>" id="telefone">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
				                Sobre mim
				                <textarea class="form-control" rows="3" placeholder="Descreva sobre você" name="descricao_edt" maxlength="200"><?php echo $con['descricao'];?></textarea>
				            </div>
							<input class="form-control azul" type="submit" name="editar" value="Editar"><br>
						</div>
					</form>
						<div class="col-md-12">
							<input class="form-control azul" type="submit" name="excluir" value="Excluir" data-toggle="modal" data-target="#confirmar" >
						</div>
						
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
								    	
										$email_verificacao=$_POST['email_verificacao'];
										$senha_verificacao=base64_encode($_POST['senha_verificacao']);
										if($email_verificacao==$con['email'] && $senha_verificacao==$con['senha'])
										{
											echo ('<script>window.alert("Dados inválidos!")</script>');
											header('location:excluir.php');
										}
										else
										{
											echo('<script>window.alert("Dados inválidos!")</script>');
											echo('<script>window.location="verificar_perfil.php";</script>');
										}
										
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
							$senha=base64_encode($_POST['senha_edt']);
							$estado=$_POST['estado_edt'];
							$telefone=$_POST['telefone_edt'];
							$descricao=$_POST['descricao_edt'];
							//edita
							$sqledt=('UPDATE usuario set nome="'.$nome.'", sobrenome="'.$sobrenome.'", senha="'.$senha.'",  estado="'.$estado.'", telefone="'.$telefone.'", descricao="'.$descricao.'" WHERE id_usuario='.$con['id_usuario'].' ;');
							$editado=mysqli_query($conexao,$sqledt);
							if($editado)
							{
								echo ('<script>window.alert("Dados alterados com sucesso!");window.location.href="perfil_investidor.php";</script>');
							}
							else
							{	
								echo ('<script>window.alert("Erro ao Editar Dados!");window.location.href="perfil_investidor.php";</script>');
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
	<script>
		  $('[data-toggle="tooltip"]').tooltip();
	</script>
    </body>
</html>