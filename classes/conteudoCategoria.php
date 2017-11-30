<?php
	include('conexao.php');
	$resul = mysqli_query($conexao, "SELECT * FROM categoria_noticia");
	while ($categoria = mysqli_fetch_array($resul)) 
	{
	?>
		
            <li role="presentation" class="active"><a href="#<?php  echo $categoria['categoria_noticia']?>" class="sem_borda fonte_cinza_claro tabs_menu" aria-controls="<?php  echo $categoria['categoria_noticia']?>" role="tab" data-toggle="tab"><?php  echo $categoria['categoria_noticia']?></a></li>
            
     
	<?php
	}

?>