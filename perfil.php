<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Perfil</title>
	    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <!--RODAPÉ-->
	    <link rel="stylesheet" href="css/rodape.css">
	    <!--MENU PERFIL-->
	    <link rel="stylesheet" type="text/css" href="css/perfil/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/perfil/tabstyles.css" />
  		<script src="js/modernizr.custom.js"></script>
  		
  		<link rel="stylesheet" href="css/perfil/perfil.css">
	</head>
	<body>
		<?php
            include('menu2.php');
        ?>
		<div class="banner imagem">
   			<div class="container-fluid">
				<div class="row">
					<!-- Cartão com informações - GRANDE -->
					<div class="col-md-offset-1 col-md-3 hidden-sm hidden-xs">
				        <div class="cartao-grande">
				            <img src="img/perfil_icon.png" class="img-circle">
				            <div class="row">
				                <div class="col-md-1"></div>
				                <div class="col-md-10">
				                    <div class="informacoes">
				                        Nick<br>DIOUD
				                    </div>
				                </div>
				            </div>
				            <div class="clube">
				                <div class="row">
				                    <div class="col-sm-6">
				                        <span class="coach-name"><p>Clube</p></span>
				                        <span class="coach-job"><p>Red Canids</p></span>
				                    </div>
				                    <div class="col-sm-6">
				                        <img src="img/logo_redcanids.png" width="100">
				                    </div>
				                </div>
				            </div>
				            <div class="descricao">
				                    <p><strong>Sobre mim:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
				                    <p><strong>Função:</strong> Suporte</p>
				                    <p><strong>Posicionamento:</strong> Alguma Coisa</p> 
				            </div>
				        </div>
					</div>
					<!-- Cartão com informações - PEQUENO -->
					<div class="hidden-md hidden-lg">
						<div class="cartao">
						 <img src="img/perfil_icon.png" class="img-circle">
	                            <p>Nick: DIOUD</p>
	                            <p>Clube: Red Canids</p>
				                <p>SOBRE MIM: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod or.</p>
			                    <p>FUNÇÃO: Suporte</p>
			                    <p>POSICIONAMENTO: Alguma Coisa</p>
			            </div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<!-- Menu jogador -->
				<div class="col-md-offset-1 col-md-7">
					<section>
						<div class="tabs tabs-style-linebox">
							<nav>
								<ul>
									<li><a href="#1"><span>Clube</span></a></li>
									<li><a href="#2"><span>Conquistas</span></a></li>
									<li><a href="#3"><span>Agenda</span></a></li>
									<li><a href="#4"><span>Vídeos</span></a></li>
									<li><a href="#5"><span>Mensagens</span></a></li>
								</ul>
							</nav>
							<div class="content-wrap">
								<section id="1">
						            <div class="cartao-equipe">
						                <div class="media">
						                    <div class="media-left">
						                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
						                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</button>
						                    </div>
						                    <div class="media-body">
						                        <h3 class="media-heading">Nick carinha</h3>
						                        <h5>Nome carinha</h5>
						                        <p>Função primária: Atirador</p>
						                        <p>Função primária: Meio</p> 
						                        <p>Posição: Alguma coisa</p>
						                    </div>
						                </div>
						            </div>
						            <div class="cartao-equipe">
						                <div class="media">
						                    <div class="media-left">
						                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
						                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</button>
						                    </div>
						                    <div class="media-body">
						                        <h3 class="media-heading">Nick carinha</h3>
						                        <h5>Nome carinha</h5>
						                        <p>Função primária: Atirador</p>
						                        <p>Função primária: Meio</p> 
						                        <p>Posição: Alguma coisa</p>
						                    </div>
						                </div>
						            </div>
						            <div class="cartao-equipe">
						                <div class="media">
						                    <div class="media-left">
						                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
						                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</button>
						                    </div>
						                    <div class="media-body">
						                        <h3 class="media-heading">Nick carinha</h3>
						                        <h5>Nome carinha</h5>
						                        <p>Função primária: Atirador</p>
						                        <p>Função primária: Meio</p> 
						                        <p>Posição: Alguma coisa</p>
						                    </div>
						                </div>
						            </div>
						            <div class="cartao-equipe">
						                <div class="media">
						                    <div class="media-left">
						                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
						                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</button>
						                    </div>
						                    <div class="media-body">
						                        <h3 class="media-heading">Nick carinha</h3>
						                        <h5>Nome carinha</h5>
						                        <p>Função primária: Atirador</p>
						                        <p>Função primária: Meio</p> 
						                        <p>Posição: Alguma coisa</p>
						                    </div>
						                </div>
						            </div>
						            <div class="cartao-equipe">
						                <div class="media">
						                    <div class="media-left">
						                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
						                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</button>
						                    </div>
						                    <div class="media-body">
						                        <h3 class="media-heading">Nick carinha</h3>
						                        <h5>Nome carinha</h5>
						                        <p>Função primária: Atirador</p>
						                        <p>Função primária: Meio</p> 
						                        <p>Posição: Alguma coisa</p>
						                    </div>
						                </div>
						            </div>
            
        
								</section>
								<!-- Conquistas -->
								<section id="2">
									<div class="container-fluid">
										<h4 align="center">Seu progresso</h4>
										<div class="progress">
										  <div class="progress-bar bg-progress" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										    62%
										  </div>
										</div>
										<br>
										<!--Início do card conquista-->
									    <div class="qa-message-list" id="wallmessages">
						    				<div class="message-item" id="m16">
												<div class="message-inner">
													<div class="avatar pull-left"><img src="img/medalha.png"></div>
													<div class="user-detail">
														<h5 class="handle">Nome da conquista</h5>
														<div class="post-meta">
															<div class="asker-meta">
																<span class="qa-message-what"></span>
																<span class="qa-message-when">
																	<span class="qa-message-when-data">Descrição da conquista desconhecida que eu não sei ainda. </span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--Fim do card conquista-->
										<!--Início do card conquista-->
									    <div class="qa-message-list" id="wallmessages">
						    				<div class="message-item" id="m16">
												<div class="message-inner">
													<div class="avatar pull-left"><img src="img/medalha.png"></div>
													<div class="user-detail">
														<h5 class="handle">Nome da conquista</h5>
														<div class="post-meta">
															<div class="asker-meta">
																<span class="qa-message-what"></span>
																<span class="qa-message-when">
																	<span class="qa-message-when-data">Descrição da conquista desconhecida que eu não sei ainda. </span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--Fim do card conquista-->
									</div>
								</section>
								<!-- Agenda -->
								<section id="3">
									<div class="container">
									    <div class="agenda">
									        <div class="table-responsive">
									            <table class="table table-condensed table-bordered">
									                <thead>
									                    <tr>
									                        <th><img src="img/dia.png"> Dia</th>
									                        <th><img src="img/hora.png">Hora</th>
									                        <th><img src="img/evento.png">Evento</th>
									                    </tr>
									                </thead>
									                <tbody>
									                    <tr>
									                        <td class="agenda-date" class="active" rowspan="1">
									                            <div class="dayofmonth"> 05 de novembro 2017</div>
									                            <div class="dayofweek">Marcado por: <a href="#">Alguém</a></div>
									                        </td>
									                        <td class="agenda-time">
									                            17:30
									                        </td>
									                        <td class="agenda-events">
									                            <div class="agenda-event">
									                                <i class="glyphicon glyphicon-repeat text-muted" title="Repeating event"></i> 
									                                Reunião do Clube
									                            </div>
									                        </td>
									                    </tr>
														
														<tr>
									                        <td class="agenda-date" class="active" rowspan="1">
									                             <div class="dayofmonth">05 de novembro 2017</div>
									                            <div class="dayofweek">Marcado por: <a href="#">ProCast</a></div>
									                        </td>
									                        <td class="agenda-time">
									                            22:30
									                        </td>
									                        <td :class="agenda-events">
									                            <div class="agenda-event">
									                                <i class="glyphicon glyphicon-repeat text-muted" title="Repeating event"></i> 
									                                Torneio
									                            </div>
									                        </td>
									                    </tr>
									                    
									                   
									                </tbody>
									            </table>
									        </div>
									    </div>
									</div>
								</section>
								<!-- Vídeos -->
								

								<section id="4">
									<div class="card mb-3">
										<div class="embed-responsive embed-responsive-16by9">
								  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/-6JqoJrM9IM"></iframe>
								</div>
										<div class="card-body">
											<h4 class="card-title">Nome do Vídeo</h4>
											<p class="card-text">Descrição do Vídeo</p>
											<p class="card-text"><small class="text-muted">Publicado em:20/08/2017</small></p>
										</div>
									</div>
								</section>
								<!-- Mensagens -->
								<section id="5">
									<!--Início da mensagem-->
									<div class="message-item" id="m16">
										<div class="message-inner">
											<div class="message-head clearfix">
												<div class="avatar pull-left"><img src="img/perfil_icon.png" class="img-circle" width="40px"></div>
												<div class="user-detail">
													<h5 class="handle">Nome do carinha</h5>
													<div class="post-meta">
														<div class="asker-meta">
															<span class="qa-message-what"></span>
															<span class="qa-message-when">
																<span class="qa-message-when-data">Dia 20/08/2017</span>
															</span>
														</div>
													</div>
												</div>
											</div>
											<div class="qa-message-content">
												Oi, tudo bom?
											</div>
										</div>
									</div>
									<!--Fim da mensagem-->
									<!--Início da mensagem-->
									<div class="message-item" id="m16">
										<div class="message-inner">
											<div class="message-head clearfix">
												<div class="avatar pull-left"><img src="img/perfil_icon.png" class="img-circle" width="40px"></div>
												<div class="user-detail">
													<h5 class="handle">Nome do carinha</h5>
													<div class="post-meta">
														<div class="asker-meta">
															<span class="qa-message-what"></span>
															<span class="qa-message-when">
																<span class="qa-message-when-data">Dia 20/08/2017</span>
															</span>
														</div>
													</div>
												</div>
											</div>
											<div class="qa-message-content">
												Beleza?
											</div>
										</div>
									</div>
									<!--Fim da mensagem-->
									<!--Início da mensagem-->
									<div class="message-item" id="m16">
										<div class="message-inner">
											<div class="message-head clearfix">
												<div class="avatar pull-left"><img src="img/perfil_icon.png" class="img-circle" width="40px"></div>
												<div class="user-detail">
													<h5 class="handle">Nome do carinha</h5>
													<div class="post-meta">
														<div class="asker-meta">
															<span class="qa-message-what"></span>
															<span class="qa-message-when">
																<span class="qa-message-when-data">Dia 20/08/2017</span>
															</span>
														</div>
													</div>
												</div>
											</div>
											<div class="qa-message-content">
												Eai?
											</div>
										</div>
									</div>
									<!--Fim da mensagem-->
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
		<!--Card equipe-->
		<script>	
		$("figure").mouseleave(
		  function () {
		    $(this).removeClass("hover");
		  }
		);
		</script>
				
		<!-- Menu perfil -->
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