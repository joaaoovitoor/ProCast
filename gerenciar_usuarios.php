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
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/clubes.css">
        <link rel="stylesheet" type="text/css" href="css/perso.css">
	</head>
	<body>
		<section>
			<div class="container-fluid">
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
							    <input type="text" class="form-control input-lg" placeholder="Digite o nome do clube aqui" name="pesquisa_clube">
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
					<div class="col-md-offset-1 col-md-3">
                        <ul class="list-group">
                                <?php
                                	
									//dados dos usuário	
                                    $sql_usuario='SELECT * FROM usuario, anunciante;';
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
                                                $sql_dados='SELECT * FROM usuario';
                                                $resul_dados=mysqli_query($conexao,$sql_dados);
                                                $consulta=mysqli_fetch_array($resul_dados);
                                                echo '<li class="list-group-item active"><center><img src="uploads/'. $consulta['foto_perfil'].'" class="img-den"></center></li>';
                                                echo '<li class="list-group-item fundo">Nome: '.$consulta['nome'], $consulta['sobrenome'].'</li>';
                                                echo '<li class="list-group-item fundo">Tipo de usuário: Jogador</li>';
                                                echo '<li class="list-group-item fundo">Nick: '. $consulta['nick'].'</li>';
                                                echo '<li class="list-group-item fundo">CPF: '. $consulta['cpf'].'</li>';
                                                echo '<li class="list-group-item fundo">E-mail: '. $consulta['email'].'</li>';
                                                echo '<li class="list-group-item fundo">Telefone: '. $consulta['telefone'].'</li>';
                                                echo '<li class="list-group-item fundo">Estado: '. $con_estado['nome'].'</li>';
                                                echo '<li class="list-group-item fundo">Cidade: '. $con_cidade['nome'].'</li>';
                                                    
                                            }elseif($con_usuario['categoria_usuario']==2){
                                                //puxar informações do investidor    
                                                $sql_dados='SELECT * FROM usuario';
                                                $resul_dados=mysqli_query($conexao,$sql_dados);
                                                $consulta=mysqli_fetch_array($resul_dados);
                                                echo '<li class="list-group-item active"><center><img src="uploads/'. $consulta['foto_perfil'].'" class="img-den"></center></li>';
                                                echo '<li class="list-group-item fundo">Nome: '.$consulta['nome'], $consulta['sobrenome'].'</li>';
                                                echo '<li class="list-group-item fundo">Tipo de usuário: Investidor</li>';
                                                echo '<li class="list-group-item fundo">CNPJ: '. $consulta['cnpj'].'</li>';
                                                echo '<li class="list-group-item fundo">CPF: '. $consulta['cpf'].'</li>';
                                                echo '<li class="list-group-item fundo">E-mail: '. $consulta['email'].'</li>';
                                                echo '<li class="list-group-item fundo">Telefone: '. $consulta['telefone'].'</li>';
                                                echo '<li class="list-group-item fundo">Estado: '. $con_estado['nome'].'</li>';
                                                echo '<li class="list-group-item fundo">Cidade: '. $con_cidade['nome'].'</li>';
                                            }else{
                                                //se não houver categoria ele é um anunciante
                                                $sql_dados='SELECT * FROM anunciante';
                                                $resul_dados=mysqli_query($conexao,$sql_dados);
                                                $consulta=mysqli_fetch_array($resul_dados);
                                                echo '<li class="list-group-item active"><center><img src="img/fotinha.png" class="img-den"></center></li>';
                                                echo '<li class="list-group-item fundo">Nome: '.$consulta['nome'], $consulta['sobrenome'].'</li>';
                                                echo '<li class="list-group-item fundo">Tipo de usuário: Anunciante</li>';
                                                echo '<li class="list-group-item fundo">CNPJ: '. $consulta['cnpj'].'</li>';
                                                echo '<li class="list-group-item fundo">Nome da empresa: '. $consulta['empresa'].'</li>';
                                                echo '<li class="list-group-item fundo">CPF: '. $consulta['cpf'].'</li>';
                                                echo '<li class="list-group-item fundo">E-mail: '. $consulta['email'].'</li>';
                                                echo '<li class="list-group-item fundo">Telefone: '. $consulta['telefone'].'</li>';
                                                echo '<li class="list-group-item fundo">Estado: '. $con_estado['nome'].'</li>';
                                                echo '<li class="list-group-item fundo">Cidade: '. $con_cidade['nome'].'</li>';
                                            }    
                                ?>
                                <li class="list-group-item"><center>
                                    <p><a href="contatos.php" class="btn btn-default" role="button">Contatar</a> <a href="#" class="btn btn-danger" role="button">Banir</a></p>
                                </center></li>
                                <?php
                                        }
                                    }
                                    else
                                    {
                                        echo '<h3 align="center"><img src="img/triste.png"><br>Nenhum Usuário</h3>';
                                    }
                                ?>
                        </ul>
                    </div>
				</div>
			</div>
		</section>
<?php 
	include("rodapeadm.html");
?>
	</body>
</html>