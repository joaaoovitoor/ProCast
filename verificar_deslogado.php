<?php 
	//se a sessão n tiver sido iniciada, o usuario pode acessar a index,login e cadastro
	session_start();
	if(isset($_SESSION['email'])){
		header('location:home.php');
	}
?>