<?php
    $noticia = $_GET['ex'];
	include("conexao.php");
	$select = "SELECT * FROM noticia WHERE id_noticia = '".$noticia."'";
    $sql_sel = mysqli_query($conexao,$select);
    while($row = mysqli_fetch_array($sql_sel))
    {
?>
    <div class="col-md-8">
        <div class="col-md-12">
        <div class="thumbnail sem_borda">
           <img src="<?php echo ('uploads/'.$row['imagem_noticia']) ?>" alt="Imagem ilustrativa da notícia">
            <div class="caption">
                <h2 class="text-center fonte_azul_claro mg_bt"><strong><?php  echo $row['titulo'];?></h2>

                <h4 class="text-center fonte_cinza_claro2 mg_bt"><?php  echo $row['lide'];?></h4>
                <div class="fonte_cinza_escuro text-justify ctd">
                    &nbsp;<?php  echo ($row['texto']);?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php    
    }
	
?>