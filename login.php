<html>
	<head>
		<meta charset="utf-8">
	    <title>Login</title>
		<link rel="icon" type="image/x-icon" href="img/procast.ico"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!--FONTES-->
	    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	    <!--ESTILO-->
	    <link rel="stylesheet" href="css/login\estilo.css">
		<link rel="stylesheet" type="text/css" href="css/perfil/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/perfil/tabstyles.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<nav class="nav-menu hidden-xs hidden-sm"  style="background-color:#333 !important;">
		<a href="index.php"><img src="img/logo_horizontal.png" class="pull-left img-responsive logo"></a>
			<ul class="ul-menu list-inline text-center unstyle-list col-md-offset-9">
				<li class="item item-log">
						<a class=" menu-item " href="login.php">Login <i hidden="true" class="fa fa-sign-in fa-1x icone">  </i></a>
				</li>
				<li class="item item-log">
						<a class=" menu-item " href="cadastro.php">Cadastrar <i hidden="true" class="fa fa-sign-in fa-1x icone">  </i></a>
				</li>	
			</ul>
		</nav>
		<div class="container-fluid visible-xs visible-sm img-responsive logo_horizontal" style="background-color:#333;padding:10px;margin:0px;">
			<div class="row text-center">
				<img src="img/logo_horizontal.png" >
			</div>
		</div>
		<!-- Menu mobile-->
	<nav hidden="true" id="mobile" class="nav-menu-mobile  text-center hidden-md">
		<div class="row item-mobile login-mob">
			<a href="login.php">Login <i class="fa fa-sign-in"></i></a>
		</div>
		<div class="row item-mobile login-mob">
			<a href="cadastro.php">Cadastrar <i class="fa fa-sign-in"></i></a>
		</div>
	</nav>
	<!-- fim Menu mobile-->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(function(){				
			var menuMobile = $('#mobile');
			$('.logo_horizontal').click(function(){                                                                          
				menuMobile.slideToggle(1500);
				});
		});
		$(function() {
		  $(window).on("scroll", function() {
		    if($(window).scrollTop() > 50) {
		      $(".nav-menu").addClass("rolagem");
		    } else {
		      $(".nav-menu").removeClass("rolagem");
		    }
		  });
		});
	</script>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-7 hidden-xs hidden-sm" style="margin-top: 2%">
					<img src="img/cadastro.png">
				</div>
				<div class="col-md-5" style="margin-top: 10%">
					<h2 align="center">Login</h2>
					<form action="verificar.php" method="POST">
						<div class="form-group">
							E-mail <input type="text" name="usuario" placeholder="E-mail" class="form-control" required>
						</div>
						<div class="form-group">
							Senha <input type="password" name="senha" placeholder="Senha" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="submit" name="logar" value="Entrar" class="form-control btn btn-outro">
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
			include('rodape.html');
		?>
	</body>
</html>