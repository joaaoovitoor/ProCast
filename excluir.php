<?php
	include('conexao.php');
	include('verificar_logado.php');
	if($con['categoria_usuario']==2)
	{
		if(!$con['clube']=="")
		{
			//se o cara  tiver clube, vai deixar os jogadores do seu clube com campo null
			$sqldadosclube='UPDATE usuario SET clube=NULL WHERE clube='.$con['clube'].';';
			mysqli_query($conexao,$sqldadosclube);

			//deletando clube do cara
			$sqlexdados='DELETE FROM clube WHERE id_usuario='.$con['id_usuario'].';';
			mysqli_query($conexao,$sqlexdados);
		}
		//deletando conta do cara
		$sqlexusuario='DELETE FROM usuario WHERE email="'.$_SESSION['email'].'";';
		$delete=mysqli_query($conexao,$sqlexusuario);
		if($delete)
		{
			echo('<script>alert("Conta excluída!");</script>');
			session_destroy();
	 		echo('<script>window.location="index.php";</script>');
			
		}
		else
		{
			echo('<script>alert("Erro ao excluir conta!");</script>');
	 		echo('<script>window.location="index.php";</script>');
		}
	}
	else
	{
		$sqlexusuario='DELETE FROM usuario WHERE email="'.$_SESSION['email'].'";';
		$delete=mysqli_query($conexao,$sqlexusuario);
		if($delete)
		{
			echo('<script>alert("Conta excluída!");</script>');
			session_destroy();
	 		echo('<script>window.location="index.php";</script>');
			
		}
		else
		{
			echo('<script>alert("Erro ao excluir conta!");</script>');
	 		echo('<script>window.location="index.php";</script>');
		}
	}
?>