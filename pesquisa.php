<?php
	include('verificar_logado.php');
	if($con['categoria_usuario']==1)
    {
    	header('location:home.php');
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
			<!--Caixa de Pesquisa-->
        	<div class="row">
				<div class="col-md-offset-1 col-md-10 espaco">
					<div class="col-auto">
				      <label class="sr-only" for="inlineFormInputGroup">Pesquisa</label>
				      <div class="input-group mb-2 mb-sm-0">
				        <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
				        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pesquisa" name="campopesquisa">
				      </div>
				    </div>
				</div>
			</div>
			<!--Filtros-->
			<form action="" method="POST" name="filtros">
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
			    ?>
        	</div>
        </div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<?php
	 	include('rodape.html');
	?>
	</body>
</html>	
