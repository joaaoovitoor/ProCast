<?php
	include('conexao.php');
	$id= $_GET['id'];
	$sqlsel= ('SELECT * FROM cidade WHERE estado='.$id.' ORDER BY nome;');
	$resul = mysqli_query($conexao,$sqlsel);
	while ($con=mysqli_fetch_array($resul))
	{
		$nome=$con['nome'];
		$id=$con['id'];
		 echo			
		 ('				
			<option value="'.$id.'" class="cidades">'.$nome.'</option>
		');
	}
?>