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
			        			<button type="submit" class="btn btn_foto">Confirmar envio de foto</button>
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
			                        Nick<br><?php echo $con['nick'];?>
			                    </div>
			                </div>
			            </div>
			            <div class="clube-cartao">
			                <div class="row">
			                    
			                    	<?php 
			                    		if(!empty($con['clube']))
			                    		{
			                    			$sqlsel='SELECT * FROM clube WHERE id_clube='.$con['clube'].';';
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
					 <img src="img/perfil_icon.png" class="img-circle">
                        <p>Nick: <?php echo $con['nick'];?> </p>
                        <p>Clube: Red Canids</p>
		                <p>SOBRE MIM:
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
							if ($con['funcao_1']=='c'){
								echo 'Caçador';
							}elseif ($con['funcao_1']=='m'){
								echo 'Meio';
							}elseif ($con['funcao_1']=='s'){
								echo 'Suporte';
							}elseif ($con['funcao_1']=='t'){
								echo 'Topo';
							}else{
								echo 'Atirador';
							}
						?>
	                    </p>
	                    <p>Função Secundária: 
	                    <?php 
							if ($con['funcao_2']=='c'){
								echo 'Caçador';
							}elseif ($con['funcao_2']=='m'){
								echo 'Meio';
							}elseif ($con['funcao_2']=='s'){
								echo 'Suporte';
							}elseif ($con['funcao_2']=='t'){
								echo 'Topo';
							}else{
								echo 'Atirador';
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
						<li><a href="#2"><span>Convites</span></a></li>
						<li><a href="#3"><span>Agenda</span></a></li>
						<li><a href="#4"><span>Vídeos</span></a></li>
						<li><a href="#5"><span>Mensagens</span></a></li>
						<li><a href="#6"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
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
						<input type="hidden" class="validate" name="id_usuario" value="<?php echo($con['id_usuario']);?>">
						<div class="col-md-6">
							<div class="form-group">
								Nome <input type="text" class="form-control" name="nome_edt" value="<?php echo $con['nome'];?>" maxlength="15">
							</div>
							<div class="form-group">
								Sobrenome <input type="text" class="form-control" name="sobrenome_edt"  maxlength="15" value="<?php echo $con['sobrenome'];?>">
							</div>
							<div class="form-group">
								Nick <input type="text" class="form-control" name="nick_edt" maxlength="15" value="<?php echo $con['nick'];?>">
							</div>
							<div class="form-group">
							Função primária
							<select name="funcao_1_edt" class="form-control">
							  <option <?php if($con['funcao_1']=='a'){echo 'selected';}?> value="a">Atirador</option>
							  <option <?php if($con['funcao_1']=='c'){echo 'selected';}?> value="c">Caçador</option>
							  <option <?php if($con['funcao_1']=='m'){echo 'selected';}?> value="m">Meio</option>
							  <option <?php if($con['funcao_1']=='s'){echo 'selected';}?> value="s">Suporte</option>
							  <option  <?php if($con['funcao_1']=='t'){echo 'selected';}?> value="t">Topo</option>
							</select>
							</div>
							<div class="form-group">
							Função secundária
							<select name="funcao_2_edt" class="form-control">
							  <option <?php if($con['funcao_2']=='a'){echo 'selected';}?> value="a">Atirador</option>
							  <option <?php if($con['funcao_2']=='c'){echo 'selected';}?> value="c">Caçador</option>
							  <option <?php if($con['funcao_2']=='m'){echo 'selected';}?> value="m">Meio</option>
							  <option <?php if($con['funcao_2']=='s'){echo 'selected';}?> value="s">Suporte</option>
							  <option  <?php if($con['funcao_2']=='t'){echo 'selected';}?> value="t">Topo</option>
							</select>
							</div>
							<div class="form-group">
								Senha <input type="password" name="senha_edt" value="senha" maxlength="25" class="form-control">
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
								E-mail<input type="email" name="email_edt" value="<?php echo $con['email'];?>" class="form-control" maxlength="30">
							</div>
							<div class="form-group">
								Estado
								<select name="estado_edt" class="form-control">
									<option <?php if($con['estado']=='ac'){echo 'selected';}?> value="ac">Acre</option>
									<option <?php if($con['estado']=='al'){echo 'selected';}?> value="al">Alagoas</option> 
									<option <?php if($con['estado']=='am'){echo 'selected';}?> value="am">Amazonas</option> 
									<option <?php if($con['estado']=='ap'){echo 'selected';}?> value="ap">Amapá</option> 
									<option <?php if($con['estado']=='ba'){echo 'selected';}?> value="ba">Bahia</option> 
									<option <?php if($con['estado']=='ce'){echo 'selected';}?> value="ce">Ceará</option> 
									<option <?php if($con['estado']=='df'){echo 'selected';}?> value="df">Distrito Federal</option> 
									<option <?php if($con['estado']=='es'){echo 'selected';}?> value="es">Espírito Santo</option> 
									<option <?php if($con['estado']=='go'){echo 'selected';}?> value="go">Goiás</option> 
									<option <?php if($con['estado']=='ma'){echo 'selected';}?> value="ma">Maranhão</option> 
									<option <?php if($con['estado']=='mt'){echo 'selected';}?> value="mt">Mato Grosso</option> 
									<option <?php if($con['estado']=='ms'){echo 'selected';}?> value="ms">Mato Grosso do Sul</option> 
									<option <?php if($con['estado']=='mg'){echo 'selected';}?> value="mg">Minas Gerais</option> 
									<option <?php if($con['estado']=='pa'){echo 'selected';}?> value="pa">Pará</option> 
									<option <?php if($con['estado']=='pb'){echo 'selected';}?> value="pb">Paraíba</option> 
									<option <?php if($con['estado']=='pr'){echo 'selected';}?> value="pr">Paraná</option> 
									<option <?php if($con['estado']=='pe'){echo 'selected';}?> value="pe">Pernambuco</option> 
									<option <?php if($con['estado']=='pi'){echo 'selected';}?> value="pi">Piauí</option> 
									<option <?php if($con['estado']=='rj'){echo 'selected';}?> value="rj">Rio de Janeiro</option> 
									<option <?php if($con['estado']=='rn'){echo 'selected';}?> value="rn">Rio Grande do Norte</option> 
									<option <?php if($con['estado']=='ro'){echo 'selected';}?> value="ro">Rondônia</option> 
									<option <?php if($con['estado']=='rs'){echo 'selected';}?> value="rs">Rio Grande do Sul</option> 
									<option <?php if($con['estado']=='rr'){echo 'selected';}?> value="rr">Roraima</option> 
									<option <?php if($con['estado']=='sc'){echo 'selected';}?> value="sc">Santa Catarina</option> 
									<option <?php if($con['estado']=='se'){echo 'selected';}?> value="se">Sergipe</option> 
									<option <?php if($con['estado']=='sp'){echo 'selected';}?> value="sp">São Paulo</option> 
									<option <?php if($con['estado']=='to'){echo 'selected';}?> value="to">Tocantins</option> 
								</select>
							</div>
							<div class="form-group">
								CPF <input type="text" class="form-control" value="<?php echo $con['cpf'];?>" readonly>
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
							$id_usuario=$_POST['id_usuario'];
							$nome=$_POST['nome_edt'];
							$sobrenome=$_POST['sobrenome_edt'];
							$nick=$_POST['nick_edt'];
							$funcao_1=$_POST['funcao_1_edt'];
							$funcao_2=$_POST['funcao_2_edt'];
							$senha=base64_encode($_POST['senha_edt']);
							$email=$_POST['email_edt'];
							$estado=$_POST['estado_edt'];
							$telefone=$_POST['telefone_edt'];
							$descricao=$_POST['descricao_edt'];
							//edita
							$sqledt=('UPDATE usuario set nome="'.$nome.'", sobrenome="'.$sobrenome.'", nick="'.$nick.'", funcao_1="'.$funcao_1.'", funcao_2="'.$funcao_2.'", senha="'.$senha.'", email="'.$email.'", estado="'.$estado.'", telefone="'.$telefone.'", descricao="'.$descricao.'" WHERE email="'.$email_usuario.'" ;');
							mysqli_query($conexao,$sqledt);
							header('location:verificar_perfil.php');
							exit();	
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
	<script type="text/javascript">
			$(".arq2").hover(function() {
			  $(this).children("p").show();
			}, function() {
			  $(this).children("p").hide();
			});
		</script>
    </body>
</html>