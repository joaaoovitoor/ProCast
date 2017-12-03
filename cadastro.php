<?php 
	include('verificar_deslogado.php');
?>
<html>
	<head>
		<meta charset="utf-8">
	    <title>Cadastro</title>
		<link rel="icon" type="image/x-icon" href="img/procast.ico"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
		<script src="js/pesq_cidade.js"></script>
		<script src="js/pesq_cidade_inv.js"></script>
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
		<a href="index.php"><img src="img/logo_horizontal.png" class="pull-left img-responsive logo" ></a>
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
	<?php
				include('conexao.php');
		?>
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
													Sobrenome <input type="text" class="form-control" name="sobrenome"  maxlength="30" placeholder="Sobrenome" required>
												</div>
												<div class="form-group">
													Nick <input type="text" class="form-control" name="nick" maxlength="16" placeholder="Nick" required>
												</div>
												<div class="form-group">
													Função primária
													<select name="funcao_1" id="funcao_1" class="form-control">
														<?php
															$sqlsel='SELECT * FROM funcao;';
															$resul=mysqli_query($conexao,$sqlsel);
															while ($con=mysqli_fetch_array($resul))
															{
																echo
																('
																	<option value="'.$con['id_funcao'].'">'.$con['nome_funcao'].'</option>
																');
															}
														?>
													</select>
												</div>
												<div class="form-group">
													Função secundária
													<select name="funcao_2" id="funcao_2" class="form-control">
														<?php
															$sqlsel='SELECT * FROM funcao;';
															$resul=mysqli_query($conexao,$sqlsel);
															while ($con=mysqli_fetch_array($resul))
															{
																echo
																('
																	<option value="'.$con['id_funcao'].'">'.$con['nome_funcao'].'</option>
																');
															}
														?>
													</select>
												</div>
												<div class="form-group">
													Senha <input type="password" name="senha" placeholder="Senha" maxlength="25" class="form-control" required>
												</div>
												<div class="form-group">
													Sexo
													<select name="sexo" class="form-control">
													  <option value="f">Feminino</option>
													  <option value="m">Masculino</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													E-mail<input type="email" name="email" placeholder="E-mail" required class="form-control" maxlength="30">
												</div>
												<div class="form-group">
													País
													<select name="pais" id="pais" class="form-control">
													 <?php
															$sqlsel='SELECT * FROM pais;';
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
											      <input type="checkbox" required checked><a data-toggle="modal" data-target="#termos">Li e concordo com os termos de uso</a>
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
													  <option value="f">Feminino</option>
													  <option value="m">Masculino</option>
													</select>
												</div>
												<div class="form-group">
													Telefone <input type="text" class="form-control" name="telefone" placeholder="(dd) 00000-0000" id="telefone2"required>
												</div>											
											</div>
											<div class="col-md-6">
												<div class="form-group">
													País
													<select name="pais" id="pais" class="form-control">
													 <?php
															$sqlsel='SELECT * FROM pais;';
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
													Estado
													<select name="estado" id="estado_inv" class="form-control">
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
													<select name="cidade" id="cidade_inv" class="form-control">
													  <option>Escolha primeiro um estado</option>
													</select>
												</div>
												<div class="form-group">
													CNPJ <input type="text" maxlength="18" class="form-control" name="cnpj" placeholder="CNPJ (Opcional)" id="cnpj">
												</div>
												<div class="form-group">
													 CPF <input type="text" class="form-control" name="cpf" placeholder="CPF" id="cpf2" required>
												</div>
												<div class="form-group">
													Data de nascimento<input type="text" class="form-control" name="dta_nascimento" placeholder="dd/mm/aaaa" id="data2" required>
												</div>
											</div>
											<div class="col-md-12">
											<div class="checkbox">
											    <label>
											      <input type="checkbox"required checked><a data-toggle="modal" data-target="#termos">Li e concordo com os termos de uso</a>
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
		</div>
        <!-- Modal - Termos de uso -->
        <div class="modal fade" id="termos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              
              <div class="modal-body">
                <h2 aling=center> Ao se cadastrar no ProCast, você está concordando com esses Termos de Uso. </h2>
                <h3><strong>1. Termos Gerais</strong></h3> 

                <p> Dentre os principais objetivos deste termo de uso está o assegurar o respeito mútuo entre os Usuários, garantindo o bom uso da rede. Conteúdo que não tenha como objetivo o compartilhamento de experiência como jogador poderá ser removido sem aviso prévio. <p>

                <h3><strong>2. Modificação dos Termos de Uso</strong></h3>

                <p> Nossos termos de uso podem mudar com o tempo, para se adaptar a mudanças no serviço ou na lei. </p>

                <h3><strong>3. Do cadastro </strong></h3>

                <p>O Usuário deverá informar dados verdadeiros, exatos, atuais e completos sobre si mesmo quando se cadastrar no ProCast. </p>

                <p> Recomendamos que sua senha não seja compartilhada com qualquer outra pessoa pois é a forma de garantir a identidade do usuário ao utilizar o sistema, se outrem portar-se inadequadamente, os efeitos serão considerados para o dono da conta. </p>

                <h3><strong>4. Do Uso</strong></h3>

                <p>O Usuário declara que é o único responsável pelos comentários, informações ou conteúdos que vier a postar ou prestar em relação aos posts, jogos ou qualquer outro assunto em pauta na plataforma. </p>

                <p> O ProCast é contra qualquer informação não verídica em publicações e comentários, assim a plataforma poderá excluir o usuário sem qualquer aviso prévio. </p>

                <p>O Usuário também declara que os presentes Termos e Condições Gerais devem ser cumpridos em sua integralidade, sob pena de o Usuário ser excluído, na hipótese do descumprimento de qualquer das regras previstas nestes Termos e Condições Gerais. </p>

                <h3><strong>5. Código de Conduta </strong></h3>

                O Usuário se compromete a obedecer as seguintes regras: 

                <p>Realizar comentários, disponibilizar conteúdos, entres outros, relevantes, que tenham relação com o tema em tela.</p>
                <p>Não utilizar textos, fotos, vídeos, ou seja, de qualquer tipo de informação, cujo caráter seja abusivo, envolvendo conteúdo difamatório, discriminatório, vexatório, ofensivo, pornográfico adulto e infantil (especialmente materiais ligados à necrofilia, pedofilia, práticas sexuais voltadas a violência, estupro, mutilação e morte), conteúdo que envolva insultos, provocações ou ameaças de forma geral.</p>
                <p>Não comercializar mercadorias ilícitas ou ilegais.</p>
                <p>Não cometer fraude, em especial falsidade ideológica, assumindo identidade de outra pessoa. Crime previsto no Código Penal Brasileiro Art. 299.</p>
                <p>Não publicar qualquer tipo de material que provoque ou incentive a violência, criminalidade, bem como a pirataria de produtos.</p>
                <p>Não fazer apologia ao uso de drogas.</p>
                <p>Não publicar comentários ou insinuações preconceituosas ou racistas.</p>
                <p>Não realizar propaganda política.</p>
                <p>Não publicar materiais, ideias, textos, ilustrações, ou qualquer documento que esteja sob a proteção da Lei de Propriedade Intelectual.</p>
                <p>Não infringir direitos contratuais e de privacidade.</p>
                <p>Não publicar qualquer comentário ou conteúdo que em sua essência gere danos à ProCast e a terceiros.</p>
                <p>Não violar quaisquer termos ou condições dos presentes Termos e Condições Gerais.</p>
                <p>Não praticar atos excessivos, os quais atinjam os bons costumes, utilizando críticas demasiadamente ofensivas e humilhantes, desrespeitando a opinião dos demais usuários, incluindo a difusão de ideias destrutivas e preconceituosas. </p>
                <p>Não fazer SPAM, divulgar links, propagandas e anúncios fora do contexto. </p>
                <p>Não fazer denúncias infundadas ou sem informações suficientes para comprovar o fato questionado. </p>
                <p>Informar o ProCast, via canais formais, quanto a qualquer violação ou abuso que forem praticados em desacordo com estes Termos e Condições Gerais, bem como quando sofrer violação em seus direitos. </p>

                <h3><strong>6. Garantias de Uso </strong></h3>

                <p>Nós disponibilizamos o serviço de uma maneira profissional, com padrões comerciais de uso, e esperamos que os usuários tenham uma boa experiência. No entanto, há certas coisas que não podemos garantir. </p>

                <p>Não nos responsabilizamos pelo conteúdo disponibilizado no serviço, sobre o funcionamento de funcionalidades específicas do serviço ou sobre a disponibilidade do serviço. Até o limite permitido pela lei, nos excluímos de qualquer garantia sobre o serviço. </p>

                <h3><strong>7. Registro e Uso</strong></h3> 

                <p>“Bots” e outras maneiras de cadastros automáticos não são permitidos no serviço. 
                Você não pode usar o serviço de nenhuma maneira ilegal. </p>
                <p>Você é responsável pelo conteúdo que postar no serviço e pela atividade de sua conta no serviço. </p>

                <p>Os seguintes conteúdos são proibidos, sob pena de banimento em caso contrário: 
                nudez total, jogos, vídeos ou imagens pornográficas, animes ou desenhos pornográficos (hentai/ecchi/yaoi), nudez estrategicamente disfarçada, transparência total ou parcial, poses lascivas ou provocantes e closes de seios, glúteos ou genitais</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
		<?php
			include('rodape.html');
		?>
        <script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script>
            $('#myModal').on('shown.bs.modal', function () {
              $('#myInput').focus()
            })
        </script>
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