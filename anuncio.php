<?php
    session_start();
    if(isset($_SESSION['email'])){
        $email_usuario=$_SESSION['email'];
        include('conexao.php');
        $sqlsel='select * from anunciante where email="'.$email_usuario.'";';
        $resul=mysqli_query($conexao,$sqlsel);
        $con=mysqli_fetch_array($resul);
    }
    else{
        header('location:destruir.php');    
    }
?>
<html lang="pt-br">
	<head>
        <title>Meus Anúncios</title>
        <meta charset="utf-8">
  		<!--ESTILO-->
  		<link rel="stylesheet" href="css/anunciante.css">
  		<script src="js/bootstrap.js"></script>
	    <script src="js/jquery.js"></script>
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
	   <?php
			include('menu_anunciante.php');
		?>
		<div class="banner anuncio">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center  fonte_branca texto_sombra"><strong>Anúncios</strong></h1> 
                    <p class="text-center  fonte_branca texto_sombra">
                    Controle todos seus anúncios já feitos na plataforma
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-offset-1 col-md-10">
					<div class='list-card'>
						<div class="col-md-5">
							<div class='list-label' style="background-color: #1fc055;">ATIVO</div>
							<img src='img/publi1.png'>
						</div>
						<div class="col-md-3">
							<div class='list-details'>
								<div class='list-name'>
									Nome do Anúncio
								</div>
								<div class='list-rooms'>
									Link: www.google.com.br
								</div>
								<div class='list-landmark'>
									Data de Criação: 23/10/2017
								</div>
								<div class='list-location'>
									Data de expiração: 03/11/2017
								</div>
								<div class='list-price'>
									Custo: R$ 59,99
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<p><a href="#" class="btn btn-default" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Alterar</a></p>
							<p><a href="#" class="btn btn-default" role="button"><i class="fa fa-flag" aria-hidden="true"></i> Reanunciar</a></p>
							<p><a href="#" class="btn btn-default" role="button"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</a></p>

						</div>
					</div>
					<!--ff4540-->
					<div class='list-card'>
						<div class="col-md-5">
							<div class='list-label' style="background-color: #ff4540;">EXPIRADO</div>
							<img src='img/oque.png'>
						</div>
						<div class="col-md-3">
							<div class='list-details'>
								<div class='list-name'>
									Nome do Anúncio
								</div>
								<div class='list-rooms'>
									Link: www.google.com.br
								</div>
								<div class='list-landmark'>
									Data de Criação: 23/10/2017
								</div>
								<div class='list-location'>
									Data de expiração: 03/11/2017
								</div>
								<div class='list-price'>
									Custo: R$ 59,99
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<p><a href="#" class="btn btn-default" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Alterar</a></p>
							<p><a href="#" class="btn btn-default" role="button"><i class="fa fa-flag" aria-hidden="true"></i> Reanunciar</a></p>
							<p><a href="#" class="btn btn-default" role="button"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</a></p>

						</div>
					</div>
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
        <!--Modal-->
        <script>
            $('#myModal').on('shown.bs.modal', function () {
              $('#myInput').focus()
            })
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