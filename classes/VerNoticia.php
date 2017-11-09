<?php
	class VerNoticia
	{
		public function getNoticia()
		{
			$con = mysqli_connect('localhost','root','','dbprocast');
			$select = "SELECT * FROM noticia";
			$sql_sel = mysqli_query($con,$select);
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
						        <p>categoria:<?php echo $row['categoria']?> </p>
						        <a class="btn btn-danger  btn-lg" name="excluir" href="classes/excluirNoticia.php?ex=<?php echo($row['id_noticia']); ?>"><span class="glyphicon glyphicon-remove"></span></a>
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
	