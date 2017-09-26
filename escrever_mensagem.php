<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>ProCast</title>
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="css/rodape.css">
	    <link rel="stylesheet" href="css/email.css">
        <script src="js/tinymce/tinymce.min.js"></script>
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
  					<form>
                        <div class="input-group input-group-lg bg_branco sombra mg_bt">
                            <input type="text"  name="pesquisa_texto" class="form-control bg_branco_w sem_borda" placeholder="Pesquisar pessoa ou email" aria-describedby="pesquisar">
                            <span class="input-group-btn" id="pesquisar">
                                <button type="submit" name="pesquisar_btn" class="btn btn-lg bg_branco_w sem_borda"><span class="glyphicon glyphicon-search fonte_azul_escuro" aria-hidden="true"></span></button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="destinatario">Para</label>
                            <input type="text" class="form-control" id="destinatario" name="destinatario" placeholder="Nome do usuário de destino">
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
                            <p class="fonte_cinza_escuro mg_btn"><strong>Anexar arquivo:</strong></p>
                            <input type="file" class="btn sem_bg borda_azul fonte_azul_claro mg_bt" name="anexo">
                            <button type="submit" class="btn bg_azul_escuro fonte_branca">Enviar Mensagem <span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>
                            <a class="btn bg_azul_escuro fonte_branca">Salvar como rascunho <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span></a>
                            <a class="btn bg_azul_escuro fonte_branca">Descartar Mensagem <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </div>
                    </form>
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