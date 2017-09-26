<html>
	<head>
		<title>
			Menu
		</title>
		
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="UTF-8"/>	
		<style type="text/css" >
			.nav-menu
			{
				background-color:rgba(51, 51, 51, 1);
				color:white;
			
				font-size: 20px;
				font-family: 'Nunito', sans-serif;
				padding: 30px;
				
			}
			.item a
			{
				font-family: 'Nunito', sans-serif;
				margin-right:30px;
				color: rgba(255, 255, 255, 0.5);
			}
			.item a:hover
			{
				transition: all linear .15s;
				color: rgba(255, 255, 255, 1);
				text-decoration: none;
			}
			.nav-menu-mobile
			{
				background-color:rgba(51, 51, 51, 1);
				color:white;
				
				font-size: 20px;
				font-family: Nunito;
			}
			.logo
			{
				margin-top: -10px !important;
				display: block;
			}


			.nav-menu-mobile
			{
				background-color:rgba(51, 51, 51, 1);
				color:white;
				
				font-size: 16px;
				font-family: Nunito;
				padding: 5px;
			}
			.item-mobile a 
			{
				display: block;
				margin-top:20px ;
				color: white;
				font-family: 'Nunito', sans-serif;
				
			}
			.item-mobile a:hover 
			{
				transition: all linear .15s;
				color: rgba(255, 255, 255, 1);
				text-decoration: none;
			}
			.logo_horizontal
			{
				margin:10px;
			}
		</style>
	</head>
	<body>
		<nav class="nav-menu hidden-xs hidden-sm">
		<img src="logo_horizontal.png" class="pull-left img-responsive logo" >
			<ul class="ul-menu list-inline text-center unstyle-list col-md-offset-5">
				<li class="item">
					<a>item <i class="fa fa-home"></i></a>
				</li>
				<li class="item">
					<a>item <i class="fa fa-home"></i></a>
				</li>
				<li class="item">
					<a>item <i class="fa fa-home"></i></a>
				</li>
				<li class="item">
					<a>item <i class="fa fa-home"></i></a>
				</li>
				<li class="item">
					<a>item <i class="fa fa-home"></i></a>
				</li>
				<li class="item">
						
				</li>
				<li class="item">
						
				</li>
				<li class="item">
						
				</li>	
				<li class="item login">
						<a>Login <i hidden="true" class="fa fa-sign-in fa-1x icone">  </i></a>
				</li>	
			</ul>
		</nav>

		<div class="container-fluid visible-xs visible-sm img-responsive logo_horizontal" style="background-color:rgba(51, 51, 51, 1);padding:10px;margin:0px;">
			<div class="row text-center">
				<img src="logo_horizontal.png" >
			</div>
		</div>

		<!-- Menu mobile-->
		<nav hidden="true" id="mobile" class="nav-menu-mobile  text-center hidden-md">
			<div class="row item-mobile">
				<a>item <i class="fa fa-home"></i></a>
				
			</div>
			<div class="row item-mobile">
				<a>item <i class="fa fa-home"></i></a>
				
			</div>
			<div class="row item-mobile">
				<a>item <i class="fa fa-home"></i></a>
				
			</div>
			<div class="row item-mobile">
				<a>item <i class="fa fa-home"></i></a>
			</div>
			<div class="row item-mobile">
			<hr>
				<a>Login <i class="fa fa-sign-in"></i></a>
			</div>
			<hr>
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
			
		</script>
				
		
	</body>
</html>