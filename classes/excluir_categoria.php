<?php

	include("conexao.php");
	$id=$_GET['ex'];
	$excluir= ("DELETE FROM categoria_noticia WHERE id_categoria_noticia=".$id.";");
	mysqli_query($conexao,$excluir);
	header("location:../gerenciamento_noticias.php")
	
		

	
?>