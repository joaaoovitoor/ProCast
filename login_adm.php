<html>
	<head>
		<title>Administrador</title>
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-offset-4 col-md-4">
					<div class="panel body" style="background: #f4f2f4; padding: 3% 3% 3% 3%;">
						<img src="img/adm.png" style="padding-left: 25%">
						<h2 align="center">Login</h2>
						<form action="verificar.php" method="POST">
							<div class="form-group">
								E-mail <input type="text" name="usuario" placeholder="E-mail" class="form-control" required>
							</div>
							<div class="form-group">
								Senha <input type="password" name="senha" placeholder="Senha" class="form-control" required>
							</div>
							<div class="form-group">
								<input type="submit" name="logar" value="Entrar" class="form-control btn btn-default">
							</div>
						</form>
					</div>
        		</div>
        	</div>
		</div>	
	</body>
</html>	