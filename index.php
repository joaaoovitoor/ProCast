<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <title>ProCast</title>
	    <!--SLIDESHOW-->
		<link rel="stylesheet" href="css/index/slideshow.css" />
	    <!--ESTILO-->
	    <link rel="stylesheet" href="css/index/estilo.css">
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
		<?php
			include('menu.php');
		?>
		<!--SLIDESHOW-->
		<section class="masthead">
			<video class="masthead-video" autoplay loop muted poster="assets/images/poster.jpg">
				<source src="img/index/lol.MP4" type="video/mp4"></source>
			</video>
			<div class="masthead-overlay"></div>
			<div class="masthead-arrow"></div>
			<h1>ProCast<span>Seja um profissional</span></h1>
		</section>
		<!--TEXTO-->
		<div class="container-fluid espaco">
            <div class="row">
                <div class=" col-md-4 intro-feature">
                    <div class="intro-icon">
                        <img src="img/index/visi.png">
                    </div>
                    <div class="intro-content">
                        <h5>Tenha visibilidade</h5>
                        <p>Com a plataforma você consegue! Basta se cadastrar e mostrar o seu melhor ganhando torneios e atualizando seu perfil. </p>
                    </div>
                </div>
                <div class="col-md-4 intro-feature">
                    <div class="intro-icon">
                        <img src="img/index/grupo.png">
                    </div>
                    <div class="intro-content">
                        <h5>Participe de uma equipe</h5>
                        <p>Quer participar de grandes clubes como INTZ, Pain Gaming ou Red Canids? Agora ficou fácil ! Cadastre-se e seja encontrado por investidores</p>
                    </div>
                </div>
                <div class="col-md-4 intro-feature">
                    <div class="intro-icon">
                        <img src="img/index/trofeu.png">
                    </div>
                    <div class="intro-content last">
                        <h5>Seja um profissional</h5>
                        <p>Alcance o sucesso! Chega de jogar como amador, com o ProCast você vira profissional. Milhares de jogadores já se cadastraram, tá esperando o quê?</p>
                    </div>
                </div>
            </div>
        </div>
		<!--RANKING-->
		<div class="container-fluid">
			<div class="row">
				<div class="parallax">
			        <section class="pricing-section bg-6">
			            <div class="pricing pricing--pema">
			                <div class="pricing__item outro col-xs-offset-3 col-xs-5 col-sm-3 col-md-3">
			                	<p align="center"><img src="img/perfil_icon.png" class="img-circle img-responsive"></p>
			                    <h3 class="pricing__title">Yoda</h3>
			                    <p class="pricing__sentence">Red Canids</p>
			                    <p align="center"><img src="img/index/1.png" class="img-responsive"></p>
			                </div>
			                <div class="pricing__item outro col-xs-offset-3 col-xs-5 col-sm-3 col-md-3">
			                	<p align="center"><img src="img/perfil_icon.png" class="img-circle img-responsive"></p>
			                    <h3 class="pricing__title">Dioud</h3>
			                    <p class="pricing__sentence">Red Canids</p>
			                    <p align="center"><img src="img/index/2.png" class="img-responsive"></p>
			                </div>
			                <div class="pricing__item outro col-xs-offset-7 col-xs-5 col-sm-3 col-md-3">
			                	<p align="center"><img src="img/perfil_icon.png" class="img-circle img-responsive"></p>
			                    <h3 class="pricing__title">Kami</h3>
			                    <p class="pricing__sentence">Pain Gaming</p>
			                	<p align="center"><img src="img/index/3.png" class="img-responsive"></p>
			                </div>
			            </div>
			        </section>
			    </div>
			</div>
		</div>
		<!--TEXTO COM BOTÃO-->
		<div class="container-fluid espaco">
            <div class="row">
                <div class="col-md-offset-2 col-md-5">
                    <div class="feature-list">
                        <h3>Preparado pra essa jornada? </h3>
                        <p>Agora ficou fácil ser um profissional. Com a ProCast você alcança o mais sonhado sucesso em League of Legends. Tenha a visibilidade postando suas melhores jogadas e conquistando nossas missões !</p><p>
Com a plataforma você tem muito mais chances de ser encontrado e ser convocado para grandes equipes. Não perca tempo!

                        </p>
                        <a href="cadastro.php"><button type="button" class="btn botao">Cadastre-se</button></a>
                    </div>
                </div>
                <div class="col-md-5">
                	<img src="img/index/foto2.png" alt="responsive devices">
                </div>
            </div>
        </div>
        <!--VÍDEO VIRAL-->
	    <div class="embed-responsive embed-responsive-16by9">
		  <iframe class="embed-responsive-item" style="height: 70%; width: 100%;" src="https://www.youtube.com/embed/tmJ0tzAZ4aM" allowfullscreen></iframe>
		</div>
	    <!--COMENTÁRIOS-->
	    <div class="container-fluid">
			<div class='row'>
			    <div class='col-md-offset-0 col-md-12'>
			    	<h2 align="center">Comentários dos Usuários</h2>
			      <div class="carousel slide" data-ride="carousel" id="quote-carousel">
			        
			        <div class="carousel-inner">
			          <!-- Comentário 1 -->
			          <div class="item active">
			            <blockquote>
			              <div class="row">
			                <div class="col-sm-3 text-center">
			                  <img class="img-circle" src="img/fotinha.png" style="width: 100px;height:100px;">
			                </div>
			                <div class="col-sm-9">
			                  <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
			                  <small>Pessoa 1</small>
			                </div>
			              </div>
			            </blockquote>
			          </div>
			          <!-- Comentário 2 -->
			          <div class="item">
			            <blockquote>
			              <div class="row">
			                <div class="col-sm-3 text-center">
			                  <img class="img-circle" src="img/fotinha.png" style="width: 100px;height:100px;">
			                </div>
			                <div class="col-sm-9">
			                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
			                  <small>Pessoa 2</small>
			                </div>
			              </div>
			            </blockquote>
			          </div>
			          <!-- Comentário 3 -->
			          <div class="item">
			            <blockquote>
			              <div class="row">
			                <div class="col-sm-3 text-center">
			                  <img class="img-circle" src="img/fotinha.png" style="width: 100px;height:100px;">
			                </div>
			                <div class="col-sm-9">
			                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p>
			                  <small>Pessoa 3</small>
			                </div>
			              </div>
			            </blockquote>
			          </div>
			        </div>
			        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
			        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
			      	</div>                          
		    	</div>
		  	</div>
		</div>
		<!--RODAPÉ-->
		<?php
			include('rodape.html');
		?>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/index/landio.min.js"></script>
	    <!-- SLIDESHOW -->
		<script src="js/index/covervid.js"></script>
		<script src="js/index/scripts.js"></script>
		<script type="text/javascript">
				coverVid(document.querySelector('.masthead-video'), 640, 360);
		</script>
	</body>
</html>