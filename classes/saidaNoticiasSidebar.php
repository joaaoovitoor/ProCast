<?php
	include("conexao.php");
	$select = "SELECT * FROM noticia";
	$sql_sel = mysqli_query($conexao,$select);
	if($sql_sel)
	{
		for ($i=1; $i <4 ; $i++) { 
			while($row = mysqli_fetch_array($sql_sel))
			{
?>	
				<div class="col-md-4">
				 <a href="conteudo_noticia.php?ex= <?php echo $row['id_noticia']?>">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <img class="thumbnail img-responsive sem_borda"  src="<?php echo ('uploads/'.$row['imagem_noticia']) ?>" alt="Imagem ilustrativa da notícia">
                        </div>
                        <div class="col-md-6">
                            <h4 class="fonte_cinza_escuro mg_bt"><strong><?php  echo $row['lide'];?></strong></h4>
                        </div>
                    </div>
                </a>
               </div>
                				
			<?php
					}
				}
			}
			?>
			<div class="col-md-4">
					<div class="panel col-md-12 bg_branco">
					    <div class="panel-body">
					        <h5 class="fonte_cinza_escuro">Publicidade</h5>
					        <div class="col-xs-6">
					           <a href="https://www.game7.com.br/" target="blank"><img src="img/publi1.png" alt="" class="img-responsive"></a> 
					        </div>
					        <div class="col-xs-6">
					           <a href="https://www.game7.com.br/" target="blank"><img src="img/publi1.png" alt="" class="img-responsive"></a> 
					        </div>
					    </div>
					</div>
				</div>