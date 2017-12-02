<?php
	include('verificar_logado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Contato</title>
        <link rel="stylesheet" href="css/contato.css">
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
					<h1 class="text-center fonte_branca texto_sombra"><strong>Contate-nos</strong></h1>	
					<p class="text-center fonte_branca texto_sombra">
						Queremos te ouvir! Nos informe sobre elogios, dúvidas, sugestões e críticas.<br> Sua opinião é importante para nós!
					</p>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row font-25 text-center info">
				<i class="fa fa-phone fonte_azul_claro"></i> (11) 4002-8922
				<i class="fa fa-envelope fonte_azul_claro"></i> Procast@empresa.com
			</div>
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="panel sombra bg_branco form_panel">
						<div class="panel-body">
							<form action="#" method="POST" enctype="multipart/form-data">
								<div class="col-md-6">
									<input type="text" name="motivo" maxlength="30" class="form-control input-lg" placeholder="Título da mensagem" required>
								</div>
								<div class="col-md-6">
									<select name="assunto" class="form-control input-lg">
										<option value="0" class="disabled">Selecione um assunto</option>
										<?php
											$sqlsel='SELECT * FROM cat_contato;';
											$resul=mysqli_query($conexao,$sqlsel);
											while ($controler=mysqli_fetch_array($resul)) {
												echo
												('
													<option value="'.$controler['id_cat_contato'].'">'.$controler['descricao'].'</option>
												');
											}
										?>
									</select>
								</div>
								<div class="col-md-12 mg_tp">
									<textarea name="descricao" rows="10" maxlength="1000" class="form-control" placeholder="Escreva sua mensagem" required></textarea>
								</div>
								<div class="col-md-12">
									<p class="help-block mg_tp">Envie um print se necessário</p>
									<label for='selecao-arquivo'><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Selecionar um arquivo </label>
									<input id='selecao-arquivo' type='file' name="print">
								</div>
								<div class="col-md-12 mg_tp">
									<button type="submit" class="btn btn-block bg_azul_escuro btn-lg fonte_branca" name="enviar" >Enviar </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			include('conexao.php');
			if(isset($_POST['enviar']))
			{
				$motivo=$_POST['motivo'];
				$assunto=$_POST['assunto'];
				$descricao=$_POST['descricao'];
				//se o assunto estiver vazio
				if(!empty($assunto))
				{
					//se não existir imagem
					if(!isset($_FILES['print'])==false)
					{
						
						$sqlin=('INSERT INTO contato(assunto,motivo,descricao,id_usuario) VALUES("'.$assunto.'","'.$motivo.'","'.$descricao.'",'.$con['id_usuario'].');');
						
					}
					//se existir imagem
					else
					{
						$extensao=strtolower(substr($_FILES['print']['name'], -4));
						$novo_nome=md5(time().$con['id_usuario']).$extensao;
						$diretorio="uploads/";
						move_uploaded_file($_FILES['print']['tmp_name'], $diretorio.$novo_nome);
						$sqlin=('INSERT INTO contato(assunto,motivo,descricao,print,id_usuario) VALUES("'.$assunto.'","'.$motivo.'","'.$descricao.'","'.$novo_nome.'",'.$con['id_usuario'].');');
					}
					$inserir=mysqli_query($conexao,$sqlin);
					if($inserir)
					{
						echo ('<script>window.alert("Mensagem enviada com sucesso");</script>');
					}
				}
				//se algo estiver vazio
				else
				{
					echo ('<script>window.alert("Complete todos os campos");</script>');
				}
			}
		?>
		<?php
			include('rodape.html');
		?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>            
	</body>
</html>