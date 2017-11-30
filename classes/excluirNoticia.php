<?php

	include("conexao.php");
	$id=$_GET['ex'];
	$excluir= ("DELETE FROM noticia WHERE id_noticia=".$id.";");
	mysqli_query($conexao,$excluir);
	header("location:../gerenciamento_noticias.php")
	
		

	
?>