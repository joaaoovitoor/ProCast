<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>Criação de Clube</title>
	    <!--ESTILO-->
       	<link rel="stylesheet" href="css/clube/estilo.css">
		<script src="js/jquery.js"></script>
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
                    <h1 class="text-center  texto_sombra"><strong>Criação de clube</strong></h1> 
                    <p class="text-center  texto_sombra">
                        Crie seu clube!<br>Encontre jogadores, mande convites de participações<br>e entre em torneios!
                    </p>
                </div>
            </div>
        </div>
        <form action="#" method="POST">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-offset-1 col-md-8 col-sm-offset-1 col-sm-8 col-xs-offset-1 col-xs-6">
					
					<div class="form-group">
						Nome do clube <input type="text" class="form-control" name="nome" placeholder="Nome" maxlength="15" required>
					</div>
					<div class="form-group">
		                Descrição
		                <textarea class="form-control" rows="3" placeholder="Descreva sobre seu clube" name="descricao"></textarea>
		            </div>
				</div>
				<div class="col-md-3 col-sm-3">
					<br><button type="file" class="btn btn-default btn-lg"><p><i class="fa fa-cloud-upload fa-5x" aria-hidden="true"></i></p>Importar logo</button>

				</div>
			</div>
		</div>
		
		
		<div class="container-fluid">
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
				$nome = $_POST['nome'];
				$descricao = $_POST['descricao'];
				$logo_clube = $_POST['logo_clube'];

				if(empty($nome) or empty($descricao))
				{
					echo ('<script>window.alert("Digite todos os dados");</script>');
				}
				else
				{
					$sqlin=('INSERT INTO clube(logo_clube,nome_clube,dta_cricao,descricao_clube,id_usuario) VALUES("'.$logo_clube.'","'.$nome.'",NOW(),"'.$descricao.'",'.$_SESSION['id_usuario'].';');
					$inserir=mysqli_query($conexao,$sqlin);

					if($inserir)
					{
						echo ('<script>window.alert("Clube criado com sucesso!");window.location.href="clube_investidor.php";</script>');
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
		<!---->
		<script src="js/item.js"></script>
        
       
	</body>
</html>	