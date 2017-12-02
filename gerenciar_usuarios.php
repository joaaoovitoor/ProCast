<?php 
	include('verificar_admin.php');
	include("menu-admin.html");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Gerencimento de usuários
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/clubes.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 bg-procast titulo">
						<h1>Usuários cadastrados</h1>
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
							     	<button class="btn btn-procast btn-lg" type="submit" name="enviar"> <i class="fa fa-search"></i> Pesquisar usuário</button>
							    </span>
							    <input type="text" class="form-control input-lg" placeholder="Digite o nome do clube aqui" name="pesquisa_jog">
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
						if (isset($_POST['enviar']))
						{
							$pesq=$_POST['pesquisa_jog'];
							if(!empty($pesq))
							{
								$sqlsel='SELECT * FROM usuario WHERE categoria_usuario="1" AND ();';
							}
							else
							{
								echo('<script>alert("Todos os campos devem ser preenchidos!");</script>');
							}
						}
						else
						{
							$sqlsel='SELECT * FROM usuario WHERE categoria_usuario="1";';
						}
						
						$res=mysqli_query($conexao,$sqlsel);
						while ($controler=mysqli_fetch_array($res)) 
						{
							echo 
							('
								<div class="col-md-4">
									<div class="thumbnail">
								      <img src="uploads/'.$controler['foto_perfil'].'" class="img-responsive img-circle perf">
								      <div class="caption">
								        <h3 class="text-center">'.$controler['nick'].'</h3>
								        <p class="text-center">'.$controler['descricao'].'</p>
								        <p class="text-center"><a href="ver_jogador.php?pesq='.$controler['nick'].'" target="blank" class="btn btn-procast" role="button">Detalhes</a> <a href="contatos.php?msg='.$controler['id_usuario'].'" class="btn btn-default" role="button">Contatar</a> <a href="gerenciar_usuarios.php?exc='.$controler['id_usuario'].'" class="btn btn-danger" role="button">Excluir</a></p>
								      </div>
								    </div>
								</div>
							');
						}
						if(isset($_GET['exc']))
						{
							$ex=$_GET['exc'];
							$sqlex='DELETE FROM comentario WHERE id_usuario='.$ex.';';
							mysqli_query($conexao,$sqlex);
							$sqlex='DELETE FROM denuncia WHERE id_usuario='.$ex.';';
							mysqli_query($conexao,$sqlex);
							$sqlex='DELETE FROM contato WHERE id_usuario='.$ex.';';
							mysqli_query($conexao,$sqlex);
							$sqlex='DELETE FROM clube WHERE id_usuario='.$ex.';';
							mysqli_query($conexao,$sqlex);
							$sqlex='DELETE FROM pagamento WHERE id_usuario='.$ex.';';
							mysqli_query($conexao,$sqlex);
							$sqlex='DELETE FROM video WHERE id_usuario='.$ex.';';
							mysqli_query($conexao,$sqlex);
							$sqlex='DELETE FROM agenda WHERE id_usuario='.$ex.';';
							mysqli_query($conexao,$sqlex);
							$sqlex='DELETE FROM mensagem WHERE id_enviar='.$ex.';';
							mysqli_query($conexao,$sqlex);
							$sqlex='DELETE FROM mensagem WHERE id_receber='.$ex.';';
							mysqli_query($conexao,$sqlex);
							$sqlex='DELETE FROM convite WHERE id_jogador='.$ex.';';
							mysqli_query($conexao,$sqlex);
							$sqlex='DELETE FROM usuario WHERE id_usuario='.$ex.';';
							if(mysqli_query($conexao,$sqlex))
							{
								echo('<script>alert("Usuário excluído com sucesso!");</script>');
								header('location:gerenciar_usuarios.php');

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