<?php
    session_start();
    if(isset($_SESSION['email'])){
        $email_usuario=$_SESSION['email'];
        include('conexao.php');
        $sqlsel='select * from anunciante where email="'.$email_usuario.'";';
        $resul=mysqli_query($conexao,$sqlsel);
        $con=mysqli_fetch_array($resul);
    }
    else{
        header('location:destruir.php');    
    }
?>
<html lang="pt-br">
	<head>
		<title>Anúncios</title>
        <link rel="stylesheet" href="css/moderar_an.css">
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
		<?php
			include('menu_anunciante.php');
		?>
		<div class="banner">
			<div class="container-fluid">
				<div class="row">
					<h1 class="text-center fonte_branca texto_sombra"><strong>Anuncie no ProCast</strong></h1>	
					<p class="text-center fonte_branca texto_sombra">
						Tem uma empresa no ramo de e-sports? Então anuncie-se aqui!<br>
						Nunca foi tão fácil fazer com que sua empresa alcance seu público alvo
					</p>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<div class="panel sombra bg_branco form_panel">
						<div class="panel-body">
							<form action="#" method="POST" enctype="multipart/form-data">
								<div class="col-md-4">
									<h4>Forma de anúncio</h4>
									<div class="form-check">
									  <label class="form-check-label">
									    <input class="form-check-input" type="radio" name="tipo" value="1" checked> 1 semana por R$9,99
									  </label>
									</div>
									<div class="form-check">
									  <label class="form-check-label">
									    <input class="form-check-input" type="radio" name="tipo" value="2" > 15 dias por R$16,99
									  </label>
									</div>
									<div class="form-check">
									  <label class="form-check-label">
									    <input class="form-check-input" type="radio" name="tipo" value="3" > 1 mês por R$29,99
									  </label>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
									    <label for="exampleInputEmail1">Nome do Anúncio</label>
									    <input type="text" name="nome_anuncio" maxlength="25" class="form-control" placeholder="Nome"  required>
									</div>
									<div class="form-group">
									    <label for="exampleInputEmail1">Link para anúncio</label>
									    <input type="text" name="link" maxlength="100" class="form-control" placeholder="Link" required>
									</div>
								</div>
								<div class="col-md-12 mg_tp">
									<textarea name="descricao" rows="5" maxlength="200" class="form-control" placeholder="Descrição"></textarea>
								</div>
								
								<div class="col-md-3 mg_tp">
									<label for='selecao-arquivo' class="arquivo"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Selecionar um arquivo </label>
									<input id="selecao-arquivo" type="file" name="foto">
								</div>
								<div class="col-md-9 mg_tp">
									<h4>Mídia <span class="fonte_cinza_claro">(Largura: 360px/ Altura: 205px  )</span></h4>
								</div>
								<div class="col-md-12 mg_tp">
									<button type="submit" class="btn btn-block bg_azul_escuro btn-lg fonte_branca" name="enviar" > Anunciar </button>
								</div>
								<input type="hidden" class="validate" name="id_anunciante" value="<?php echo($con['id_anunciante']);?>">
							</form>
							<?php
								include('conexao.php');
							    if (isset($_POST['enviar']))
							    {
							        $tipo=$_POST['tipo'];
									$nome_anuncio=$_POST['nome_anuncio'];
									$link=$_POST['link'];
									$descricao=$_POST['descricao'];
									$id_anunciante=$_POST['id_anunciante'];
									$foto=$_FILES['foto'];
									$tamanho=$_FILES["foto"]["size"];
									$arquivo=1024000;
									
									if (!empty($foto["name"]))
									{
										$dimensoes=getimagesize($foto["tmp_name"]);
										$largura=1200;
										$altura=800;
										if(!preg_match('/^image\/(?:png|jpg|jpeg)$/i', $dimensoes['mime']))
										{
											echo('<script>window.alert("Envie imagem no formato png,jpg ou jpeg");</script>');
											exit();
										}
										if ($tamanho > $arquivo)
										{
											echo('<script>window.alert("Excedeu o tamanho máximo do arquivo");</script>');
											exit;
										}
										if($dimensoes[0] > $largura) 
										{
											echo('<script>window.alert("A largura da imagem não deve ultrapassar '.$largura.' pixels");</script>');
											exit;
										}
										if($dimensoes[1] > $altura)
										{
											echo('<script>window.alert("A altura da imagem não deve ultrapassar '.$altura.' pixels");</script>');
											exit;
										}
										preg_match("/\.(png|jpg|jpeg){1}$/i", $foto["name"], $ext);
										$nome_imagem = uniqid("")."." . $ext[1];
										$caminho_imagem = "uploads/" . $nome_imagem;
										move_uploaded_file($foto["tmp_name"], $caminho_imagem);
										
										$sqlin='INSERT INTO anuncio (tipo,nome_anuncio,link,descricao,id_anunciante,foto) VALUES ("'.$tipo.'" , "'.$nome_anuncio.'" , "'.$link.'" , "'.$descricao.'" , "'.$id_anunciante.'" , "'.$nome_imagem.'")';
										mysqli_query($conexao,$sqlin);
										
										echo('<script>window.alert("Anúncio enviado com sucesso! Aguarde a aprovação dos administradores. ");window.location="cadastro.php";</script>');
									}
									else{
										echo('<script>window.alert("Imagem não selecionada!");</script>');
									}
									
								}
							?>
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