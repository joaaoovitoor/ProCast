<html lang="pt-br">
	<head>
        <title>Perfil</title>
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
		<div class="banner perfil">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center  fonte_branca texto_sombra"><strong>Bem-vindo</strong></h1> 
                    <p class="text-center  fonte_branca texto_sombra">
                	HIHIHIH
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-offset-1 col-md-10">
        			<div class="panel sombra bg_branco">
						<div class="panel-body">
							<h1 class="fonte_azul_claro text-center x1"><strong>Joãozinho</strong></h1>
        			<h4 class="fonte_azul_claro text-center"><strong>Microsoft</strong></h4>
						</div>
					</div>
	        		<form action="" method="POST">
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
						</div>
						<div class="col-md-6">
	                        <div class="form-group">
								 Nome da Empresa <input type="text" class="form-control" name="nome_empresa" placeholder="Nome da Empresa" maxlength="25" required>
							</div>
	                        <div class="form-group">
								CNPJ <input type="text" maxlength="18" class="form-control" name="cnpj" placeholder="CNPJ" id="cnpj" required>
							</div>
							<div class="form-group">
								Estado
								<select name="estado" class="form-control">
									<option value="ac">Acre</option>
								</select>
							</div>
	                        <div class="form-group">
								Cidade
								<select name="cidade" class="form-control">
									<option value="ac">Acre</option>
								</select>
							</div>
						</div>
						<p><a href="#" class="btn btn-default" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Alterar</a></p>
					</form>
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