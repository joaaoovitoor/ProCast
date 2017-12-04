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

                                    if (isset($_GET['ler'])) {
                                        $ler=$_GET['ler'];
                                        $sql='SELECT * FROM contato WHERE id_contato='.$ler.';';
                                        $res=mysqli_query($conexao,$sql);
                                        $con_ler=mysqli_fetch_array($res);
                                        $sqlsel_cat='SELECT * FROM cat_contato WHERE id_cat_contato='.$con_ler['assunto'].';';
                                        $resul_cat=mysqli_query($conexao,$sqlsel_cat);
                                        $con_cat=mysqli_fetch_array($resul_cat);
                                        echo
                                        ('
                                            <div class="bg_branco cx_em sombra">
                                                <div class="panel bg_branco_w">
                                                    <div class="panel-body">
                                                        <div class="col-xs-2 col-sm-1">
                                                            <img src="img/procast.ico" alt="" class=" img_env">
                                                        </div>
                                                        <div class="col-xs-2 col-sm-3">
                                                            <h4 class="fonte_azul_claro"><strong>ProCast</strong></h4>
                                                            <p class="fonte_cinza_claro">
                                                                '.$con_ler['data_contato'].'
                                                            </p>
                                                        </div>
                                                     </div>
                                                </div>
                                                <div class="panel bg_branco_w">
                                                    <div class="panel-body">
                                                        <div class="col-xs-4 nome_user2"><h3 class="fonte_cinza_escuro">'.strtoupper($con_ler['titulo']).'</h3></div>
                                                        <div class="col-xs-12 ">
                                                            '.$con_ler['descricao'].'
                                                        </div>
                                                        <div class="col-xs-12 mg_btn">
                                                            <a href="uploads/'.$con_ler['imagem_contato'].'">
                                                                <div class="panel-default bg_branco col-xs-5 sombra anexo">
                                                                    <div class="col-xs-2">
                                                                        <img src="img/file.png"> 
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        <p class="text-center">'.$con_ler['imagem_contato'].'</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>        
                                        ');
                                    }
                                    
                                    
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