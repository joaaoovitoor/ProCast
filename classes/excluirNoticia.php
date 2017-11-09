<?php

	$con = mysqli_connect('localhost','root','','dbprocast');
	$id=$_GET['ex'];
	$excluir= ("DELETE FROM noticia WHERE id_noticia=".$id.";");
	mysqli_query($con,$excluir);
	header("location:../gerenciamento_noticias.php")
	
		

	
?>