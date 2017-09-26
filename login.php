<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <title>Login</title>
		<link rel="icon" type="image/x-icon" href="img/procast.ico"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--bootstrap e jquery-->
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!--fontes-->
	    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	    <!--estilo-->
	    <link rel="stylesheet" href="css/login/estilo.css">
	</head>
	<body>
		<div class="login">
			<div class="div-esquerda"></div>
	    	<div class="div-direita">
	    		<div class="container-fluid" style="margin-top: 15% ">
					<div class="row">
						<div class="col-md-offset-3 col-md-6 tela-login">
							<h2 align="center">Login</h2>
							<form action="#" method="POST">
								<div class="form-group">
									E-mail <input type="text" name="usuario" placeholder="E-mail" class="form-control" required>
								</div>
								<div class="form-group">
									Senha <input type="password" name="senha" placeholder="Senha" class="form-control" required>
								</div>
								<div class="form-group">
									<input type="submit" name="envio" value="Entrar" class="form-control btn btn-outro">
								</div>
							</form>
						</div>
					</div>
				</div>
				<strong><p align="center">Não tem login? <a href="cadastro.php">Faça seu cadastro</a></p></strong>
				<div class="copyright">
			        <p>&copy; 2017 ProCast. Todos os direitos Reservados</p>
			    </div>
			</div>
		</div>
	</body>
</html>