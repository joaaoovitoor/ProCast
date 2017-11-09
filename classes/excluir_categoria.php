<?php

	$con = mysqli_connect('localhost','root','','dbprocast');
	$id=$_GET['ex'];
	$excluir= ("DELETE FROM categoria_noticia WHERE id_categoria_noticia=".$id.";");
	mysqli_query($con,$excluir);
	header("location:../gerenciamento_noticias.php")
	
		

	
?>