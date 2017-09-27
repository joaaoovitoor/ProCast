<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Mensagens</title>
	    <link rel="stylesheet" href="css/email.css">
		<?php
			include('link_head.html');
		?>
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
                       Envie e receba mensagens rapidamente, inclusive suas convocações para clube!
                    </p>
                </div>
            </div>
        </div>
		<div class="container-fluid">
			<div class="row">
 				<div class="col-sm-6 col-md-3">
    				<div class="panel sombra">
    					<div class="header_menu  bg_cinza_escuro">
    						<img src="img/perfil_icon.png" alt="" class="img-circle img-responsive">
    					</div>  
                        <?php
                            include('menu_msg.php');
                        ?>   					
    				</div>
  				</div>
  				<div class="col-md-9">
  					<form action="" method="POST" class="no-radius">
						<div class="input-group input-group-lg bg_branco sombra mg_bt">
						  	<input type="text"  name="pesquisa_texto" class="form-control bg_branco_w sem_borda" placeholder="Pesquisar pessoa ou email" aria-describedby="pesquisar">
						  	<span class="input-group-btn" id="pesquisar">
						  		<button type="submit" name="pesquisar_btn" class="btn btn-lg bg_branco_w sem_borda"><span class="glyphicon glyphicon-search fonte_azul_escuro" aria-hidden="true"></span></button>
						  	</span>
						</div>
					</form>
					<div class="mg_bt">
                        <div>
                            <button onclick="location.href='escrever_mensagem.php'" class="btn bg_azul_escuro fonte_branca" href="escrever_mensagem.php">Escrever Mensagem <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                            <form action="#" method="POST">
                                <button type="submit" class="btn bg_azul_escuro fonte_branca" name="ext">Limpar Caixa <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                            </form>
                        </div>
                        
                        <?php
                            if (isset($_POST['ext'])) {
                                include('conexao.php');
                                $sqlup='update Mensagem set excluidos="1" where id_receber="'.$id_usuario.'";';
                                mysqli_query($conexao,$sqlup);
                                echo('<script>swal("Itens excluídos com sucesso", "", "success");</script>');
                            }
                        ?>
    				</div>
    				<div class="bg_branco cx_em sombra">
    					<div class="panel bg_branco_w mg_bt">
    						<div class="panel-body">
                                <?php
                                    include('conexao.php');
                                    $sqlsel='select * from Mensagem where id_receber="'.$id_usuario.'";';
                                    $resul=mysqli_query($conexao,$sqlsel);
                                    if(mysqli_num_rows($resul))
                                    {
                                        $con=mysqli_fetch_array($resul);
                                        $sqlsel='select nick from Usuario where id_usuario="'.$con['id_enviar'].'";';
                                        $resul=mysqli_query($conexao,$sqlsel);
                                        $con2=mysqli_fetch_array($resul);
                                        echo 
                                        ('
                                            <div class="col-xs-2 col-sm-1">
                                                <img src="img/perfil_icon.png" alt="" class="img-circle img_env">
                                            </div>
                                            <div class="col-xs-2 col-md-3">
                                                <h4 class="fonte_cinza_escuro nome_user"><strong>'.$con2.'</strong></h4>
                                                <p class="fonte_cinza_claro">'.$con['assunto'].'</p>
                                            </div>
                                            <div class="col-xs-offset-2 col-sm-offset-3 col-xs-5">
                                            <form action="#" method="GET">
                                                <button type="submit" class="btn sem_bg borda_azul fonte_azul_claro mg_btn" name="fav">Favoritar Mensagem <span class="glyphicon glyphicon-star" aria-hidden="true"></span></button>
                                                <a class="btn sem_bg borda_azul fonte_azul_claro mg_btn" href="mensagens.php?ex='.$con['id_msg'].'">Apagar Mensagem <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                            </form>
                                        '); 
                                        if (isset($_GET['fav'])) {
                                            $sqlup='update Mensagem set favorito="1" where id_receber="'.$id_usuario.'";';
                                            mysqli_query($conexao,$sqlup);
                                            echo('<script>swal("Item favoritado com sucesso", "", "success");</script>');
                                        }
                                        if (isset($_GET['ex'])) {
                                            $sqlup='update Mensagem set excluidos="1" where id_msg="'.$con['id_msg'].'";';
                                            mysqli_query($conexao,$sqlup);
                                            echo('<script>swal("Itens excluídos com sucesso", "", "success");</script>');
                                        }
                                    }
                                ?>    
    							</div>
    						</div>
    					</div>
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