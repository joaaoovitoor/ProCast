<?php
	include('verificar_logado.php');
	if($con['categoria_usuario']==1 or $con['clube']=="")
    {
    	header('location:verificar_perfil.php');
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<?php
			include('link_head.html');
		?>
		<title>Pesquisa</title>
		<link rel="stylesheet" href="css/pesquisa.css" type="text/css"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="js/pesq_filtr.js"></script>
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
                       Encontre jogadores para o seu clube!
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
			<form action="" method="POST" name="filtros">
				<!--Caixa de Pesquisa-->
	        	<div class="row">
					<div class="col-md-offset-1 col-md-10 espaco">
						<form action="#">
						<div class="col-auto">
					      <label class="sr-only" for="inlineFormInputGroup">Pesquisa</label>
					      <div class="input-group mb-2 mb-sm-0">
					        <span class="input-group-btn">
						     	<button class="btn btn-lg" type="submit" name="pesq_txt"> <i class="fa fa-search"></i> Pesquisar jogador</button>
						    </span>
					        <input type="text" class="form-control input-lg" placeholder="Digite o nome do nick aqui" name="pesquisa_jog">
					      </div>
					    </div>
					</div>
				</div>
				<!--Filtros-->
				<div class="row">
					<div class="col-md-offset-1 col-md-10">
		        		<div class="col-md-4 espaco">
		        			<div class="form-group">
								Idade
								<select name="idade" id="idade" class="form-control">
									<option value="0">Selecione a idade</option>
									<option value="1">Até 15 anos</option>
									<option value="2">De 16 a 19 anos</option>
									<option value="3">De 20 a 23 anos</option>
									<option value="4">De 24 a 27 anos</option>
									<option value="5">28+ anos</option>
								</select>
							</div>
		        		</div>
						<div class="col-md-4">
							<div class="form-group">
								Estado
								<select name="estado" id="estado" class="form-control">
									<option value="0">Selecione um estado</option>
										<?php
											$sqlsel='SELECT * FROM estado;';
											$resul=mysqli_query($conexao,$sqlsel);
											while ($con=mysqli_fetch_array($resul))
											{
												echo
												('
													<option value="'.$con['id'].'">'.$con['nome'].'</option>
												');
											}
										?>
								</select>
							</div>
		        		</div>
						<div class="col-md-4">
							<div class="form-group">
								Função
								<select name="funcao" id="funcao" class="form-control">
									<option value="0">Selecione uma função</option>
									<?php
										$sqlsel='SELECT * FROM funcao;';
										$resul=mysqli_query($conexao,$sqlsel);
										while ($con=mysqli_fetch_array($resul))
										{
											echo
											('
												<option value="'.$con['id_funcao'].'">'.$con['nome_funcao'].'</option>
											');
										}
									?>
								</select>
							</div>
		        		</div>
		        		<div class="col-md-offset-10 col-md-2">
		        			<button type="submit" id="pesquisar" name="pesquisar" class="btn btn-block bg_azul_escuro">Filtrar</button>
		        		</div>
		        	</div>
	        	</div>
	        </form>
	    </div>
	    
			<!--Card com Informações-->
			<div class="container-fluid">
			<div class="row">
				<?php
					if(isset($_POST['pesq_txt']))
					{
						$nomepesq=$_POST['pesquisa_jog'];
                        if(empty($nomepesq))
                        {
                          echo '<script>alert("Digite o nome de pesquisa!")</script>';
                          echo '<script>window.location="pesquisa.php";</script>'; 
                          exit();
                        }
						$sqlsel=('SELECT * FROM usuario WHERE (categoria_usuario=1 AND nick LIKE "%'.$nomepesq.'%" AND clube IS NULL);');
						//resultados
						$resulpesq = mysqli_query($conexao,$sqlsel);
						if(mysqli_num_rows($resulpesq)>0)
						{
							while ($conresul=mysqli_fetch_array($resulpesq))
							{
								$sqlsel2='SELECT nome_funcao FROM funcao WHERE id_funcao='.$conresul['funcao_1'].';';
								$resul2=mysqli_query($conexao,$sqlsel2);
								$con2=mysqli_fetch_array($resul2);
								$sqlsel3='SELECT nome_funcao FROM funcao WHERE id_funcao='.$conresul['funcao_2'].';';
								$resul3=mysqli_query($conexao,$sqlsel3);
								$con3=mysqli_fetch_array($resul3);
								if($conresul['foto_perfil']){
							       	$cam='uploads/'.$conresul['foto_perfil'];
							    }
							    else{
							    	$cam='img/perfil_icon.png';
							    }
							    $sqlsel='SELECT * FROM estado WHERE id='.$conresul['estado'].';';
								$resul=mysqli_query($conexao,$sqlsel);
								$con_es=mysqli_fetch_array($resul);	
								$sqlsel='SELECT * FROM cidade WHERE id='.$conresul['cidade'].';';
								$resul=mysqli_query($conexao,$sqlsel);
								$con_cd=mysqli_fetch_array($resul);	
								echo
								('
									<div class="col-md-offset-2 col-md-8">
										<div class="cartao-equipe">
							                <div class="media">
							                    <div class="media-left">

							                        <img class="media-object img-circle profile-img" src="'.$cam.'">
							                        <form action="pesquisa.php" method="POST">
							                        <input type="hidden" name="id_jog" value="'.$conresul['id_usuario'].'"/>
							                        
							                        <p><button class="btn btn-default" name="convidar" type="submit"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Convidar</button></p>
							                        </form>
							                    </div>
							                    <div class="media-body">
							                        <a href="ver_jogador.php?pesq='.$conresul['nick'].'" target="_blank"><h3 class="media-heading">'.$conresul['nick'].'</h3></a>
								                    <h5>'.$conresul['nome'].' '.$conresul['sobrenome'].'</h5>
								                    <p>Função primária: '.$con2['nome_funcao'].'</p>
								                    <p>Função secundária: '.$con3['nome_funcao'].'</p>
								                    <p>'.$con_cd['nome'].' - '.$con_es['nome'].'</p>
							                    </div>
							                </div>
							            </div>
						            </div>
						           
								');
							}
						}
						else{
							echo('<script>alert("Perfil não encontrado!");</script>');
						}
					}
					else
					{
				        include('exibe_pesq.php');
				        if (isset($_POST['convidar'])) {
							$id_jog=$_POST['id_jog'];
							$sqlsel='SELECT * FROM usuario WHERE email="'.$email_usuario.'";';
				        	$resul=mysqli_query($conexao,$sqlsel);
							$con_cl=mysqli_fetch_array($resul);	
				        	$sqlsel='SELECT * FROM clube WHERE id_usuario='.$con_cl['id_usuario'].';';
				        	$resul=mysqli_query($conexao,$sqlsel);
							$con_cl2=mysqli_fetch_array($resul);		
				        	$sqlin='INSERT INTO convite (id_jogador,id_investidor,id_clube,status) VALUES ('.$id_jog.','.$con_cl['id_usuario'].','.$con_cl2['id_clube'].',"F");';
				        	$resul=mysqli_query($conexao,$sqlin);
							
				        }
				    }
			    ?>
        	</div>
        </div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<?php
	 	include('rodape.html');
	?>
	</body>
</html>	
