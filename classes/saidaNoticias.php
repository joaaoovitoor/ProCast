<?php
	include("conexao.php");
    $selecionar = "SELECT * FROM categoria_noticia";
    $sel = mysqli_query($conexao,$selecionar);
    $i = 0;
    while($categoriaNoticia = mysqli_fetch_array($sel))
    {
?>			
    	<div role="tabpanel" class="tab-pane fade <?=$i==0?'in active':null?>" id="categoria-<?php echo $categoriaNoticia['id_categoria_noticia'] ?>">
            <div class="container-fluid not">
                <div class="row">
                <?php
                $select = "SELECT * FROM noticia WHERE categoria ='".$categoriaNoticia['categoria_noticia']."';";
                $sql_sel = mysqli_query($conexao,$select);
                    while($row = mysqli_fetch_array($sql_sel))
                {
                ?>
                   <div class="col-sm-6 col-md-4">
                        <a href="conteudo_noticia.php?ex=<?php echo $row['id_noticia']?>">
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
                                            <i class="fa fa-clock-o "></i> <?php  echo $row['data'];?> &nbsp;<i class="fa fa-comment-o "></i> <?php $comentariosTotal = mysqli_query($conexao, "SELECT *   FROM comentario WHERE id_noticia=".$row['id_noticia'].";");
                                            $total = mysqli_num_rows($comentariosTotal);
                                            echo $total;
                                            ?>
                                        </strong>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php 
                    }
                    ?>              
                </div>
            </div>
        </div> 
<?php
        $i++;
    }	
?>