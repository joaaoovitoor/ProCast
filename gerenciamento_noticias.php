<?php 
	include("menu-admin.html");

	if(isset($_POST['enviar']))
	{
		require_once("classes/AddNoticia.php");
	}
	if(isset($_POST['enviar_categoria']))
	{
		require_once("classes/AddCategoria.php");

	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Gerencimento de notícias
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/gerenciamento_noticias.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/perfil/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/perfil/tabstyles.css" />
		<script src="js/tinymce/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'textarea' });</script>
		<meta charset="UTF-8"/>
	</head>
	<body>
	
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 bg-procast titulo">
						<h1>Gerenciamento de Notícias</h1>
					</div>
				</div>
			</div>
		</section>
		
		<br/>
		
		<section>
			<div class="tabs tabs-style-linebox">
				<nav>
					<ul>
						<li><a href="#section-linebox-1"><span>Nova notícia</span></a></li>
						<li><a href="#section-linebox-2"><span>Notícias criadas <span class="badge"><?php  require_once("classes/quantidade_noticias.php");?></span></span></a></li>
						<li><a href="#section-linebox-4"><span>Categorias</span></a></li>
					</ul>
				</nav>
				<div class="content-wrap">
					<!-- Nova mensagem -->
			
					<section id="section-linebox-1">
						<h1 class="text-center"> Nova notícia</h1>
						<div class="container-fluid">
							<div class="row">
								<form method="POST" action="#" enctype="multipart/form-data">
									<div class="form-group col-md-12">
										<h4>Titulo da notícia:</h4>
										<input type="text" name="titulo_noticia" placeholder="Ex:Novo torneio" class="form-control">
									</div>
									<div class="form-group col-md-12">
										<h4>lide da notícia:</h4>
										<input type="text" name="lide" placeholder="Informações oque a notíca trata" class="form-control">
									</div>
									<div class="form-group col-md-12">
										<h4>Categoria:</h4>
										<select class="form-control" name="categoria">
											<?php
												$con = mysqli_connect('localhost','root','','dbprocast');
												$select = "SELECT * FROM categoria_noticia";
												$sql_sel = mysqli_query($con,$select);

												if($sql_sel)
												{
													while ($row = mysqli_fetch_array($sql_sel)) 
													{
											?>
														<option value="<?php echo $row['categoria_noticia']; ?>"><p color="black"><?php echo $row['categoria_noticia'];?></p></option>
											<?php
													}
												}
											?>
										</select>
									</div>
									<div class="form-group col-md-12">
										<h4>Inserir imagem:</h4>
										<input type="file" name="foto" class="btn btn-default">
									</div>
									<div class="form-group col-md-12">
										<h4>Notícia:</h4>
										<textarea class="form-control" rows="10" name="noticia" placeholder="Digite a noticia"></textarea>
									</div>
									<div class="form-group">
										<input type="submit" name="enviar" class="btn btn-procast btn-block" value="Publicar">
									</div>
								</form>
							</div>	
						</div>
					</section>
					
					<!-- Mensagens criadas -->
					<section id="section-linebox-2">
						<?php
							require_once("classes/VerNoticia.php");
						?>
					</section>


					
					
					<section id="section-linebox-4">
						<form method="POST" action="#">
							<h1 align="center">Nova categoria</h1>
									<div class="form-group col-md-12">
										<h4>Nome:</h4>
										<input type="text" name="nome" placeholder="Nome da categoria" class="form-control">
									</div>
									<div class="form-group col-md-12">
										<h4>Descrição:</h4>
										<input type="text" name="descri" placeholder="Assunto da categoria" class="form-control">
									</div>
									<div class="form-group">
										<input type="submit" name="enviar_categoria" class="btn btn-procast btn-block" value="Cadastrar">
									</div>
								</form>
								<?php
									require_once("classes/verCategoria.php");
								?>
					</section>
					
				</div>
			</div>
		</section>
		<script src="js/cbpFWTabs.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<script>
		(function() {

		[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
			new CBPFWTabs( el );
		});

		})();
		</script>
<?php 
	include("rodapeadm.html");
?>
	</body>
</html>