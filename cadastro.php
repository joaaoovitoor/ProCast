<html>
	<head>
		<meta charset="utf-8">
	    <title>Cadastro</title>
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
	</head>
	<body>
		<div class="login">
			<div class="div-esquerda"></div>
	    	<div class="div-direita">
	    		<div class="container-fluid" >
					<div class="row">
						<section>
							<div class="tabs tabs-style-iconbox">
								<nav>
									<ul>
										<li><a href="jogador" class="icon icon-home"><span>Jogador</span></a></li>
										<li><a href="investidor" class="icon icon-gift"><span>Investidor</span></a></li>
									</ul>
								</nav>
								<div class="content-wrap">
									<!-- FORMULÁRIO JOGADOR -->
									<section id="jogador">
										<form action="verificar.php" method="post">
											<div class="col-md-6">
												<div class="form-group">
													Nome <input type="text" class="form-control" name="nome" placeholder="Nome" maxlength="15" required>
												</div>
												<div class="form-group">
													Sobrenome <input type="text" class="form-control" name="sobrenome"  maxlength="15" placeholder="Sobrenome" required>
												</div>
												<div class="form-group">
													Nick <input type="text" class="form-control" name="nick" maxlength="15" placeholder="Nick" required>
												</div>
												<div class="form-group">
												Função primária
												<select name="funcao_1" class="form-control">
												  <option value="a">Atirador</option>
												  <option value="c">Caçador</option>
												  <option value="m">Meio</option>
												  <option value="s">Suporte</option>
												  <option value="t">Topo</option>
												</select>
												</div>
												<div class="form-group">
												Função secundária
												<select name="funcao_2" class="form-control">
												  <option value="a">Atirador</option>
												  <option value="c">Caçador</option>
												  <option value="m">Meio</option>
												  <option value="s">Suporte</option>
												  <option value="t">Topo</option>
												</select>
												</div>
												<div class="form-group">
													Senha <input type="password" name="senha" placeholder="Senha" maxlength="25" class="form-control" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													Sexo
													<select name="sexo" class="form-control">
													  <option value="f">Feminino</option>
													  <option value="m">Masculino</option>
													</select>
												</div>
												<div class="form-group">
													E-mail<input type="email" name="email" placeholder="E-mail" required class="form-control" maxlength="30">
												</div>
												<div class="form-group">
													Estado
													<select name="estado" class="form-control">
														<option value="ac">Acre</option> 
														<option value="al">Alagoas</option> 
														<option value="am">Amazonas</option> 
														<option value="ap">Amapá</option> 
														<option value="ba">Bahia</option> 
														<option value="ce">Ceará</option> 
														<option value="df">Distrito Federal</option> 
														<option value="es">Espírito Santo</option> 
														<option value="go">Goiás</option> 
														<option value="ma">Maranhão</option> 
														<option value="mt">Mato Grosso</option> 
														<option value="ms">Mato Grosso do Sul</option> 
														<option value="mg">Minas Gerais</option> 
														<option value="pa">Pará</option> 
														<option value="pb">Paraíba</option> 
														<option value="pr">Paraná</option> 
														<option value="pe">Pernambuco</option> 
														<option value="pi">Piauí</option> 
														<option value="rj">Rio de Janeiro</option> 
														<option value="rn">Rio Grande do Norte</option> 
														<option value="ro">Rondônia</option> 
														<option value="rs">Rio Grande do Sul</option> 
														<option value="rr">Roraima</option> 
														<option value="sc">Santa Catarina</option> 
														<option value="se">Sergipe</option> 
														<option value="sp">São Paulo</option> 
														<option value="to">Tocantins</option> 
													</select>
												</div>
												<div class="form-group">
													CPF <input type="text" class="form-control" name="cpf" placeholder="CPF" id="cpf" required>
												</div>
												<div class="form-group">
													Data de nascimento<input type="text" class="form-control" name="dta_nascimento" placeholder="dd/mm/aaaa" id="data" required>
												</div>
												<div class="form-group">
													Telefone <input type="text" class="form-control" name="telefone" placeholder="(dd) 00000-0000" id="telefone" required>
												</div>
											</div>
											<div class="col-md-12">
											<div class="checkbox">
											    <label>
											      <input type="checkbox" required checked><a href="#">Li e concordo com os termos de uso</a>
											    </label>
											</div>
											<input type="hidden" name="categoria_usuario" value="1">
											<input class="form-control btn-outro" type="submit" name="enviar_jogador" value="Enviar">
											</div>
										</form>
									</section>
									
									<!-- FORMULÁRIO INVESTIDOR -->
									<section id="investidor">
										<form action="verificar.php" method="post">
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
													Sexo
													<select name="sexo" class="form-control">
													  <option value="">Feminino</option>
													  <option value="">Masculino</option>
													</select>
												</div>													
											</div>
											<div class="col-md-6">
												<div class="form-group">
													Estado
													<select name="estado" class="form-control">
														<option value="ac">Acre</option> 
														<option value="al">Alagoas</option> 
														<option value="am">Amazonas</option> 
														<option value="ap">Amapá</option> 
														<option value="ba">Bahia</option> 
														<option value="ce">Ceará</option> 
														<option value="df">Distrito Federal</option> 
														<option value="es">Espírito Santo</option> 
														<option value="go">Goiás</option> 
														<option value="ma">Maranhão</option> 
														<option value="mt">Mato Grosso</option> 
														<option value="ms">Mato Grosso do Sul</option> 
														<option value="mg">Minas Gerais</option> 
														<option value="pa">Pará</option> 
														<option value="pb">Paraíba</option> 
														<option value="pr">Paraná</option> 
														<option value="pe">Pernambuco</option> 
														<option value="pi">Piauí</option> 
														<option value="rj">Rio de Janeiro</option> 
														<option value="rn">Rio Grande do Norte</option> 
														<option value="ro">Rondônia</option> 
														<option value="rs">Rio Grande do Sul</option> 
														<option value="rr">Roraima</option> 
														<option value="sc">Santa Catarina</option> 
														<option value="se">Sergipe</option> 
														<option value="sp">São Paulo</option> 
														<option value="to">Tocantins</option> 
													</select>
												</div>
												<div class="form-group">
													CNPJ <input type="text" maxlength="18" class="form-control" name="cnpj" placeholder="CNPJ (Opcional)" id="cnpj">
												</div>
												<div class="form-group">
													 CPF <input type="text" class="form-control" name="cpf" placeholder="CPF" id="cpf2" required>
												</div>
												<div class="form-group">
													Data de nascimento<input type="text" maxlength="10" class="form-control" name="dta_nascimento" placeholder="dd/mm/aaaa" id="data2" required>
												</div>
												<div class="form-group">
													Telefone <input type="text" class="form-control" name="telefone" placeholder="(dd) 00000-0000" id="telefone2"required>
												</div>
											</div>
											<div class="col-md-12">
											<div class="checkbox">
											    <label>
											      <input type="checkbox"required checked><a href="#">Li e concordo com os termos de uso</a>
											    </label>
											</div>
											<input type="hidden" name="categoria_usuario" value="2">
											<input class="form-control btn-outro" type="submit" name="enviar_investidor" value="Enviar">
											</div>
										</form>
									</section>
									
								</div>
							</div>
						</section>
					</div>
				</div>
				<br><a href="login.php"><strong><p align="center">Já sou cadastrado</p></strong></a>
				<div class="copyright">
			        <p>&copy; 2017 ProCast. Todos os direitos Reservados</p>
			    </div>
			</div>
		</div>
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