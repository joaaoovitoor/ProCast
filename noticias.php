<?php
    include('verificar_logado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Notícias</title>
        <link rel="stylesheet" href="css/noticias.css">
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
        <?php
            include('menu2.php');
        ?>
        <!-- Banner -->
        <div class="banner">
            <div class="container-fluid">
                <h1 class="text-center fonte_branca texto_sombra">
                    <strong>Notícias</strong>
                </h1>
                <p class="text-center fonte_branca texto_sombra">
                    Fique informado sobre todas as novidades do mundo de e-sports<br>Basta escolher a categoria e aproveitar!
                </p>
            </div>
        </div>
        <!-- fim banner -->
        <!-- tabs -->
       
          <!-- Nav tabs -->
            <ul class="nav nav-tabs not sem_borda col-md-offset-4" role="tablist">
                <?php include('classes/conteudoCategoria.php') ?>
            </ul>
            <!-- Tab paineis -->

            <div class="tab-content">
                <?php include('classes/saidaNoticias.php');?>
            </div>
    

        <!-- fim tabs -->
        <?php
            include('rodape.html');
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>            
	</body>
</html>