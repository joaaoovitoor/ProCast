    <?php
    include('verificar_logado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <link rel="stylesheet" href="css/noticias_cont.css">
        <?php
            include('link_head.html');
        ?>
        <style>
            .ctd{
                overflow-wrap: break-word;
            }
        </style>
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
                <?php include('classes/saidaNoticiasSidebar.php');?>
            </div>
        </div>
        <div class="container-fluid not">
            <div class="row">
                <h3>Comentários</h3>
                <div class="col-md-1">
                    <?php
                        $sqlsel='SELECT * FROM usuario;';
                        $resul=mysqli_query($conexao,$sqlsel);
                        $con_us=mysqli_fetch_array($resul);
                        echo('<img src="uploads/'.$con_us['foto_perfil'].'" class="perf img-circle">');
                    ?>
                </div>
                <?php if (isset($_POST['comentar'])) 
                {
                    include('classes/addComentario.php');
                } ?>
                <form action="#" method="POST">
                    <div class="col-md-7">
                        <textarea name="comentario" rows="5" maxlength="1000" class="form-control" placeholder="Escreva seu comentário"></textarea>
                        <input type="submit" name="comentar" value="Comentar" class="fonte_branca bg_azul_escuro btn mg_tp mg_bt">
                    </div>
                </form>
            </div>
            <?php include('classes/verComentario.php'); ?>
        </div>
        <?php
            include('rodape.html');
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>            
	</body>
</html>