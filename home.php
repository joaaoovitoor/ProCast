<?php 
    include('verificar_logado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Home</title>
        <link rel="stylesheet" href="css/home.css">
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
        <?php
            include('menu2.php');
        ?>
        <!--BANNER-->
        <div class="camp">
            <div class="container-fluid">
                <h3 class="text-center fonte_branca texto_sombra"><strong>Entre para um clube e</strong></h3>
                <h1 class="text-center fonte_branca texto_sombra">
                    <strong>Aumente suas chances de ser um profissional!</strong>
                </h1>
                <a href="noticias.php" class="btn btn-lg fonte_branca btn_camp bg_grad col-sm-offset-5 col-xs-offset-4"><strong>Mais Informações</strong></a>
            </div>
        </div>
        <!--NOTICIAS-->
        <div class="container-fluid">
            <?php
                $sqlsel='SELECT * FROM noticia order by data desc LIMIT 3;';
                $res=mysqli_query($conexao,$sqlsel);
                if (mysqli_num_rows($res)) {
            ?>
           <div class="row">
                <h2 class="text-center fonte_cinza_escuro"><strong>Veja as principais notícias sobre e-sports</strong></h2>
                 <?php
                 
                    while ($controle=mysqli_fetch_array($res)) {
 
                ?>
                <a href="conteudo_noticia.php?ex=<?php echo $controle['id_noticia']?>">
                    <div class="col-md-4">
                        <div class="panel panel-default noticia mg_tp">
                            <img src="uploads/<?php echo($controle['imagem_noticia']); ?>" class="altr" width="100%" height="300">
                            <h4 class="text-center fonte_cinza_escuro"><strong><?php echo($controle['titulo']); ?></strong></h4>
                            <p class="text-center"><?php echo($controle['lide']); ?></p>
                            <p class="text-center fonte_azul_claro"><a href="conteudo_noticia.php?ex=<?php echo $controle['id_noticia']?>"><strong>Continuar Lendo</strong></a></p>
                        </div> 
                    </div>
                </a>
            <?php
                    }
                }
            ?>
            </div>
            <div class="row bg_branco anunc">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <h2 class="fonte_cinza_escuro"><strong>Anuncie-se</strong></h2>
                    <h4 class="mg_tp">
                        <strong>Quer ter mais visibilidade? Tornar-se um profissional? Anuncie-se agora mesmo!</strong>
                    </h4>
                    <p class="mg_tp">
                        Por apenas R$ 9,90 você pode ter seu perfil anunciado na home do site, aumentado assim suas chances de ser descoberto.
                    </p>
                </div>
                <div class="col-md-offset-1 col-md-3 pri mg_tp">
                    <div class="panel sombra bg_branco_w card_preco">
                        <div class="panel-heading bg_cinza_escuro">
                            <h3 class=" text-center fonte_branca"><strong>Anúncio Gold</strong></h3>
                        </div>
                        <div class="panel-body">
                            <h1 class="text-center fonte_cinza_escuro"><strong>R$ 9,90</strong></h1>
                            <p class="text-center fonte_cinza_claro"><strong>Válido somente para jogadores</strong></p>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item sem_borda"> <span class="glyphicon glyphicon glyphicon-ok-circle fonte_azul_claro" aria-hidden="true"></span> Anúncio de informações do perfil</li>
                            <li class="list-group-item sem_borda"> <span class="glyphicon glyphicon glyphicon-ok-circle fonte_azul_claro" aria-hidden="true"></span> Duração de 7 dias</li>
                        </ul>
                        <p class="mg_ld">
                            <form action="boleto/boleto_an_user.php" method="POST" target="_blank">
                                <input type="hidden" name="tipo_an" value="1">
                                <button type="submit" class="btn btn-lg fonte_branca bg_grad_cinza btn_fw mg_tp" <?php if($con['categoria_usuario']==2){echo 'disabled="disabled"';}?>><strong>Contratar</strong></button>
                            </form>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 x1 mg_tp">
                    <div class="panel sombra bg_branco_w card_preco">
                        <div class="panel-heading bg_cinza_escuro">
                            <h3 class=" text-center fonte_branca"><strong>Anúncio Platina</strong></h3>
                        </div>
                        <div class="panel-body">
                            <h1 class="text-center fonte_cinza_escuro"><strong>R$ 19,90</strong></h1>
                            <p class="text-center fonte_cinza_claro"><strong>Válido somente para jogadores</strong></p>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item sem_borda"> <span class="glyphicon glyphicon-ok-circle fonte_azul_claro" aria-hidden="true"></span> Anúncio de informações do perfil</li>
                            <li class="list-group-item sem_borda"> <span class="glyphicon glyphicon-ok-circle fonte_azul_claro" aria-hidden="true"></span> Duração de 14 dias</li>
                        </ul>
                        <p class="mg_ld">
                            <form action="boleto/boleto_an_user.php" method="POST" target="_blank">
                                <input type="hidden" name="tipo_an" value="2">
                                <button type="submit" class="btn btn-lg fonte_branca bg_grad_cinza btn_fw mg_tp" <?php if($con['categoria_usuario']==2){echo 'disabled="disabled"';}?>><strong>Contratar</strong></button>
                            </form>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 mg_tp">
                    <div class="panel sombra bg_branco_w card_preco">
                        <div class="panel-heading bg_cinza_escuro">
                            <h3 class=" text-center fonte_branca"><strong>Anúncio Diamante</strong></h3>
                        </div>
                        <div class="panel-body">
                            <h1 class="text-center fonte_cinza_escuro"><strong>R$ 39,90</strong></h1>
                            <p class="text-center fonte_cinza_claro"><strong>Válido somente para clubes</strong></p>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item sem_borda"> <span class="glyphicon glyphicon-ok-circle fonte_azul_claro" aria-hidden="true"></span> Anúncio de nomes dos integrantes e vitórias do clube</li>
                            <li class="list-group-item sem_borda"> <span class="glyphicon glyphicon-ok-circle fonte_azul_claro" aria-hidden="true"></span> Duração de 14 dias</li>
                        </ul>
                        <p class="mg_ld">
                            <form action="boleto/boleto_an_user.php" method="POST" target="_blank">
                                <input type="hidden" name="tipo_an" value="3">
                                <button type="submit" class="btn btn-lg fonte_branca bg_grad_cinza btn_fw mg_tp" <?php if($con['categoria_usuario']==1){echo 'disabled="disabled"';}?>><strong>Contratar</strong></button>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
            <!--SLIDESHOW-->

        </div> 
                    <div id="slide-anuncio" class="carousel slide" data-ride="carousel">
                <h2 class="text-center fonte_branca"><strong>Jogadores e clubes destaque</strong></h2>
                <ol class="carousel-indicators">
                    <li data-target="#slide-anuncio" data-slide-to="0" class="active"></li>
                    <li data-target="#slide-anuncio" data-slide-to="1"></li>
                    <li data-target="#slide-anuncio" data-slide-to="2"></li>
                </ol>
                <!--slides-->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="row">
                            <div class="col-xs-offset-4 col-md-offset-2 col-md-2">
                                <img src="img/home/jogador.jpg" class="img-responsive img-circle user">
                            </div>
                            <div class="col-xs-offset-4 col-md-offset-0 col-md-8">
                                <h3 class="fonte_branca"><strong>Conheça Cleber José</strong></h3>
                                <p class="fonte_branca"><strong><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Idade:</strong> 19 anos </p>
                                <p class="fonte_branca"><strong><span class="glyphicon glyphicon-knight" aria-hidden="true"></span> Posição:</strong> Suporte </p>
                                <p class="fonte_branca"><strong><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Ranking:</strong> 135º</p>
                                <p class="fonte_branca"><strong><span class="glyphicon glyphicon-knight" aria-hidden="true"></span> Elo: </strong> Platina II <img src="img/home/elos/platina.png" alt=""></p>
                                <p class="fonte_branca"><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Clube:</strong> Sem clube</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-xs-offset-4 col-md-offset-2 col-md-2">
                                <img src="img/home/red.jpg" class="img-responsive img-circle user">
                            </div>
                            <div class="col-xs-offset-4 col-md-offset-0 col-md-8">
                                <h3 class="fonte_branca"><strong> Conheça o clube Red Canids</strong></h3>
                                <p class="fonte_branca"><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Topo:</strong> Cleber </p>
                                <p class="fonte_branca"><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Caçador:</strong> Francisco </p>
                                <p class="fonte_branca"><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Meio:</strong> José</p>
                                <p class="fonte_branca"><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Atirador: </strong> Roberto </p>
                                <p class="fonte_branca"><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Suporte: </strong> Wesley </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--controles-->
                <a class="left carousel-control sem_bg" href="#slide-anuncio" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left sem_bg fonte_branca" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control sem_bg" href="#slide-anuncio" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right sem_bg fonte_branca" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <?php
            include('rodape.html');
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $('.carousel').carousel()
        </script>             
	</body>
</html>