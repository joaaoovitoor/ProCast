<?php 
	include('verificar_admin.php');
	include("menu-admin.html");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Gerencimento de clubes
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/clubes.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
			.cl{
				width: 300px;
				height: 250px !important;
			}
		</style>
	</head>
	<body>
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 bg-procast titulo">
						<h1>Clubes cadastrados</h1>
					</div>
				</div>
			</div>
		</section>
		<br/>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12 ">
						<form action="#" method="POST" >
							<div class="input-group">
							    <span class="input-group-btn">
							     	<button class="btn btn-procast btn-lg" type="submit" name="enviar"> <i class="fa fa-search"></i> Pesquisar clube</button>
							    </span>
							    <input type="text" class="form-control input-lg" placeholder="Digite o nome do clube aqui" name="pesquisa_clube">
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		</br>
		<section>
			<div class="container">
				<div class="row">
					<?php
						if(isset($_POST['enviar']))
                        {
                        $nomepesq=$_POST['pesquisa_clube'];
                            if(empty($nomepesq))
                            {
                              echo '<script>alert("Digite o nome de pesquisa!")</script>';
                              echo '<script>window.location="clubes.php";</script>'; 
                              exit();
                            }
	                        $sqlsel='SELECT * FROM clube WHERE nome_clube LIKE "%'.$nomepesq.'%";';
							$res=mysqli_query($conexao,$sqlsel);
							if (mysqli_num_rows($res)) {
								while ($con=mysqli_fetch_array($res)) {
						?>
						<div class="col-md-4">
							<div class="thumbnail">
						      <img src="uploads/<?php echo($con['logo_clube']); ?>" alt="..." class="cl">
						      <div class="caption">
						        <h3 class="text-center"><?php echo($con['nome_clube']); ?></h3>
						        <p class="text-center"><?php echo($con['descricao_clube']); ?></p>
						        <p class="text-center"><a href="clubes.php?exc=<?php echo($con['id_clube']); ?>" class="btn btn-block btn-danger" role="button">Excluir</a></p>
						      </div>
						    </div>
						</div>
						<?php
								}
							}
							else
	                        {
	                            echo '<h3 align="center"><img src="img/triste.png"><br>Nenhum Clube</h3>';
	                        }
	                        if (isset($_GET['exc']))
	                        {
	                        	$ex=$_GET['exc'];
	                        	$sqlex='DELETE FROM convite WHERE id_clube='.$ex.';';
								mysqli_query($conexao,$sqlex);	
								$sqlup='UPDATE usuario set clube="" WHERE clube='.$ex.';';
								$sqlex='DELETE FROM clube WHERE id_clube='.$ex.';';
								if(mysqli_query($conexao,$sqlex))
								{
									echo('<script>alert("Clube excluído com sucesso!");</script>');
									header('location:clubes.php');

								}	
	                        }
	                    }
                        else
                        {          
						$sqlsel='SELECT * FROM clube;';
						$res=mysqli_query($conexao,$sqlsel);
						if (mysqli_num_rows($res)) {
							while ($con=mysqli_fetch_array($res)) {
					?>
					<div class="col-md-4">
						<div class="thumbnail">
					      <img src="uploads/<?php echo($con['logo_clube']); ?>" alt="..." class="cl">
					      <div class="caption">
					        <h3 class="text-center"><?php echo($con['nome_clube']); ?></h3>
					        <p class="text-center"><?php echo($con['descricao_clube']); ?></p>
					        <p class="text-center"><a href="clubes.php?exc=<?php echo($con['id_clube']); ?>" class="btn btn-block btn-danger" role="button">Excluir</a></p>
					      </div>
					    </div>
					</div>
					<?php
							}
						}
						else
                        {
                            echo '<h3 align="center"><img src="img/triste.png"><br>Nenhum Clube</h3>';
                        }
                        if (isset($_GET['exc']))
                        {
                        	$ex=$_GET['exc'];
                        	$sqlex='DELETE FROM convite WHERE id_clube='.$ex.';';
							mysqli_query($conexao,$sqlex);	
							$sqlup='UPDATE usuario set clube="" WHERE clube='.$ex.';';
							$sqlex='DELETE FROM clube WHERE id_clube='.$ex.';';
							if(mysqli_query($conexao,$sqlex))
							{
								echo('<script>alert("Clube excluído com sucesso!");</script>');
								header('location:clubes.php');

							}	
                        }
                    }
					?>
				</div>
			</div>
		</section>
<?php 
	include("rodapeadm.html");
?>
	</body>
</html>