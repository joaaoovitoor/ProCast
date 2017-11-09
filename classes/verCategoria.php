<?php

	class MostrarCategoria
	{
		public function getCategoria()
		{
			$con = mysqli_connect('localhost','root','','dbprocast');
			$select = "SELECT * FROM categoria_noticia";
			$sql_sel = mysqli_query($con,$select);
			if($sql_sel)
			{
?>
				<table class="table table-striped">
					<tr>
						<td>
							Nome
						</td>
						<td>
							Descri
						</td>
						<td>
							Excluir
						</td>
					</tr>
					
					
<?php				
				while($row = mysqli_fetch_array($sql_sel))
				{
?>	
				<tr>
						<td>
							<?php echo $row['categoria_noticia']?>
						</td>
						<td>
							<?php echo $row['descri']?>
						</td>
						<td>
							<a class="btn btn-danger  btn-lg" name="excluir" href="classes/excluir_categoria.php?ex=<?php echo($row['id_categoria_noticia']); ?>"><span class="glyphicon glyphicon-remove"></span></a>
						</td>
					</tr>
<?php
				}
?>
				
			</table>
<?php				
			}
		}
	}
		
	$m1 = new MostrarCategoria;
	$m1->getCategoria();
?>