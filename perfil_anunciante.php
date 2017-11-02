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
        <title>Perfil</title>
        <meta charset="utf-8">
  		<!--ESTILO-->
  		<link rel="stylesheet" href="css/anunciante.css">
  		<script src="js/bootstrap.js"></script>
	    <script src="js/jquery.js"></script>
	    <script src="js/pesq_cidade.js"></script>
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
                	No perfil você pode alterar suas informações 
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-offset-1 col-md-10">
        			<div class="panel sombra bg_branco">
						<div class="panel-body">
							<h1 class="fonte_azul_claro text-center x1"><strong><?php echo $con['nome_anunciante'];?></strong></h1>
        					<h4 class="fonte_azul_claro text-center"><strong><?php echo $con['nome_empresa'];?></strong></h4>
						</div>
					</div>
	        		<form action="" method="POST">
						<div class="col-md-6">
							<div class="form-group">
								Nome <input value="<?php echo $con['nome_anunciante'];?>" type="text" class="form-control" name="nome" maxlength="15" required>
							</div>
							<div class="form-group">
								Sobrenome <input value="<?php echo $con['sobrenome'];?>" type="text" class="form-control" name="sobrenome"  maxlength="15" required>
							</div>
							<div class="form-group">
								Senha <input value="<?php echo $con['senha'];?>" type="password" name="senha" class="form-control" maxlength="20" required>
							</div>
							<div class="form-group">
								E-mail<input value="<?php echo $con['email'];?>" type="email" name="email" class="form-control" maxlength="30" required>
							</div>												
						</div>
						<div class="col-md-6">
	                        <div class="form-group">
								 Nome da Empresa <input value="<?php echo $con['nome_empresa'];?>" type="text" class="form-control" name="nome_empresa" maxlength="25" required>
							</div>
	                        <div class="form-group">
								CNPJ <input value="<?php echo $con['cnpj'];?>" type="text" maxlength="18" class="form-control" name="cnpj" id="cnpj" required>
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
						</div>
						<p><button type="submit" class="btn btn-default" name="alterar"><i class="fa fa-pencil" aria-hidden="true"></i> Alterar</button></p>
						<p><button type="submit" class="btn btn-default" name="excluir"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button></p>
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