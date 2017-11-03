<?php
<<<<<<< HEAD
	ob_start();
=======
    ob_start();
>>>>>>> 0025d9692b85ae00f950a316881742d06fd811f9
    session_start();
    if(isset($_SESSION['email'])){
        $email_usuario=$_SESSION['email'];
        include('conexao.php');
        //verificando se ele é usuário
        $sqlsel='select * from usuario where email="'.$email_usuario.'";';
        $resul=mysqli_query($conexao,$sqlsel);
        if(mysqli_num_rows($resul)>0)
        {
        	header("location: destruir.php");
        }
        //se ele realmente for anunciante, cairá neste else
        else
        {
	        $sqlsel='select * from anunciante where email="'.$email_usuario.'";';
	        $resul=mysqli_query($conexao,$sqlsel);
	        $con=mysqli_fetch_array($resul);
	    }
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
									<input id="selecao-arquivo" type="file" name="anuncio">
								</div>
								<div class="col-md-9 mg_tp">
									<h4>Mídia <span class="fonte_cinza_claro">(Largura: 360px/ Altura: 250px  )</span></h4>
								</div>
								<div class="col-md-12 mg_tp">
									<button type="submit" class="btn btn-block bg_azul_escuro btn-lg fonte_branca" name="enviar" > Anunciar </button>
								</div>
								<input type="hidden" class="validate" name="id_anunciante" value="<?php echo($con['id_anunciante']);?>">
								<input type="hidden" class="validate" name="status" value="0">
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
									$status=$_POST['status'];
									$anuncio=$_FILES['anuncio'];
									$tamanho=$_FILES['anuncio']['size'];
									$arquivo=30000;
									
									if (!empty($anuncio["name"]))
									{
										$dimensoes=getimagesize($anuncio["tmp_name"]);
										$largura=360;
										$altura=250;
										if(!preg_match('/^image\/(?:png|jpg|jpeg)$/i', $dimensoes['mime']))
										{
											
											echo '<script>swal("Opa, algo deu errado!", "Envie imagem no formato png,jpg ou jpeg", "error");</script>';
											exit();
										}
										if ($tamanho > $arquivo)
										{
											echo '<script>swal("Opa, algo deu errado!", "Excedeu o tamanho máximo do arquivo", "error");</script>';
											exit;
										}
										if($dimensoes[0] < $largura) 
										{
											echo '<script>swal("Opa, algo deu errado!", "A altura deve ser exatamente '.$largura.' pixels", "error");</script>';
											exit;
										}
										if($dimensoes[1] < $altura)
										{
											echo '<script>swal("Opa, algo deu errado!", "A altura deve ser exatamente '.$altura.' pixels", "error");</script>';
											exit;
										}
										preg_match("/\.(png|jpg|jpeg){1}$/i", $anuncio["name"], $ext);
										$nome_imagem = uniqid("")."." . $ext[1];
										$caminho_imagem = "uploads/" . $nome_imagem;
										move_uploaded_file($anuncio["tmp_name"], $caminho_imagem);
										
										$sqlin='INSERT INTO anuncio (tipo,nome_anuncio,link,descricao,id_anunciante,anuncio,status) VALUES ("'.$tipo.'" , "'.$nome_anuncio.'" , "'.$link.'" , "'.$descricao.'" , "'.$id_anunciante.'" , "'.$nome_imagem.'", "'.$status.'")';
										mysqli_query($conexao,$sqlin);
										echo '<script>swal("Parabéns, anúncio enviado com sucesso!", "Aguarde a aprovação dos administradores.", "success");</script>';
									}
									else{
										echo '<script>swal("Opa, algo deu errado!", "Experimente selecionar uma imagem", "error");</script>';
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
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>            
	</body>
</html>