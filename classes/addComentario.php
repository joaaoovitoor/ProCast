<?php
	include('conexao.php');
	$texto= $_POST['comentario'];
	$id_noticia = $_GET['ex'];
	if($email_usuario == 'admin@admin')
	{
		$resul = mysqli_query($conexao, "SELECT * FROM admin WHERE email = '".$email_usuario."';");
		$linha = mysqli_fetch_array($resul);
		$id_usuario = $linha['id_admin'];
		$nome = $linha['nome'];
		mysqli_query($conexao, 'INSERT INTO comentario(texto_comentario, id_usuario, data_comentario, id_noticia) VALUES ("'.$texto.'",'.$id_usuario.',"'.date("y.m.d").'",'.$id_noticia.');');
	}
	else
	{

		$resul = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '".$email_usuario."';");
		$id_usuario = $linha['id_usuario'];
		$nome = $linha['nome'];
		mysqli_query($conexao, 'INSERT INTO comentario(texto_comentario, id_usuario, data_comentario, id_noticia) VALUES ("'.$texto.'",'.$id_usuario.',"'.date("y.m.d").'","'.$id_noticia.'";)');
	}
		
?>