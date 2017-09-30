<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Contato</title>
        <link rel="stylesheet" href="css/moderar_an.css">
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
							<form action="#" method="POST">
								<div class="col-md-6">
									<input type="text" class="form-control input-lg" name="nome" placeholder="Nome do anunciante">
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control input-lg" name="cnpj" placeholder="CNPJ">
								</div>
								<div class="col-md-6 mg_tp"">
									<h4>Mídia <span class="fonte_cinza_claro">(Largura: 360px/ Altura: 205px  )</span></h4>
									<label for='selecao-arquivo'><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Selecionar um arquivo </label>
									<input id='selecao-arquivo' type='file'>
								</div>
								<div class="col-md-6 mg_tp"">
									<input type="text" class="form-control input-lg" name="link" placeholder="Link para o anúncio">
								</div>
								<div class="col-md-12 mg_tp">
									<textarea name="descricao" rows="5" maxlength="300" class="form-control" placeholder="Descrição do anúcio"></textarea>
								</div>
								<div class="col-md-12 mg_tp">
									<button type="submit" class="btn btn-block bg_azul_escuro btn-lg fonte_branca" name="enviar" > Anunciar </button>
								</div>
							</form>
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