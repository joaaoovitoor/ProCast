<html>
	<head>
		<meta charset="utf-8">
	    <title>Anunciante</title>
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
		<script src="js/pesq_cidade.js"></script>
	</head>
	<body>
		<?php
			include('conexao.php');
		?>
		<nav class="nav-menu hidden-xs hidden-sm"  style="background-color:#333 !important;">
		<a href="index.php"><img src="img/logo_horizontal.png" class="pull-left img-responsive logo" ></a>
			<ul class="ul-menu list-inline text-center unstyle-list col-md-offset-9">
				<li class="item item-log">
						<a class=" menu-item " href="index.php">Home <i class="fa fa-home" aria-hidden="true"></i></a>
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
			<a href="index.php">Home <i class="fa fa-home" aria-hidden="true"></i></a>
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
				<div class="col-md-6 hidden-xs hidden-sm " style="margin-top: 2%">
					<img src="img/cadastro.png">
				</div>
				<div class="col-md-6">
					<section>
							<div class="tabs tabs-style-iconbox">
								<nav>
									<ul>
										<li><a href="login" class="icon icon-home"><span>Login</span></a></li>
										<li><a href="cadastro" class="icon icon-gift"><span>Cadastro</span></a></li>
									</ul>
								</nav>
								<div class="content-wrap">
									<!-- LOGIN -->
									<section id="login">
										<form action="verificar_anunciante.php" method="POST">
                                            <div class="col-md-12" style="margin-top: 10%">
                                                <h2 align="center">Login</h2>
                                                <div class="form-group">
                                                    E-mail <input type="text" name="usuario" placeholder="E-mail" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    Senha <input type="password" name="senha" placeholder="Senha" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="log_anunciante" value="Entrar" class="form-control btn btn-outro">
                                                </div>
                                            </div>
										</form>
									</section>
									
									<!-- CADASTRO -->
									<section id="investidor">
										<form action="verificar_anunciante.php" method="POST">
											<div class="col-md-6">
												<div class="form-group">
													Nome <input type="text" class="form-control" name="nome" placeholder="Nome" maxlength="15" required>
												</div>
												<div class="form-group">
													Sobrenome <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" maxlength="15" required>
												</div>
												<div class="form-group">
													Senha <input type="password" name="senha" placeholder="Senha" class="form-control" maxlength="20" required>
												</div>
												<div class="form-group">
													E-mail<input type="email" name="email" placeholder="E-mail" required class="form-control" maxlength="30">
												</div>
												<div class="form-group">
													Telefone <input type="text" class="form-control" name="telefone" placeholder="(dd) 00000-0000" id="telefone" required>
												</div>												
											</div>
											<div class="col-md-6">
                                                <div class="form-group">
													 Nome da Empresa <input type="text" class="form-control" name="nome_empresa" placeholder="Nome da Empresa" maxlength="25" required>
												</div>
												<div class="form-group">
													CPF <input type="text" class="form-control" name="cpf" placeholder="CPF" id="cpf" required>
												</div>
                                                <div class="form-group">
													CNPJ <input type="text" maxlength="18" class="form-control" name="cnpj" placeholder="CNPJ" id="cnpj" required>
												</div>
												<div class="form-group">
													Estado
													<select name="estado" id="estado" class="form-control">
														<option value="">Selecione</option>
														<?php
															$sqlsel='SELECT * FROM estado;';
															$resul=mysqli_query($conexao,$sqlsel);
															while ($con=mysqli_fetch_array($resul))
															{
																echo
																('
																	<option value="'.$con['id'].'">'.$con['nome'].'</option>
																');
															}
														?>
														 
													</select>
												</div>
                                                <div class="form-group">
													Cidade
													<select name="cidade" id="cidade" class="form-control">
													  <option>Escolha primeiro um estado</option>
													</select>
												</div>
											</div>
											<div class="col-md-12">
											<div class="checkbox">
											    <label>
											      <input type="checkbox"required checked><a href="#">Li e concordo com os termos de uso</a>
											    </label>
											</div>
											<input type="hidden" name="categoria_usuario" value="2">
											<input class="form-control btn-outro" type="submit" name="cad_anunciante" value="Enviar">
											</div>
										</form>
									</section>
								</div>
							</div>
						</section>
				</div>
			</div>
		</div>
		<?php
			include('rodape.html');
		?>
		<!--Validação-->
	    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	    <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
	    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
	    <script type="text/javascript" src="js/jquery.zebra-datepicker.js"></script>
		<!--TABS-->
		<script src="js/cbpFWTabs.js"></script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
		</script>
	</body>
</html>