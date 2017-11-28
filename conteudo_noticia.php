<?php
    include('verificar_logado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php
            include('link_head.html');
        ?>
        <link rel="stylesheet" href="css/noticias_cont.css">
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
        <div class="container-fluid">
            <div class="row">
                <?php include('classes/saidaConteudoNoticia.php');?>
                <a href="conteudo_noticia.php">
                    <div class="col-md-4">
                        <div class="col-md-6">
                            <img src="img/noticia_conteudo.jpg" class="img-responsive mg_tp mg_bt">
                        </div>
                        <div class="col-md-6">
                            <h4 class="fonte_cinza_escuro mg_bt"><strong>E-Sports: Brasil Game Show anuncia campeonato universitário de LOL</strong></h4>
                        </div>
                    </div>
                </a>
                <a href="conteudo_noticia.php">
                    <div class="col-md-4">
                        <div class="col-md-6">
                            <img src="img/noticia_conteudo.jpg" class="img-responsive mg_tp mg_bt">
                        </div>
                        <div class="col-md-6">
                            <h4 class="fonte_cinza_escuro mg_bt"><strong>E-Sports: Brasil Game Show anuncia campeonato universitário de LOL</strong></h4>
                        </div>
                    </div>
                </a>
                <a href="conteudo_noticia.php">
                    <div class="col-md-4">
                        <div class="col-md-6">
                            <img src="img/noticia_conteudo.jpg" class="img-responsive mg_tp mg_bt">
                        </div>
                        <div class="col-md-6">
                            <h4 class="fonte_cinza_escuro mg_bt"><strong>E-Sports: Brasil Game Show anuncia campeonato universitário de LOL</strong></h4>
                        </div>
                    </div>
                </a>
                <a href="conteudo_noticia.php">
                    <div class="col-md-4">
                        <div class="col-md-6">
                            <img src="img/noticia_conteudo.jpg" class="img-responsive mg_tp mg_bt">
                        </div>
                        <div class="col-md-6">
                            <h4 class="fonte_cinza_escuro mg_bt"><strong>E-Sports: Brasil Game Show anuncia campeonato universitário de LOL</strong></h4>
                        </div>
                    </div>
                </a>
                <div class="panel col-md-4 bg_branco">
                    <div class="panel-body">
                        <h5 class="fonte_cinza_escuro">Publicidade</h5>
                        <div class="col-xs-6">
                           <a href="https://www.game7.com.br/" target="blank"><img src="img/publi1.png" alt="" class="img-responsive"></a> 
                        </div>
                        <div class="col-xs-6">
                           <a href="https://www.game7.com.br/" target="blank"><img src="img/publi1.png" alt="" class="img-responsive"></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid not">
            <div class="row">
                <h3>Comentários</h3>
                <div class="col-md-1">
                    <img src="img/perfil_icon.png" class="img-responsive img-circle">
                </div>
                <form action="#" method="POST">
                    <div class="col-md-7">
                        <textarea name="comentario" rows="5" maxlength="1000" class="form-control" placeholder="Escreva seu comentário"></textarea>
                        <input type="submit" name="comentar" value="Comentar" class="fonte_branca bg_azul_escuro btn mg_tp mg_bt">
                    </div>
                </form>
            </div>
            <div class="row mg_tp mg_bt">
                <div class="col-md-offset-1 col-md-1">
                    <img src="img/perfil_icon.png" class="img-responsive img-circle">
                </div>
                <div class="col-md-6">
                    <h5 class="fonte_azul_claro"><strong>Nome do usuário</strong></h5>
                    <p>
                        LoremIpsum360 ° é um gerador on-line falso texto livre. Ele oferece um simulador de texto completo para gerar texto de substituição ou texto alternativo para seus modelos. Possui textos aleatórios diferentes em latim e cirílico para gerar exemplos de textos em diferentes línguas. 
                    </p>
                </div>
            </div>
            <div class="row mg_tp mg_bt">
                <div class="col-md-offset-1 col-md-1">
                    <img src="img/perfil_icon.png" class="img-responsive img-circle">
                </div>
                <div class="col-md-6">
                    <h5 class="fonte_azul_claro"><strong>Nome do usuário</strong></h5>
                    <p>
                        LoremIpsum360 ° é um gerador on-line falso texto livre. Ele oferece um simulador de texto completo para gerar texto de substituição ou texto alternativo para seus modelos. Possui textos aleatórios diferentes em latim e cirílico para gerar exemplos de textos em diferentes línguas. 
                    </p>
                </div>
            </div>
        </div>
        <?php
            include('rodape.html');
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>            
	</body>
</html>