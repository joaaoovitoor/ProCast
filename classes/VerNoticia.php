<?php
	class VerNoticia
	{
		public function getNoticia()
		{
			include("conexao.php");
			$select = "SELECT * FROM noticia";
			$sql_sel = mysqli_query($conexao,$select);
			if($sql_sel)
			{
				while($row = mysqli_fetch_array($sql_sel))
				{
?>	
				
						<div class="row">
						  <div class="col-sm-12 col-md-12">
						    <div class="thumbnail">
						      <img src="<?php echo ('uploads/'.$row['imagem_noticia']) ?>">
						      <div class="caption">
						        <h3><?php echo $row['titulo'];?></h3>
						        <p><?php echo $row['texto']?> </p>
						        <p>Categoria:<?php echo $row['categoria']?> </p>
						        <a class="btn btn-danger  btn-lg" name="excluir" href="classes/excluirNoticia.php?ex=<?php echo($row['id_noticia']); ?>"><span class="glyphicon glyphicon-remove"></span></a>
						        <a class="btn btn-warning  btn-lg" name="alterar" href="alterar_noticias.php?alt=<?php echo($row['id_noticia']); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
						      </div>
						    </div>
						  </div>
						</div>						
					<?php
				}
			}
		}
	}
	
	$p1 = new VerNoticia;
	$p1->getNoticia();
?>
	