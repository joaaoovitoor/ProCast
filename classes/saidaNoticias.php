<?php
	include("conexao.php");
	$select = "SELECT * FROM noticia";
			$sql_sel = mysqli_query($conexao,$select);
			if($sql_sel)
			{
				while($row = mysqli_fetch_array($sql_sel))
				{
?>	
				
				 <div class="col-sm-6 col-md-4">
                        <a href="conteudo_noticia.php?ex= <?php echo $row['id_noticia']?>">
                            <div class="thumbnail">
                                <img src="<?php echo ('uploads/'.$row['imagem_noticia']) ?>" alt="Imagem ilustrativa da notícia">
                                <div class="caption">
                                    <p class="label text-right bg_cinza_escuro">
                                        <?php  echo $row['categoria'];?>
                                    </p>
                                    <h3 class="text-center fonte_cinza_escuro"><strong> <?php  echo $row['titulo'];?></strong></h3>
                                    <p class="text-center"> <?php  echo $row['lide'];?></p>
                                    <p class="text-center fonte_azul_claro">
                                        <strong>
                                        <i class="fa fa-clock-o "></i> 2 anos &nbsp;<i class="fa fa-comment-o "></i> 3 comentários
                                        </strong>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>				
			<?php
				}
			}
?>