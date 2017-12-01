<?php 
	include('verificar_admin.php');
	include("menu-admin.html");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Minha conta
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/gerenciamento_de_torneios.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/perfil/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/perfil/tabstyles.css" />
		<meta charset="UTF-8"/>
	</head>
	<body>
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 bg-procast titulo">
						<h1>Minha Conta</h1>
					</div>
				</div>
			</div>
		</section>
		<br>
		<section>
			<div class="tabs tabs-style-linebox">
				<nav>
					<ul>
						<li><a href="#section-linebox-1"><span>Minha Conta</span></a></li>
						<li><a href="#section-linebox-2"><span>Adicionar Admin</span></a></li>
					</ul>
				</nav>
				<div class="content-wrap">
					<section id="section-linebox-1">
						<h1 class="text-center">Minha Conta</h1>
						<div class="container-fluid">
							<div class="row">
								<form method="POST" action="#">
									<div class="form-group col-md-6">
										<h4>Nome:</h4>
										<input type="text" name="nome" value="<?php echo $con['nome']; ?>" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<h4>Sobrenome:</h4>
										<input type="text" name="sobrenome" value="<?php echo $con['sobrenome']; ?>" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<h4>Email:</h4><input type="text" name="email" class="form-control" value="<?php echo $con['email']; ?>">
									</div>
									<div class="form-group col-md-6">
										<h4>Senha:</h4><input type="password" name="senha" class="form-control" value="<?php echo base64_decode($con['senha']); ?>">
									</div>
									<div class="form-group col-md-1 col-md-offset-5">
										<input type="submit" name="alterar" class="btn btn-primary center-block" value="Alterar">
									</div>
									<div class="form-group col-md-1">
										<input type="submit" name="excluir" class="btn btn-primary center-block" value="Excluir">
									</div>
								</form>
							</div>	
						</div>
					</section>
					<section id="section-linebox-2">
						<h1 class="text-center">Adicionar Administrador</h1>
						<div class="container-fluid">
							<div class="row">
								<form method="POST" action="#">
									<div class="form-group col-md-6">
										<h4>Nome:</h4>
										<input type="text" name="nome_novo" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<h4>Sobrenome:</h4>
										<input type="text" name="sobrenome_novo" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<h4>Email:</h4><input type="text" name="email_novo" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<h4>Senha:</h4><input type="password" name="senha_novo" class="form-control">
									</div>
									<div class="form-group">
										<input type="submit" name="criar_admin" class="btn btn-primary center-block" value="Criar">
									</div>
								</form>
							</div>	
						</div>
				</section>

		<?php 
			if(isset($_POST['criar_admin']))
			{
				$nome=$_POST['nome_novo'];
				$sobrenome=$_POST['sobrenome_novo'];
				$email=$_POST['email_novo'];
				$senha=$_POST['senha_novo'];

				if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($senha))
				{
					$sqlusu='SELECT * FROM usuario WHERE email="'.$email.'";';
					$resulusu=mysqli_query($conexao,$sqlusu);

					$sqlanu='SELECT * FROM anunciante WHERE email="'.$email.'";';
					$resulanu=mysqli_query($conexao,$sqlanu);

					if(mysqli_num_rows($resulusu)>0)
					{
						echo('<script>alert("Email já cadastrado!");</script>');
						echo('<script>window.location="conta_admin.php";</script>');
						exit();
					}
					elseif(mysqli_num_rows($resulanu)>0)
					{
						echo('<script>alert("Email já cadastrado!");</script>');
						echo('<script>window.location="conta_admin.php";</script>');
						exit();
					}
					else
					{
						$sqlad='SELECT * FROM admin WHERE email="'.$email.'";';
						$resulad=mysqli_query($conexao,$sqlad);
						if(mysqli_num_rows($resulad)>0)
						{	
							echo('<script>alert("Email já cadastrado!");</script>');
							echo('<script>window.location="conta_admin.php";</script>');
						}
						else
						{
							$sqlin='INSERT INTO admin(nome,sobrenome,email,senha) VALUES ("'.$nome.'","'.$sobrenome.'","'.$email.'","'.base64_encode($senha).'");';
							$inserir=mysqli_query($conexao,$sqlin);
							if($inserir)
							{
								echo('<script>alert("Admin criado com sucesso!");</script>');
								echo('<script>window.location="conta_admin.php";</script>');
							}
							else
							{
								echo('<script>alert("Erro ao criar conta de admin!");</script>');
								echo('<script>window.location="conta_admin.php";</script>');
							}
						}
					}
				}
				else
				{
					echo('<script>alert("Digite todos os dados!");</script>');
					echo('<script>window.location="conta_admin.php";</script>');
				}
			}

			if(isset($_POST['alterar']))
			{
				$nome=$_POST['nome'];
				$sobrenome=$_POST['sobrenome'];
				$email=$_POST['email'];
				$senha=$_POST['senha'];

				if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($senha))
				{
					$sqlusu='SELECT * FROM usuario WHERE email="'.$email.'";';
					$resulusu=mysqli_query($conexao,$sqlusu);

					$sqlanu='SELECT * FROM anunciante WHERE email="'.$email.'";';
					$resulanu=mysqli_query($conexao,$sqlanu);

					if(mysqli_num_rows($resulusu)>0)
					{
						echo('<script>alert("Email já cadastrado!");</script>');
						echo('<script>window.location="conta_admin.php";</script>');
						exit();
					}
					elseif(mysqli_num_rows($resulanu)>0)
					{
						echo('<script>alert("Email já cadastrado!");</script>');
						echo('<script>window.location="conta_admin.php";</script>');
						exit();
					}
					else
					{
						$sqlad='SELECT * FROM admin WHERE email="'.$email.'";';
						$resulad=mysqli_query($conexao,$sqlad);
						if(mysqli_num_rows($resulad)>0)
						{	
							echo('<script>alert("Email já cadastrado!");</script>');
							echo('<script>window.location="conta_admin.php";</script>');
						}
						else
						{
							$sqlat='UPDATE admin SET nome="'.$nome.'",sobrenome="'.$sobrenome.'",email="'.$email.'",senha="'.base64_encode($senha).'" WHERE id_admin='.$con['id_admin'].';';
							$atualizar=mysqli_query($conexao,$sqlat);
							if($atualizar)
							{
								echo('<script>alert("Dados alterados! Você será desconectado para concluir as alterações");</script>');
								echo('<script>window.location="destruir.php";</script>');
							}
							else
							{
								echo('<script>alert("Falha ao alterar dados!");</script>');
								echo('<script>window.location="conta_admin.php";</script>');
							}
						}
					}
				}
				else
				{
					echo('<script>alert("Digite todos os dados!");</script>');
					echo('<script>window.location="conta_admin.php";</script>');
				}
			}

			if(isset($_POST['excluir']))
			{
				$sqlex='DELETE FROM admin WHERE id_admin='.$con['id_admin'].';';
				$deletar=mysqli_query($conexao,$sqlex);
				if($deletar)
				{
					echo('<script>alert("Conta removida!");</script>');
					echo('<script>window.location="destruir.php";</script>');
				}
				else
				{
					echo('<script>alert("Erro ao excluir conta!");</script>');
					echo('<script>window.location="conta_admin.php";</script>');
				}
			}
		?>
		<script src="js/cbpFWTabs.js"></script>
		<script src="js/modernizr.custom.js"></script>
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