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
		<div class="banner">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center  texto_sombra"><strong>Criação de clube</strong></h1> 
                    <p class="text-center  texto_sombra">
                        Crie seu clube!<br>Encontre jogadores, mande convites<br>e entre em torneios!
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
							<label for='selecao-arquivo'><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Importar Logo </label>
							<input id='selecao-arquivo' type='file'>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
<<<<<<< HEAD
					<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
			            <div class="MultiCarousel-inner">
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="pad15">
			                        <p class="lead"><img class="img-circle" src="img/fotinha2.png"></p>
			                        <p>Nome do jogador</p>
			                        <p>Função 1</p>
			                        <p>Função 2</p>
			                    </div>
			                </div>
			            </div>
			            <button class="btn leftLst"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
			            <button class="btn rightLst"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
			        </div>
			    </div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
=======
<<<<<<< HEAD
>>>>>>> parent of b4391b8... Revert "Merge branch 'master' of https://github.com/negaorx/ProCast"
				<div class="form-group">
				<input type="submit" name="enviar" value="Criar" class="form-control btn btn-outro">
				</div>
=======
					<div class="form-group">
						<input type="submit" name="enviar" value="Criar" class="form-control btn btn-outro">
					</div>
>>>>>>> 9d5c14f259c3b9f72372244da5f5f9054d711084
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
	</body>
</html>	