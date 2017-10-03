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
        <script src="js/tinymce/tinymce.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
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
  					<form action="#" method="POST" enctype="multipart/form-data">
                        <div class="input-group input-group-lg bg_branco sombra mg_bt">
                            <input type="text"  name="pesquisa_texto" class="form-control bg_branco_w sem_borda" placeholder="Pesquisar pessoa ou email" aria-describedby="pesquisar">
                            <span class="input-group-btn" id="pesquisar">
                                <button type="submit" name="pesquisar_btn" class="btn btn-lg bg_branco_w sem_borda"><span class="glyphicon glyphicon-search fonte_azul_escuro" aria-hidden="true"></span></button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="destinatario">Para</label>
                            <input type="text" class="form-control" id="destinatario" name="destinatario" placeholder="Nome ou email do usuário de destino">
                        </div>
                        <div class="form-group">
                            <label for="assunto">Assunto</label>
                            <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto da mensagem">
                        </div>
                        <div class="form-group">
                            <label for="mensagem">Mensagem</label>
                            <textarea name="mensagem" class="form-control" id="mensagem" rows="10" cols="80"></textarea>
                        </div>
                        <div class="mg_bt">
                            <label for='anexo' class="arq"> Anexar arquivo <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span></label>
                            <input type="file" class="btn sem_bg borda_azul fonte_azul_claro mg_bt" name="anexo" id="anexo">
                            <a class="btn bg_azul_escuro fonte_branca">Salvar como rascunho <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span></a>
                            <a class="btn bg_azul_escuro fonte_branca">Descartar Mensagem <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            <button type="submit" class="btn bg_azul_escuro fonte_branca" name="enviar">Enviar Mensagem <span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>
                        </div>
                    </form>
  				</div>
			</div>
		</div>

		<?php
            if (isset($_POST['enviar'])) 
            {
                $destinatario=$_POST['destinatario'];
                $assunto=$_POST['assunto'];
                $mensagem=$_POST['mensagem'];
                if (!empty($destinatario)&&!empty($assunto)&&!empty($mensagem)) 
                {
                    $sqlsel='select * from usuario where (email="'.$destinatario.'") OR (nick="'.$destinatario.'");';
                    $resul=mysqli_query($conexao,$sqlsel);
                    $con2=mysqli_fetch_array($resul);
                    if(mysqli_num_rows($resul))
                    {
                        if (isset($_FILES['anexo']))
                        {
                            $extensao=strtolower(substr($_FILES['anexo']['name'], -4));
                            $novo_nome=md5(time().$con['id_usuario']).$extensao;
                            $diretorio="uploads/";
                            move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome);
                            //quando o php recebe um arquivo de upload ele é armazenado temporariamente em uma pasta com seus arquivos de sistema
                            $sqlin='INSERT INTO mensagem(assunto,anexo,mensagem,favorito_env,excluido_env,rascunho,favorito_rec,excluido_rec,solicitacao_env,solicitacao_rec,id_enviar,id_receber,data,view)VALUES ("'.$assunto.'","'.$novo_nome.'","'.$mensagem.'","F","F","F","F","F","F","F",'.$con['id_usuario'].','.$con2['id_usuario'].',NOW(),"F");';
                        }
                        else{
                            $sqlin='INSERT INTO mensagem(assunto,mensagem,favorito_env,excluido_env,rascunho,favorito_rec,excluido_rec,solicitacao_env,solicitacao_rec,id_enviar,id_receber,data,view)VALUES ("'.$assunto.'","'.$mensagem.'","F","F","F","F","F","F","F",'.$con['id_usuario'].','.$con2['id_usuario'].',NOW(),"F");';
                        }
                        mysqli_query($conexao,$sqlin);
                        echo('<script>swal("Mensagem Enviada", "", "success");</script>');
                        echo('<script>window.location="mensagens_env.php";</script>');
                    }
                    else
                    {
                        echo('<script>swal("Destinatário não cadastrado", "", "error");</script>');
                    }
                }
                else
                {
                    echo('<script>swal("Preencha todos os campos", "", "error");</script>');
                }
            }
			include('rodape.html');
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
	</body>
</html>