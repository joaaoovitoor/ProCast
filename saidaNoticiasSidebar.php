<?php
	include("conexao.php");
	$select = "SELECT * FROM noticia";
			$sql_sel = mysqli_query($conexao,$select);
			if($sql_sel)
			{
				while($row = mysqli_fetch_array($sql_sel))
				{
?>	
				
				 <a href="conteudo_noticia.php?ex= <?php echo $row['id_noticia']?>">
                    <div class="col-md-4">
                        <div class="col-md-6">
                            <img class="thumbmail"> src="<?php echo ('uploads/'.$row['imagem_noticia']) ?>" alt="Imagem ilustrativa da notícia">
                        </div>
                        <div class="col-md-6">
                            <h4 class="fonte_cinza_escuro mg_bt"><strong><?php  echo $row['lide'];?></strong></h4>
                        </div>
                    </div>
                </a>				
			<?php
				}
			}
?>