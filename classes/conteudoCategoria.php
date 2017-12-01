<?php
	include('conexao.php');
	$resul = mysqli_query($conexao, "SELECT * FROM categoria_noticia");
	$i=0;
	while ($categoria = mysqli_fetch_array($resul)) 
	{
	?>
		<li <?=$i==0?'class="active"':null?>><a data-toggle="tab" href="#categoria-<?php  echo $categoria['id_categoria_noticia']?>"><?php  echo $categoria['categoria_noticia']?></a></li>
	<?php
		$i++;
	}

?>
