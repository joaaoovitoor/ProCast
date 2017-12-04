<?php
    include('verificar_logado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php
            include('link_head.html');
        ?>
        <title>Mensagens</title>
	    <link rel="stylesheet" href="css/email.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
        <?php
            include('menu2.php');
        ?>
        <div class="banner">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center fonte_branca texto_sombra"><strong>Mensagens</strong></h1> 
                    <p class="text-center fonte_branca texto_sombra">
                        <?php include('texto_banner_msg.php'); ?>
                    </p>
                </div>
            </div>
        </div>
		<div class="container-fluid">
			<div class="row">
 				<div class="col-sm-6 col-md-3">
    				<div class="panel sombra">
                        <?php
                            include('menu_msg.php');
                        ?>   					
    				</div>
  				</div>
  				<div class="col-md-9">
                                <?php
                                    //contatos
                                    $sqlsel2='SELECT * FROM contato WHERE rec="'.$con['email'].'" ORDER BY data_contato DESC;';
                                    $res_ctt=mysqli_query($conexao,$sqlsel2);


                                    echo
                                    ('
                                        <div class="bg_branco cx_em sombra">
                                    ');
                                    if(mysqli_num_rows($res_ctt))
                                    {
                                        while ($con_ctt=mysqli_fetch_array($res_ctt))
                                        {
                                            $sqlsel_cat='SELECT * FROM cat_contato WHERE id_cat_contato='.$con_ctt['assunto'].';';
                                            $resul_cat=mysqli_query($conexao,$sqlsel_cat);
                                            $con_cat=mysqli_fetch_array($resul_cat);
                                             echo 
                                            ('
                                                <a href="mensagens_ctt_ler.php?ler='.$con_ctt['id_contato'].'">
                                                    <div class="panel bg_branco_w mg_bt">
                                                        <div class="panel-body">
                                                            <div class="col-xs-2 col-sm-1">
                                                                <img src="img/procast.ico" alt="" class="img-circle img_env">
                                                            </div>
                                                            <div class="col-xs-2 col-md-3">
                                                                <h4 class="fonte_cinza_escuro nome_user"><strong>ProCast</strong></h4>
                                                                <p class="fonte_cinza_claro">'.$con_cat['descricao'].'</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                           '); 
                                        }
                                    }
                                    echo
                                    ('
                                        </div>
                                    ');
                                    
                                ?>    
    							
    					
    				</div>
  				</div>
			</div>
		</div>
		<?php
            
			include('rodape.html');
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
	</body>
</html>