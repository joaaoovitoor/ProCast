<?php
	include('verificar_logado.php');
	if($con['categoria_usuario']==1)
    {
    	header('location:home.php');
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>Criação de Clube</title>
	    <!--ESTILO-->
       	<link rel="stylesheet" href="css/clube/estilo.css">
		<script src="js/jquery.js"></script>
        <link rel="stylesheet" href="css/pesquisa.css">
		<script src="js/pesquisa.js"></script>
		<link rel="stylesheet" href="css/moderar_an.css">
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
		<?php
			include('menu2.php');
		?>
		<div class="banner criar_clube">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center  texto_sombra"><strong>Criação de clube</strong></h1> 
                    <p class="text-center  texto_sombra">
                        Crie seu clube!<br>Encontre jogadores, mande convites<br>e entre em torneios!
                    </p>
                </div>
            </div>
        </div>
        <form action="#" method="POST" enctype="multipart/form-data">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-offset-1 col-md-8 col-sm-offset-1 col-sm-8 col-xs-offset-1 col-xs-6">
						
						<div class="form-group">
							Nome do clube <input type="text" class="form-control" name="nome" placeholder="Nome" required>
						</div>
						<div class="form-group">
			                Descrição
			                <textarea class="form-control" rows="6" placeholder="Descreva sobre seu clube" name="descricao" maxlength="250"></textarea>
			            </div>
					</div>
					<div class="col-md-3 col-sm-3">
							<label for='anexo'><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Importar Logo </label>
							<input id='anexo' type='file' name="anexo"/>
					</div>
				</div>
				<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<div class="form-group">
						<input type="submit" name="enviar" value="Criar" class="form-control btn btn-outro">
					</div>
				</div>
			</div>
			</div>
			
		</form>

		<?php  
			include('conexao.php');

			if(isset($_POST['enviar']))
			{
				$sqlsel='SELECT * FROM clube WHERE id_usuario='.$con['id_usuario'].';';
				$resul=mysqli_query($conexao,$sqlsel);
				if (mysqli_num_rows($resul)) {
					echo ('<script>window.alert("Você já possui um clube");window.location.href="clube_investidor.php";</script>');

				}
				else
				{
					$nome = $_POST['nome'];
					$descricao = $_POST['descricao'];
					if(isset($_FILES['anexo'])==false)
					{
						if(empty($nome) or empty($descricao))
						{
							echo ('<script>window.alert("Digite todos os dados");</script>');
						}
						else
						{
							$sqlin=('INSERT INTO clube(nome_clube,dta_criacao,descricao_clube,id_usuario) VALUES("'.$nome.'",NOW(),"'.$descricao.'",'.$con['id_usuario'].');');
							$inserir=mysqli_query($conexao,$sqlin);
						}
					}
					else{
		                $extensao=strtolower(substr($_FILES['anexo']['name'], -4));
		                $novo_nome=md5(time().$con['id_usuario']).$extensao;
		                $diretorio="uploads/";
		                move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome);
						if(empty($nome) or empty($descricao))
						{
							echo ('<script>window.alert("Digite todos os dados");</script>');
						}
						else
						{
							$sqlin=('INSERT INTO clube(logo_clube,nome_clube,dta_criacao,descricao_clube,id_usuario) VALUES("'.$novo_nome.'","'.$nome.'",NOW(),"'.$descricao.'",'.$con['id_usuario'].');');
							$inserir=mysqli_query($conexao,$sqlin);
						}
					}
					if($inserir)
					{
						$sqlclub='SELECT id_clube FROM clube WHERE id_usuario='.$con['id_usuario'].';';
						$resul=mysqli_query($conexao,$sqlclub);
						$conclube=mysqli_fetch_array($resul);
						$sqlup='UPDATE usuario SET clube='.$conclube['id_clube'].' WHERE id_usuario='.$con['id_usuario'].';';
						mysqli_query($conexao,$sqlup);
						echo ('<script>window.alert("Clube criado com sucesso!");window.location.href="pesquisa.php";</script>');
					}
					else
					{
						echo ('<script>window.alert("Erro ao criar Clube!");window.location.href="criar_clube.php";</script>');
					}

				}
			
			}
		?>
		
		<!--RODAPÉ-->
		<?php
		 include('rodape.html');
		?>
	</body>
</html>	