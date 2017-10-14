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
						Queremos te ouvir! Nos informe sobre elogios, sugestões e críticas.<br> Sua opinião é importante para nós!
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
							<form action="#" method="POST">
								<div class="col-md-6">
									<input type="text" name="motivo" class="form-control input-lg" placeholder="Título da mensagem">
								</div>
								<div class="col-md-6">
									<select name="assunto" class="form-control input-lg">
										<option value="0" class="disabled">Selecione um assunto</option>
										<option value="1">Dicas</option>
										<option value="2">Problemas</option>
										<option value="3">Reclamações</option>
										<option value="3">Propostas</option>
									</select>
								</div>
								<div class="col-md-12 mg_tp">
									<textarea name="descricao_contato" rows="10" maxlength="1000" class="form-control" placeholder="Escreva sua mensagem"></textarea>
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
				$descricao_contato=$_POST['descricao_contato'];
				if(isset($_FILES['print']))
				{
					if(empty ($motivo) or ($assunto) or ($descricao))
					{
						echo ('<script>window.alert("Complete todos os campos");</script>');
					}
					else
					{
						$sqlin=('INSERT INTO contato(assunto,motivo,descricao_contato,id_usuario) VALUES("'.$assunto.'","'.$motivo.'","'.$descricao.'",'.$con['id_usuario'].');');
						$inserir=mysql_query($conexao,$sqlin);
					}
				}
				else
				{
					$extensao=strtolower(substr($_FILES['anexo']['name'], -4));
	                $novo_nome=md5(time().$con['id_usuario']).$extensao;
	                $diretorio="uploads/";
	                move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome);
	                if(empty ($motivo) or ($assunto) or ($descricao))
	                {
						echo ('<script>window.alert("Complete todos os campos");</script>');
					}
					else
					{
						$sqlin=('INSERT INTO contato(assunto,motivo,descricao_contato,imagem_contato,id_usuario) VALUES("'.$assunto.'","'.$motivo.'","'.$descricao.'","'.$novo_nome.'",'.$con['id_usuario'].');');
						$inserir=mysql_query($conexao,$sqlin);
					}
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