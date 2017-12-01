<?php
	include('conexao.php');
	$texto= $_POST['comentario'];
	$id_noticia = $_GET['ex'];
	if($email_usuario == 'admin@admin')
	{
		header('location:destruir.php');
	}
	else
	{
		$sqlsel='SELECT * FROM usuario WHERE email="'.$email_usuario.'";';
		$resul=mysqli_query($conexao,$sqlsel);
		$linha=mysqli_fetch_array($resul);
		$id_usuario=$linha['id_usuario'];
		$nome=$linha['nome'];
		$sqlin='INSERT INTO comentario(texto_comentario,id_usuario,data_comentario,id_noticia) VALUES ("'.$texto.'",'.$id_usuario.',NOW(),'.$id_noticia.');';
		mysqli_query($conexao,$sqlin);
	}
		
?>