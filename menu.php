	<nav class="nav-menu hidden-xs hidden-sm navbar-fixed-top">
	<img src="img/logo_horizontal.png" class="pull-left img-responsive logo" >
		<ul class="ul-menu list-inline text-center unstyle-list col-md-offset-9">
			<li class="item item-log">
					<a class=" menu-item " href="login.php">Login <i hidden="true" class="fa fa-sign-in fa-1x icone">  </i></a>
			</li>
			<li class="item item-log">
					<a class=" menu-item " href="cadastro.php">Cadastrar <i hidden="true" class="fa fa-sign-in fa-1x icone">  </i></a>
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