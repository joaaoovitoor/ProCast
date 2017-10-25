<?php
	$conexao=mysqli_connect ('localhost' , 'root' , 'aluno@etec' , 'DBProcast') or die  ('Erro de conexão'.mysqli_error());
	mysqli_set_charset($conexao,"utf8");
?>
