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
                        <input type="hidden" name="favorito" value="F">
                        <input type="hidden" name="rascunho" value="F">
                        <input type="hidden" name="excluido" value="F">
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
                $favorito=$_POST['favorito'];
                $rascunho=$_POST['rascunho'];
                $excluido=$_POST['excluido'];
                if (!empty($destinatario)&&!empty($assunto)&&!empty($mensagem)) 
                {
                    $sqlsel='select * from usuario where (email="'.$destinatario.'") OR (nick="'.$destinatario.'") OR (nome="'.$destinatario.'");';
                    $resul=mysqli_query($conexao,$sqlsel);
                    $con2=mysqli_fetch_array($resul);
                    if(mysqli_num_rows($resul))
                    {
                        if (isset($_FILES['anexo']))
                        {
                            $extensao= strtolower(substr($_FILES['anexo']['name'], -4));//pega a extensão do arquivo
                            $novo_nome= md5(time()) . $extensao; //criptografa a hora atual e concatena com id do usuario e extensao
                            $diretorio="uploads/";
                            move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome); //quando o php recebe um arquivo de upload ele é armazenado temporariamente em uma pasta com seus arquivos de sistema
                            $sqlin='insert into mensagem(assunto,id_enviar,mensagem,id_receber,favorito,rascunho,excluido,anexo, data) values ("'.$assunto.'",'.$con['id_usuario'].',"'.$mensagem.'",'.$con2['id_usuario'].',"'.$favorito.'","'.$rascunho.'","'.$excluido.'","'.$novo_nome.'",NOW());';
                        }
                        else{
                            $sqlin='insert into mensagem(assunto,id_enviar,mensagem,id_receber,favorito,rascunho,excluido) values ("'.$assunto.'",'.$con['id_usuario'].',"'.$mensagem.'",'.$con2['id_usuario'].',"'.$favorito.'","'.$rascunho.'","'.$excluido.'");';
                        }
                        mysqli_query($conexao,$sqlin);
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