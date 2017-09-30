<?php
    session_start();
    if(isset($_SESSION['email'])){
        $email_usuario=$_SESSION['email'];
        include('conexao.php');
        $sqlsel='select * from usuario where email="'.$email_usuario.'";';
        $resul=mysqli_query($conexao,$sqlsel);
        $con=mysqli_fetch_array($resul);
    }
    else{
        header('location:destruir.php');    
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php
            include('link_head.html');
        ?>
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>Ut enim ad minim veniam
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
                                $sqlup='update mensagem set excluido="V" where id_receber="'.$con['id_usuario'].'";';
                                mysqli_query($conexao,$sqlup);
                                echo('<script>swal("Itens excluídos com sucesso", "", "success");</script>');
                            }
                        ?>
    				</div>
    				<div class="bg_branco cx_em sombra">
    					<div class="panel bg_branco_w mg_bt">
    						<div class="panel-body">
                                <?php
                                    $sqlsel='select * from mensagem where id_receber="'.$con['id_usuario'].'";';
                                    $resul=mysqli_query($conexao,$sqlsel);
                                    if(mysqli_num_rows($resul))
                                    {
                                        $con_msg=mysqli_fetch_array($resul);
                                        $sqlsel='select nick from usuario where id_usuario="'.$con_msg['id_enviar'].'";';
                                        $resul=mysqli_query($conexao,$sqlsel);
                                        $con_nick=mysqli_fetch_array($resul);
                                        echo 
                                        ('
                                            <div class="col-xs-2 col-sm-1">
                                                <img src="img/perfil_icon.png" alt="" class="img-circle img_env">
                                            </div>
                                            <div class="col-xs-2 col-md-3">
                                                <h4 class="fonte_cinza_escuro nome_user"><strong>'.$con_nick.'</strong></h4>
                                                <p class="fonte_cinza_claro">'.$con_msg['assunto'].'</p>
                                            </div>
                                            <div class="col-xs-offset-2 col-sm-offset-3 col-xs-5">
                                            <form action="#" method="GET">
                                                <button type="submit" class="btn sem_bg borda_azul fonte_azul_claro mg_btn" name="fav">Favoritar Mensagem <span class="glyphicon glyphicon-star" aria-hidden="true"></span></button>
                                                <a class="btn sem_bg borda_azul fonte_azul_claro mg_btn" href="mensagens.php?ex='.$con_msg['id_msg'].'">Apagar Mensagem <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                            </form>
                                        '); 
                                        if (isset($_GET['fav'])) {
                                            $sqlup='update mensagem set favorito="V" where id_receber="'.$con['id_usuario'].'";';
                                            mysqli_query($conexao,$sqlup);
                                            echo('<script>swal("Item favoritado com sucesso", "", "success");</script>');
                                        }
                                        if (isset($_GET['ex'])) {
                                            $sqlup='update mensagem set excluido="V" where id_msg="'.$con['id_msg'].'";';
                                            mysqli_query($conexao,$sqlup);
                                            echo('<script>swal("Itens excluídos com sucesso", "", "success");</script>');
                                        }
                                    }
                                    else{
                                        echo('<h4>Você não possui mensagens no momento</h4>');
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