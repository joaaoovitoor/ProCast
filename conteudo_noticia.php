<?php
    include('verificar_logado.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <title>Notícia</title>
        <link rel="stylesheet" href="css/noticias_cont.css">
        <!--UTF-8-->    
        <meta charset="utf-8"/>
        <script charset="UTF-8"></script>
        <!--BOOTSTRAP-->
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="css/txtareacss.css" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!--FONTES-->
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <!--ALERT-->
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!--ESTILO MENU--> 
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!--ESTILO RODAPÉ-->
        <link rel="stylesheet" href="css/rodape.css">
        <!--ÍCONE-->
        <link rel="shortcut icon" type="image/x-icon" href="img/procast.ico"/>
        <!--LOADING-->
        <script src="js/pace.js"></script>
        <link rel="stylesheet" href="css/pace-theme-minimal.css">
        
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