<?php
	include('verificar.php');
	include('conexao.php');
	$sqlexdados='DELETE FROM algumacoisa WHERE id_usuario="'.$_SESSION['id_usuario'].'";';
	mysqli_query($conexao,$sqlex);
	$sqlexusuario='DELETE FROM usuario WHERE id_usuario="'.$_SESSION['id_usuario'].'";';
	session_destroy();
	mysqli_query($conexao,$sqlex5);
	header('location:index.php')
?>