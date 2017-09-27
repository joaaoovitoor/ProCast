<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Notícias</title>
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="css/rodape.css">
        <link rel="stylesheet" href="css/noticias.css">
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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>Ut enim ad minim veniam
                </p>
            </div>
        </div>
        <!-- fim banner -->
        <!-- tabs -->
        <div>
          <!-- Nav tabs -->
            <ul class="nav nav-tabs not sem_borda col-md-offset-4" role="tablist">
                <li role="presentation" class="active"><a href="#categoria1" class="sem_borda fonte_cinza_claro tabs_menu" aria-controls="categoria1" role="tab" data-toggle="tab">Categoria 1</a></li>
                <li role="presentation"><a href="#categoria2" class="sem_borda fonte_cinza_claro tabs_menu" aria-controls="categoria2" role="tab" data-toggle="tab">Categoria 2</a></li>
                <li role="presentation"><a href="#categoria3" class="sem_borda fonte_cinza_claro tabs_menu" aria-controls="categoria3" role="tab" data-toggle="tab">Categoria 3</a></li>
                <li role="presentation"><a href="#categoria4" class="sem_borda fonte_cinza_claro tabs_menu" aria-controls="categoria4" role="tab" data-toggle="tab">Categoria 4</a></li>
            </ul>
            <!-- Tab paineis -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="categoria1">
                    <!-- Conteudo tab -->
                    <div class="container-fluid not">
                        <nav>
                            <ul class="pager">
                                <li class="previous"><a href="#" class="borda_azul fonte_azul_claro"><span aria-hidden="true">&larr;</span> Anterior</a></li>
                                <li class="next"><a href="#" class="borda_azul fonte_azul_claro">Próximo <span aria-hidden="true">&rarr;</span></a></li>
                            </ul>
                        </nav>
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <a href="conteudo_noticia.php">
                                    <div class="thumbnail">
                                        <img src="img/noticias.jpg" alt="...">
                                        <div class="caption">
                                            <p class="label text-right bg_cinza_escuro">
                                                Categoria 1
                                            </p>
                                            <h3 class="text-center fonte_cinza_escuro"><strong>Título da notícia</strong></h3>
                                            <p class="text-center">Sinopse da notícia</p>
                                            <p class="text-center fonte_azul_claro">
                                                <strong>
                                                <i class="fa fa-clock-o "></i> 2 anos &nbsp;<i class="fa fa-comment-o "></i> 3 comentários
                                                </strong>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- fim conteudo tab -->
                </div>
                <div role="tabpanel" class="tab-pane" id="categoria2">
                    <!-- conteudo tab -->
                    <div class="container-fluid not">
                        <nav>
                            <ul class="pager">
                                <li class="previous"><a href="#" class="borda_cinza fonte_cinza_escuro"><span aria-hidden="true">&larr;</span> Anterior</a></li>
                                <li class="next"><a href="#" class="borda_cinza fonte_cinza_escuro">Próximo <span aria-hidden="true">&rarr;</span></a></li>
                            </ul>
                        </nav>
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="img/noticias.jpg" alt="...">
                                    <div class="caption">
                                        <p class="label text-right bg_cinza_escuro">
                                            Categoria 2
                                        </p>
                                        <h3 class="text-center fonte_cinza_escuro"><strong>Título da notícia</strong></h3>
                                        <p class="text-center">Sinopse da notícia</p>
                                        <p class="text-center fonte_azul_claro">
                                            <strong>
                                            <i class="fa fa-clock-o "></i> 2 anos &nbsp;<i class="fa fa-comment-o "></i> 3 comentários
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fim conteudo tab -->
                </div>
            </div>
        </div>
        <!-- fim tabs -->
        <?php
            include('rodape.html');
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>            
	</body>
</html>