<?php 
	include('verificar_admin.php');
	include("menu-admin.html");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Contatos
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/perfil/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/perfil/tabstyles.css" />
		<script src="js/tinymce/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'textarea' });</script>		
		<meta charset="UTF-8"/>
	</head>
	<style type="text/css">
		body
		{
			margin: 0px;
			padding: 0px;
		}
		.btn-procast
		{
			background-color: #02314C;
			color: white;
		}
		.bg-procast
		{
			background-color: #333333;
			color:white;
		}
		.titulo
		{
			padding: 50px;
		}
		.mensagem_enviada
		{
			border:1px  solid rgba(0,0,0,0.1);
			margin-bottom: 10px;

		}
		
	</style>
	<body>
		<section>
			<div class="container-fluid bg-procast">
				<div class="row ">
					<div class="col-md-12 titulo">
						<h1>Mensagens </h1>
					</div>
				</div>
			</div>
		</section>
		<br>
		<section>
			<div class="tabs tabs-style-linebox">
					<nav>
						<ul>
							<li><a href="#section-linebox-1"><span>Nova mensagem</span></a></li>
							<li><a href="#section-linebox-2"><span>Mensagens Enviadas</span></a></li>
							<li><a href="#section-linebox-3"><span>Mensagens Recebidas 
							<span class="badge">
							<?php
								$sql='SELECT * FROM contato;';
								$resul=mysqli_query($conexao,$sql);
								$quantidade_pendente=mysqli_num_rows($resul);
								echo $quantidade_pendente;
							?>
							</span>
							</span></a></li>
							<li><a href="#section-linebox-4"><span>Mensagens Arquivadas</span></a></li>
						</ul>
					</nav>
					<div class="content-wrap">
					<!-- Nova mensagem -->
					<section id="section-linebox-1">
						<h1 class="text-center"> Nova mensagem</h1>
						<div class="container-fluid">
							<div class="row">
								<form method="POST" action="#" enctype="multipart/form-data">
									<div class="form-group col-md-6">
										<h4>Titulo da mensagem:</h4>
										<input type="text" name="titulo_mensagem" placeholder="Título da mensagem" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<h4>Selecione um assunto:</h4>
										<select name="assunto" class="form-control">
											<option value="0" class="disabled">Selecione um assunto</option>
											<?php
												$sqlsel='SELECT * FROM cat_contato;';
												$resul=mysqli_query($conexao,$sqlsel);
												while ($controler=mysqli_fetch_array($resul)) {
													echo
													('
														<option value="'.$controler['id_cat_contato'].'">'.$controler['descricao'].'</option>
													');
												}
											?>
										</select>
									</div>
									<div class="form-group col-md-12">
										<h4>Destinatário:</h4>
										<?php
											if (isset($_GET['msg'])) {
												$id=$_GET['msg'];
												$sqlsel='SELECT * FROM usuario WHERE id_usuario='.$id.';';
												$resul=mysqli_query($conexao,$sqlsel);
												$controler=mysqli_fetch_array($resul);
												echo
												('
													<input type="email" name="destino" class="form-control" value="'.$controler['email'].'" >
												');
											}
											else
											{
												echo
												('
													<input type="email" name="destino" class="form-control" placeholder="Digite o email aqui">
												');
											}
										?>
										
									</div>
									<div class="form-group col-md-12">
										<textarea class="form-control" rows="10" name="mensagem" placeholder="Digite sua mensagem"></textarea>
									</div>
									<div class="form-group col-md-4">
										<input type="file" class="form-control" name="anexo" id="anexo">
									</div>
									<div class="form-group">
										<input type="submit" name="enviar" class="btn btn-block btn-procast" value="Enviar mensagem">
									</div>
								</form>
							</div>	
						</div>
						<?php
							if (isset($_POST['enviar'])) 
							{
								$titulo=$_POST['titulo_mensagem'];
								$assunto=$_POST['assunto'];
								$destino=$_POST['destino'];
								$mensagem=$_POST['mensagem'];
								if (!empty($titulo)&&!empty($assunto)&&!empty($destino)&&!empty($mensagem))
								{
									$sqlsel='select * from usuario where email="'.$destino.'";';
				                    $resul=mysqli_query($conexao,$sqlsel);
				                    if(mysqli_num_rows($resul))
                    				{
                    					$con2=mysqli_fetch_array($resul);
                    					if (isset($_FILES['anexo']))
				                        {
				                            $extensao=strtolower(substr($_FILES['anexo']['name'], -4));
				                            $novo_nome=md5(time().$con['id_usuario']).$extensao;
				                            $diretorio="uploads/";
				                            move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome);
				                            //quando o php recebe um arquivo de upload ele é armazenado temporariamente em uma pasta com seus arquivos de sistema
				                            $sqlin='INSERT INTO contato(assunto,data_contato,titulo,imagem_contato,descricao,rec,env) VALUES ('.$assunto.',NOW(),"'.$titulo.'","'.$novo_nome.'","'.$mensagem.'",'.$con2['id_usuario'].','.$con['id_admin'].');';
				                        }
				                        else
				                        {
				                            $sqlin='INSERT INTO contato(assunto,data_contato,titulo,descricao,rec,env) VALUES ('.$assunto.',NOW(),"'.$titulo.'","'.$mensagem.'",'.$con2['id_usuario'].','.$con['id_admin'].');';
				                        }
				                        mysqli_query($conexao,$sqlin);
				                        echo('<script>alert("Mensagem enviada");</script>');
				                        echo('<script>window.location="rascunhos.php";</script>');
                    				}
                    				else
				                    {
				                        echo('<script>alert("Destino não cadastrado");</script>');
				                    }

				                    
								}
								else
								{
									echo('<script>alert("Preencha todos os campos!");</script>');
									header('location:contatos.php');
								}
							}
						?>						
					</section>
					<!-- Mensagens criadas -->
					<section id="section-linebox-2">
						<div class="container-fluid">
							<?php
								$sqlsel='SELECT * FROM contato WHERE id_usuario!='.$con['id_admin'].';';
								$resul=mysqli_query($conexao,$sqlsel);
								if (mysqli_num_rows($resul)) 
								{
									while ($controler=mysqli_fetch_array($resul))
									{
										$sqlsel='SELECT * FROM usuario WHERE id_usuario='.$controler['id_usuario'].';';
										$resul=mysqli_query($conexao,$sqlsel);
										$controler_usuario=mysqli_fetch_array($resul);
										$sqlsel='SELECT * FROM cat_contato WHERE id_cat_contato='.$controler['assunto'].';';
										$resul=mysqli_query($conexao,$sqlsel);
										$controler_cat=mysqli_fetch_array($resul);
										echo
										('
											<div class="row">
												<div class="col-md-12 mensagem_enviada">
													<p style="font-size: 16px;"><strong>Para: </strong> '.$controler_usuario['email'].'</p>
													<p style="font-size: 16px;"><strong>Motivo:</strong> '.$controler_cat['descricao'].'</p>
													<p style="font-size: 16px;"><strong>Titulo:</strong> '.$controler['titulo'].'</p>
													<p style="font-size: 16px;"><strong>Mensagem:</strong> '.$controler['descricao'].'</p>
													<div class="botao" style="padding-bottom: 10px;">
														<a class="btn btn-procast" href="contatos.php?up='.$controler['id_contato'].'"><i class="fa fa-close"></i> Arquivar</a>
													</div>
												</div>
											</div>
										');
									}
	
								}
								else
								{
									echo '<h3 align="center"><img src="img/triste.png"><br>Nenhuma mensagem</h3>';
								}
								if (isset($_GET['up'])) {
									$id_up=$_GET['up'];
									$sqlup='update contato set arq="V" where id_contato='.$id_up.';';
									if(mysqli_query($conexao,$sqlup))
									{
										echo('<script>alert("Arquivada com sucesso!");</script>');

									}
								}
							?>

						</div>
					</section>
					<!-- Mensagens reebidas -->
					<section id="section-linebox-3">
						<div class="container-fluid">
							<?php
								$sqlsel='SELECT * FROM contato ORDER BY data_contato DESC';
								$resul=mysqli_query($conexao,$sqlsel);
								
								if (mysqli_num_rows($resul)>0)
								{
									while ($con=mysqli_fetch_array($resul)) 
									{
										$sqlusuario='SELECT email FROM usuario WHERE id_usuario='.$con['id_usuario'].';';
										$resul1=mysqli_query($conexao,$sqlusuario);
										$con1=mysqli_fetch_array($resul1);
							?>
							<div class="row">
								<div class="col-md-12 mensagem_enviada">
									<p style="font-size: 16px;"><strong>Data: </strong><?php echo $con['data_contato'];?></p>
									<p style="font-size: 16px;"><strong>Remetente: </strong><?php echo $con1['email'];?></p>
									<p style="font-size: 16px;"><strong>Motivo: </strong>
									<?php 
										if($con['assunto']==1){
											echo 'Dicas';
										}elseif ($con['assunto']==2){
											echo 'Problemas';										
										}elseif ($con['assunto']==3){
											echo 'Reclamações';										
										}elseif ($con['assunto']==4){
											echo 'Propostas';
										}else{
											echo 'Elogios';										
										}
									?>
									</p>
									<p style="font-size: 16px;"><strong>Título: </strong><?php echo $con['motivo'];?></p>
									<p style="font-size: 16px;"><strong>Mensagem: </strong><?php echo $con['descricao'];?></p>
									<?php 
										if($con['print']!=NULL){
											echo '<p style="font-size: 16px;"><strong>Imagem: </strong><a href=uploads/'.$con['print'].' target="blank">'.$con['print'].'</a></p>';
										}
									?>
									<div class="botao" style="padding-bottom: 10px;">
										<button class="btn btn-procast"><i class="fa fa-close"></i> Arquivar</button> <button class="btn btn-default"><i class="fa fa-share"></i> Responder </button>
									</div>
								</div>
							</div>
							<?php
									}
								}
								else
								{
									echo '<h3 align="center"><img src="img/triste.png"><br>Nenhuma mensagem</h3>';
								}
							?>
						</div>
					</section>
					<!--Mensagens Arquivadas-->
					<section id="section-linebox-4">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12 mensagem_enviada">
									<p style="font-size: 16px;"><strong>Remetente:</strong> iago@freitas.com.br</p>
									<p style="font-size: 16px;"><strong>Motivo:</strong> Agradecimento</p>
									<p style="font-size: 16px;"><strong>Titulo:</strong> Muito obrigado Desenvolvedores !</p>
									<p style="font-size: 16px;"><strong>Mensagem:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi imperdiet ipsum ut odio pulvinar, sit amet viverra dolor dictum. Ut hendrerit tincidunt eros, ac suscipit odio egestas quis. Maecenas varius orci et volutpat sollicitudin. Proin eget lorem diam. Nam elementum enim eu mauris dapibus vulputate. Pellentesque ultrices sollicitudin dolor ut facilisis. Cras eu dolor non orci tincidunt hendrerit. Vivamus aliquam gravida quam, vel egestas nisi ultrices ac. Phasellus ac nibh orci. Vestibulum tortor metus, molestie quis hendrerit nec, varius ac nibh. Mauris vitae est nec ante fermentum tempus suscipit ut mauris. </p>
									<div class="botao" style="padding-bottom: 10px;">
										 <button class="btn btn-danger"><i class="fa fa-trash"></i> Excluir de forma permanente </button>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mensagem_enviada">
									<p style="font-size: 16px;"><strong>Para:</strong> iago@freitas.com.br</p>
									<p style="font-size: 16px;"><strong>Motivo:</strong> Agradecimento</p>
									<p style="font-size: 16px;"><strong>Titulo:</strong> Muito obrigado usuário !</p>
									<p style="font-size: 16px;"><strong>Mensagem:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi imperdiet ipsum ut odio pulvinar, sit amet viverra dolor dictum. Ut hendrerit tincidunt eros, ac suscipit odio egestas quis. Maecenas varius orci et volutpat sollicitudin. Proin eget lorem diam. Nam elementum enim eu mauris dapibus vulputate. Pellentesque ultrices sollicitudin dolor ut facilisis. Cras eu dolor non orci tincidunt hendrerit. Vivamus aliquam gravida quam, vel egestas nisi ultrices ac. Phasellus ac nibh orci. Vestibulum tortor metus, molestie quis hendrerit nec, varius ac nibh. Mauris vitae est nec ante fermentum tempus suscipit ut mauris. </p>
									<div class="botao" style="padding-bottom: 10px;">
										<button class="btn btn-danger"><i class="fa fa-trash"></i> Excluir de forma permanente </button>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</section>
		<script src="js/modernizr.custom.js"></script>
		<script src="js/cbpFWTabs.js"></script>
		<script>
		(function() {

		[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
			new CBPFWTabs( el );
		});

		})();
		</script>
<?php 
	include("rodapeadm.html");
?>
	</body>
</html>