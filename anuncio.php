<?php
	ob_start();
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
                    Controle todos seus anúncios já feitos na plataforma<br>
                    Em caso de dúvida entre em <a href="contato.php">contato</a>
                    </p>
                </div>
            </div>
        </div>
       
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-offset-1 col-md-10">
        			<h2 align="center"><strong>Anúncios feitos na plataforma</strong></h2>
        			<h4 align="center">Não esqueça de se atualizar sobre as <a href="politicas.php"> políticas de anúncio.</a></h4>
        		 	<?php
			        	$sqlsel=('SELECT * FROM anuncio WHERE id_anunciante='.$con['id_anunciante'].' ORDER BY data_criacao_anuncio;');
			        	$resul=mysqli_query($conexao,$sqlsel);
							if (mysqli_num_rows($resul)>0)
							{
								while ($con_anu=mysqli_fetch_array($resul)) 
								{
					?>
					<div class='list-card'>
						<div class="col-md-5">
							
							<div class='list-label' 
							<?php
								if ($con_anu['status']==0){
									echo 'style="background-color: #1abde6;"> AGUARDANDO APROVAÇÃO';
								}
								else if ($con_anu['status']==1){
									echo 'style="background-color: #1fc055;"> APROVADO';
								}
								else{
									echo 'style="background-color: #ff4540;"> REPROVADO';
								}
							?>
							</div>
							<img src='uploads/<?php echo $con_anu['anuncio'];?>'>
						</div>
						<div class="col-md-3">
							<div class='list-details'>
								<div class='list-name'>
									Nome do Anúncio: <?php echo $con_anu['nome_anuncio'];?>
								</div>
								<div class='list-rooms'>
									Link: <?php echo $con_anu['link'];?>
								</div>
								<div class='list-landmark'>
									Data de Criação: <?php echo $con_anu['data_criacao_anuncio'];?>
								</div>
								<div class='list-location'>
									Data de expiração: -
								</div>
								<div class='list-price'>
									<?php 
										if($con_anu['tipo']==1){
											echo '1 semana por R$9,99';
										}elseif ($con_anu['tipo']==2){
											echo '15 dias por R$16,99';
										}else{
											echo '1 mês por R$29,99';										
										}
									?>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<form action="#" method="POST">
								<input type="hidden" name="id_anuncio" value="<?php echo($con_anu['id_anuncio']);?>">
								<p><button class="btn btn-default"><i class="fa fa-flag" aria-hidden="true"></i> Reanunciar</button></p>
								<p><button class="btn btn-danger" name="excluir"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button></p>
							</form>
						</div>
						
					</div>
					<?php
							}
						}
						else
						{
							echo '<h3 align="center"><img src="img/triste.png"><br>Nenhum Anúncio</h3>';
						}
						
						if(isset($_POST['excluir']))
						{
							$id_anuncio=$_POST['id_anuncio'];
							$sqlex=('DELETE FROM anuncio WHERE id_anuncio='.$id_anuncio.';');
							mysqli_query($conexao,$sqlex);
							header('location:anuncio.php');
							exit();
						}
					?>
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