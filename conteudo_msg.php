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
                        </div>
    				</div>
                    <?php
                        if (isset($_GET['msg'])) 
                        {
                            $id=$_GET['msg'];
                            $sqlsel='select * from mensagem where id_mensagem='.$id.';';
                            $resul=mysqli_query($conexao,$sqlsel);
                            $con2=mysqli_fetch_array($resul);
                            $sqlsel='select * from usuario where id_usuario='.$con2['id_enviar'].';';
                            $resul=mysqli_query($conexao,$sqlsel);
                            $con3=mysqli_fetch_array($resul);
                            echo
                            ('
                                <div class="bg_branco cx_em sombra">
                                    <div class="panel bg_branco_w">
                                        <div class="panel-body">
                                            <div class="col-xs-2 col-sm-1">
                                                <img src="img/perfil_icon.png" alt="" class="img-circle img_env">
                                            </div>
                                            <div class="col-xs-2 col-sm-3">
                                                <h4 class="fonte_azul_claro"><strong>'.$con3['nome'].' '.$con3['sobrenome'].'</strong></h4>
                                                <p class="fonte_cinza_claro">
                                                    '.$con2['data'].'
                                                </p>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 text-right  ">
                                                <a href="escrever_mensagem.php?msg='.$id.'" class="btn sem_bg fonte_azul_escuro sem_borda">
                                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                                </a>
                                                <a href="conteudo_msg.php?fav='.$id.'" class="btn sem_bg fonte_azul_escuro sem_borda">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </a>
                                                <a href="conteudo_msg.php?ex='.$id.'" class="btn sem_bg fonte_azul_escuro sem_borda">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="panel bg_branco_w">
                                        <div class="panel-body">
                                            <div class="col-xs-4 nome_user2"><h3 class="fonte_cinza_escuro">'.strtoupper($con2['assunto']).'</h3></div>
                                            <div class="col-xs-12 ">
                                                '.$con2['mensagem'].'
                                            </div>
                                            <div class="col-xs-12 mg_btn">
                                                <a href="uploads/'.$con2['anexo'].'">
                                                    <div class="panel-default bg_branco col-xs-5 sombra anexo">
                                                        <div class="col-xs-2">
                                                            <img src="img/file.png"> 
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <p class="text-center">'.$con2['anexo'].'</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>        
                            ');
                        }
                        if (isset($_GET['fav'])) 
                        {
                            $fav=$_GET['fav'];
                            $sqlup='update mensagem set favorito_env="V" where id_enviar='.$con['id_usuario'].' AND id_mensagem='.$fav.'';
                            mysqli_query($conexao,$sqlup);
                            $sqlup='update mensagem set favorito_rec="V" where id_receber='.$con['id_usuario'].' AND id_mensagem='.$fav.'';
                            mysqli_query($conexao,$sqlup);
                            echo('<script>window.location="mensagens_exc.php";</script>');
                            echo('<script>window.location="mensagens_fav.php";</script>');
                        }
                        if (isset($_GET['ex'])) 
                        {
                            $ex=$_GET['ex'];
                            $sqlup='update mensagem set excluido_env="V" where id_enviar='.$con['id_usuario'].' AND id_mensagem='.$ex.'';
                            mysqli_query($conexao,$sqlup);
                            $sqlup='update mensagem set excluido_rec="V" where id_receber='.$con['id_usuario'].' AND id_mensagem='.$ex.'';
                            mysqli_query($conexao,$sqlup);
                            echo('<script>window.location="mensagens_exc.php";</script>');
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