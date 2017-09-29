<!DOCTYPE html>
<html lang="pt-br">
	<head>
	    <meta charset="utf-8">
	    <title>ProCast</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--BOOTSTRAP E JQUERY-->
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!--FONTES-->
	    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <!--SLIDESHOW-->
		<link rel="stylesheet" href="css/index/slideshow.css" />
	    <!--ESTILO-->
	    <link rel="stylesheet" href="css/index/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/index/ranking.css" />
		<link rel="stylesheet" type="text/css" href="css/index/landio.css" />
        <link rel="stylesheet" type="text/css" href="css/index/styles.css" />
	</head>
	<body>
		<?php
			include('menu.php');
		?>
		<!--SLIDESHOW-->
		<section class="masthead">
			<video class="masthead-video" autoplay loop muted poster="assets/images/poster.jpg">
				<source src="img/index/lol.MP4" type="video/mp4">
			</video>
			<div class="masthead-overlay"></div>
			<div class="masthead-arrow"></div>
			<h1>ProCast<span>Seja um profissional</span></h1>
		</section>
		<!---->
		<div style="height: 20%"></div>
		<div class="container-fluid">
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
        </div><div style="height: 20%"></div>
			
        <!--NOTÍCIA--
        <div class="container-fluid"
        	<div class="row">
				<div class="pricing-table">
					<div class="col-lg-4">
					    <div class="pricing-option">
					        <h2>Título da notícia</h2>
					        <p>
					        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto reprehenderit hic saepe nesciunt sed illo.
					        </p>
					        <div class="price">
					            <div class="front">
					                <span class="price">Continue lendo...</span>
					            </div>
					        </div>
					    </div>
					</div>
					<div class="col-lg-4">
					    <div class="pricing-option">
					        <h2>Título da notícia</h2>
					        <p>
					        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto reprehenderit hic saepe nesciunt sed illo.
					        </p>
					        <div class="price">
					            <div class="front">
					                <span class="price">Continue lendo...</span>
					            </div>
					        </div>
					    </div>
					</div>
					<div class="col-lg-4">
					    <div class="pricing-option">
					        <h2>Título da notícia</h2>
					        <p>
					        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto reprehenderit hic saepe nesciunt sed illo.
					        </p>
					        <div class="price">
					            <div class="front">
					                <span class="price">Continue lendo...</span>
					            </div>
					        </div>
					    </div>
					</div>
					
				</div>
			</div>
		</div>-->
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
		<!---->
		<div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-2 col-md-5">
                    <div class="feature-list">
                        <h3>Preparado pra essa jornada? </h3>
                        <p>Agora ficou fácil ser um profissional. Com a ProCast você alcança o mais sonhado sucesso em League of Legends. Tenha a visibilidade postando suas melhores jogadas e conquistando nossas missões !</p><p>
Com a plataforma você tem muito mais chances de ser encontrado e ser convocado para grandes equipes. Não perca tempo!

                        </p>
                        BOTÃO
                    </div>
                </div>
                <div class="col-md-5">
                	<img src="img/index/foto2.png" alt="responsive devices">
                </div>
            </div>
        </div><div style="height: 20%"></div>
    
		<!--VÍDEO VIRAL--
		<div class="container-fluid">
	    	<div class="row">
	    		<div class="col-md-offset-0 col-md-12">
		    		<div class="embed-responsive embed-responsive-16by9">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/-6JqoJrM9IM"></iframe>
						</div>
					</div>
				</div>
	    	</div>
	    </div>-->
	    <video id="demo_video" class="video-js vjs-default-skin vjs-big-play-centered" controls poster="img/index/capa_video.png" data-setup='{}'>
      <source src="img/index/lol.MP4" type='video/mp4'>
    </video>
        
	    <!--COMENTÁRIOS-->
	    <div class="container-fluid">
			<div class='row'>
			    <div class='col-md-offset-1 col-md-10'>
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
		<script src="js/index/landio.min.js"></script>
	    <!-- SLIDESHOW -->
		<script src="js/index/covervid.js"></script>
		<script src="js/index/scripts.js"></script>
		<script type="text/javascript">
				coverVid(document.querySelector('.masthead-video'), 640, 360);
		</script>
	</body>
</html>