<?php 
	include('menu-admin.html');
    include('conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Gerencimento de usuários
		</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/gerenciamento_de_torneios.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/clubes.css">
        <link rel="stylesheet" type="text/css" href="css/perso.css">
        <link rel="stylesheet" type="text/css" href="css/perfil/tabs.css" />
        <link rel="stylesheet" type="text/css" href="css/perfil/tabstyles.css" />
	</head>
	<body>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12 bg-procast titulo">
						<h1>Usuários cadastrados</h1>
					</div>
				</div>
			</div>
		</section>
		<br/>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12 ">
						<form action="#" method="POST" >
							<div class="input-group">
							    <span class="input-group-btn">
							     	<button class="btn btn-procast btn-lg" type="submit" name="enviar"> <i class="fa fa-search"></i> Pesquisar usuário</button>
							    </span>
							    <input type="text" class="form-control input-lg" placeholder="Digite o nome do usuário aqui" name="pesquisa_clube">
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		</br>
		<section>
			<div class="container">
				<div class="row">
                    <section>
                        <div class="tabs tabs-style-linebox">
                            <nav>
                                <ul>
                                    <li><a href="#section-linebox-1"><span>Usuários</span></a></li>
                                    <li><a href="#section-linebox-2"><span>Anunciantes</span></a></li>
                                </ul>
                            </nav>
                            <div class="content-wrap">
                                <section id="section-linebox-1">
                                    <h1 class="text-center">Usuários</h1>
                                    <div class="container-fluid">
                            <?php
        						//dados dos usuário	
                                $sql_usuario='SELECT * FROM usuario;';
                                $resul_usuario=mysqli_query($conexao,$sql_usuario);
                                
                                if (mysqli_num_rows($resul_usuario)>0)
                                {
                                    while ($con_usuario=mysqli_fetch_array($resul_usuario)) 
                                    {
                                    	//consulta do estado
                                        $sql_estado='SELECT nome FROM estado WHERE id='.$con_usuario['estado'].';';
                                        $resul_estado=mysqli_query($conexao,$sql_estado);
                                        $con_estado=mysqli_fetch_array($resul_estado);
                                        
                                        //consulta da cidade
                                        $sql_cidade='SELECT nome FROM cidade WHERE id='.$con_usuario['cidade'].';';
                                        $resul_cidade=mysqli_query($conexao,$sql_cidade);
                                        $con_cidade=mysqli_fetch_array($resul_cidade);
        								
        								//consulta de dados especificos
                                        if ($con_usuario['categoria_usuario']==1){
                                            //puxar informações do jogador 
                                            ?>
                                            <div class="col-md-4">
                                                <ul class="list-group">
                                                    <li class="list-group-item active"><center><img src="uploads/<?php echo $con_usuario['foto_perfil']; ?>" class="img-den"></center></li>
                                                    <li class="list-group-item fundo">Nome: <?php echo $con_usuario['nome']." ".$con_usuario['sobrenome']; ?></li>
                                                    <li class="list-group-item fundo">Tipo de usuário: Jogador</li>
                                                    <li class="list-group-item fundo">Nick: <?php echo $con_usuario['nick']; ?></li>
                                                    <li class="list-group-item fundo">CPF: <?php echo $con_usuario['cpf']; ?></li>
                                                    <li class="list-group-item fundo">E-mail: <?php echo $con_usuario['email']; ?></li>
                                                    <li class="list-group-item fundo">Telefone: <?php echo $con_usuario['telefone']; ?></li>
                                                    <li class="list-group-item fundo">Estado: <?php echo $con_estado['nome']; ?></li>
                                                    <li class="list-group-item fundo">Cidade: <?php echo $con_cidade['nome']; ?></li>
                                                    <li class="list-group-item">
                                                        <center><p><a href="contatos.php" class="btn btn-default" role="button">Contatar</a> <a href="#" class="btn btn-danger" role="button">Banir</a></p></center>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php      
                                        }
                                        elseif($con_usuario['categoria_usuario']==2)
                                        {
                                            ?>
                                            <div class="col-md-4">
                                                <ul class="list-group">
                                                    <li class="list-group-item active"><center><img src="uploads/<?php echo $con_usuario['foto_perfil']; ?>" class="img-den"></center></li>
                                                    <li class="list-group-item fundo">Nome: <?php echo $con_usuario['nome']." ".$con_usuario['sobrenome']; ?></li>
                                                    <li class="list-group-item fundo">Tipo de usuário: Investidor</li>
                                                    <li class="list-group-item fundo">CNPJ: <?php echo $con_usuario['cnpj']; ?></li>
                                                    <li class="list-group-item fundo">CPF: <?php echo $con_usuario['cpf']; ?></li>
                                                    <li class="list-group-item fundo">E-mail: <?php echo $con_usuario['email']; ?></li>
                                                    <li class="list-group-item fundo">Telefone: <?php echo $con_usuario['telefone']; ?></li>
                                                    <li class="list-group-item fundo">Estado: <?php echo $con_estado['nome']; ?></li>
                                                    <li class="list-group-item fundo">Cidade: <?php echo $con_cidade['nome']; ?></li>
                                                    <li class="list-group-item"><center><p><a href="contatos.php" class="btn btn-default" role="button">Contatar</a> <a href="#" class="btn btn-danger" role="button">Banir</a></p></center></li>
                                                </ul>
                                            </div>
                                        <?php 
                                        }
                                    }
                                }
                                else
                                {
                                    echo '<h3 align="center"><img src="img/triste.png"><br>Nenhum Usuário</h3>';
                                }
                            ?>
                        </div>
                        </section>
                        <section id="section-linebox-2">
                            <h1 class="text-center">Anunciantes</h1>
                            <div class="container-fluid">
                            <?php
                                $sql_dadosa='SELECT * FROM anunciante';
                                $resul_dadosa=mysqli_query($conexao,$sql_dadosa);
                                if(mysqli_num_rows($resul_dadosa)>0)
                                {
                                    while($consulta=mysqli_fetch_array($resul_dadosa))
                                    {
                                        ?>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item active"><center><img src="img/fotinha.png" class="img-den"></center></li>
                                                <li class="list-group-item fundo">Nome: <?php echo $consulta['nome_anunciante']." ".$consulta['sobrenome'];?></li>
                                                <li class="list-group-item fundo">Tipo de usuário: Anunciante</li>
                                                <li class="list-group-item fundo">CNPJ: <?php echo $consulta['cnpj'];?></li>
                                                <li class="list-group-item fundo">Nome da empresa: <?php $consulta['nome_empresa'];?></li>
                                                <li class="list-group-item fundo">CPF: <?php echo $consulta['cpf'];?></li>
                                                <li class="list-group-item fundo">E-mail: <?php echo $consulta['email'];?></li>
                                                <li class="list-group-item fundo">Telefone: <?php echo $consulta['telefone'];?></li>
                                                <li class="list-group-item fundo">Estado: <?php echo $con_estado['nome'];?></li>
                                                <li class="list-group-item fundo">Cidade: <?php echo $con_cidade['nome'];?></li>
                                            </ul>
                                        </div>
                                    <?php
                                    }
                                }
                                else
                                {
                                    echo '<h3 align="center"><img src="img/triste.png"><br>Nenhum Anunciante</h3>';
                                }
                            ?>
                        </div>
                        </section>
        				</div>
                    </div>
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