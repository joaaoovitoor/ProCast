	<nav class="nav-menu hidden-xs hidden-sm navbar-fixed-top">
	<a href="home.php"><img src="img/logo_horizontal.png" class="pull-left img-responsive logo" ></a>
		<ul class="ul-menu list-inline text-center unstyle-list col-md-offset-6">
			<li class="item item-log">
					 <a class="menu-item " href="home.php">Home </a> 
			</li>
			<li class="item item-log">
					<a class="menu-item " href="noticias.php" >Notícias </a>
			</li>
			<li class="item item-log">
					<a class="menu-item " href="verificar_perfil.php" >Perfil </a>
			</li>
			<li class="item item-log">
					<a class="menu-item " href="verificar_user_clube.php">Clube </a>
			</li>
			<!--<li class="item item-log">
					 <a class="menu-item " href="ranking.php">Ranking </a> 
			</li>-->
			<li class="item item-log">
					<a class="menu-item " href="mensagens.php">Mensagens </a>
			</li>
			<li class="item item-log">
					<a class="menu-item" href="destruir.php">Sair <i hidden="true" class="fa fa-sign-in fa-1x icone">  </i></a>
			</li>
		</ul>
	</nav>
	<div class="container-fluid visible-xs visible-sm img-responsive logo_horizontal" style="background-color:rgba(51, 51, 51, 1);padding:10px;margin:0px;">
		<div class="row text-center">
			<img src="img/logo_horizontal.png" >
		</div>
	</div>
	<!-- Menu mobile-->
	<nav hidden="true" id="mobile" class="nav-menu-mobile  text-center hidden-md">
		<div class="row item-mobile">
			<a href="home.php" >Home </a>
			
		</div>
		<div class="row item-mobile">
			<a href="noticias.php" >Notícias </a>
			
		</div>
		<div class="row item-mobile">
			<a href="verificar_perfil.php">Perfil</a>
			
		</div>
		<div class="row item-mobile">
			<a href="verificar_user_clube.php">Clubes</a>
			
		</div><!--
		<div class="row item-mobile">
			 <a href="ranking.php">Ranking</a> 
		</div>-->
		<div class="row item-mobile">
			<a href="mensagens.php">Mensagens</a>
		</div>
		<div class="row item-mobile login-mob">
			<a href="destruir.php">Sair</a>
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