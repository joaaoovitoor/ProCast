<?php

	include("conexao.php");
	$id=$_GET['ex'];
	$sqlsel='SELECT * FROM categoria_noticia WHERE id_categoria_noticia='.$id.';';
	$resul=mysqli_query($conexao,$sqlsel);
	$controlar=mysqli_fetch_array($resul);
	$excluir= 'DELETE FROM noticia WHERE categoria="'.$controlar['categoria_noticia'].'";';
	mysqli_query($conexao,$excluir);
	$excluir= ("DELETE FROM categoria_noticia WHERE id_categoria_noticia=".$id.";");
	mysqli_query($conexao,$excluir);
	header("location:../gerenciamento_noticias.php")
	
		

	
?>