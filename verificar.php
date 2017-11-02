<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
	</head>
</html>
<?php
	include('conexao.php');
    //botão logar do formuário de login da página index
    if (isset($_POST['logar'])){
        $email=$_POST['usuario'];
        $senha=$_POST['senha'];
        $senha=base64_encode($senha);
        if(!empty($email)&&!empty($senha))
        {
        	//resgatando a senha correspondente ao email digitado
	        $sqlsel='select senha from usuario where email="'.$email.'";';
			$resul=mysqli_query($conexao,$sqlsel);
			if(mysqli_num_rows($resul))
			{
				//se o email retornar alguma linha de registro (essa linha está contendo a senha) é pq ele existe
				while ($con=mysqli_fetch_array($resul)) 
				{
					//comparando a senha do login com a senha do banco
					if($senha==$con['senha'])
					{
						//iniciando a sessão
    					session_start();
						//armazenando o email na sessão para usar posteriormente, para identificar o usuário
						$_SESSION['email']=$email;
						echo('<script>alert("Logado com sucesso!");</script>');
						echo('<script>window.location="home.php";</script>');
					}
					else
					{
						echo('<script>alert("Senha inválida");</script>');
						echo('<script>window.location="login.php";</script>');
					}
				}
			}
			else
			{
				//se o email não retornar alguma linha de registro é pq ele não existe no banco
				echo('<script>alert("Email inválido");</script>');
				echo('<script>window.location="login.php";</script>');
				
			}
		}
	}
	if (isset($_POST['enviar_jogador'])) 
	{
		$nome=$_POST['nome'];
		$sobrenome=$_POST['sobrenome'];
		$nick=$_POST['nick'];
		$apikey="RGAPI-d5c13d87-3d9a-4e48-8e94-702509d2b0b3";		
 		$nickcod = rawurlencode($nick);
 		$urljogo = @file_get_contents("https://br1.api.riotgames.com/lol/summoner/v3/summoners/by-name/$nickcod?api_key=$apikey");
 		
 		if($urljogo){
 			$retirar = array('{','"','}');
 			$urljogo = str_replace($retirar, '', $urljogo);
 			$urljogo = str_replace(',', ':', $urljogo);
 			$id_nick = explode(':',$urljogo);

 			$urlrank = @file_get_contents('https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/'.$id_nick[1].'?api_key='.$apikey.'');
 			if ($urlrank=="[]")
 			{
 				echo('<script>alert("Usuário Unranked: para se cadastrar, deve ter ranking!");</script>');
 				echo('<script>window.location="cadastro.php";</script>');
 				exit();
 			}
 		}
 		else
 		{
 			echo('<script>alert("Nick inválido: usuário inexistente!");</script>');
 			echo('<script>window.location="cadastro.php";</script>');
 		}
		$funcao_1=$_POST['funcao_1'];
		$funcao_2=$_POST['funcao_2'];
		$email=$_POST['email'];
		$senha=$_POST['senha'];
		$sexo=$_POST['sexo'];
		$cpf=$_POST['cpf'];
		$estado=$_POST['estado'];
		$cidade=$_POST['cidade'];
		$dta_nascimento=$_POST['dta_nascimento'];
		$dataexplode=explode("/",$dta_nascimento);
		$cont=2;
		for($i=0;$i<3;$i++)
		{
			$datainv[$i]=$dataexplode[$cont];
			$cont--;
		}
		$datacerto=implode("-", $datainv);
		$telefone=$_POST['telefone'];
		$categoria_usuario=$_POST['categoria_usuario'];
		if ($funcao_1==$funcao_2) {
			echo('<script>alert("As funções devem ser diferentes");</script>');
			echo('<script>window.location="cadastro.php";</script>');
			exit();
		}
		else
		{
			if (!empty($nome)&&!empty($sobrenome)&&!empty($nick)&&!empty($funcao_1)&&!empty($funcao_2)&&!empty($email)&&!empty($sexo)&&!empty($cpf)&&!empty($estado)&&!empty($datacerto)&&!empty($telefone)&&!empty($categoria_usuario)&&!empty($senha)) 
			{
				$senha=base64_encode($senha);
				if (strlen($cpf)<14) 
				{
					echo('<script>alert("O CPF deve ter 11 dígitos");</script>');
					echo('<script>window.location="cadastro.php";</script>');
					exit();
				}
				else
				{
					$sqlsel='select * from usuario where email="'.$email.'";';
					$resul=mysqli_query($conexao,$sqlsel);
					//verificando se já existe aquele email cadstrado,num_rows=numero de linhas, se o comando retornar alguma linha de registro é pq já há esse email cadastrado
					if(mysqli_num_rows($resul))
					{
						echo('<script>alert("Email já cadastrado!");</script>');
						echo('<script>window.location="cadastro.php";</script>');
						exit();
					}
					else
					{
						$sqlsel='select * from usuario where cpf="'.$cpf.'";';
						$resul=mysqli_query($conexao,$sqlsel);
						if(mysqli_num_rows($resul))
						{
							echo('<script>alert("CPF já cadastrado!");</script>');
							echo('<script>window.location="cadastro.php";</script>');
							exit();
						}
						$sqlsel='select * from usuario where nick="'.$nick.'";';
						$resul=mysqli_query($conexao,$sqlsel);
						if(mysqli_num_rows($resul))
						{
							echo('<script>alert("Nick já cadastrado!");</script>');
							echo('<script>window.location="cadastro.php";</script>');
							exit();
						}
						else
						{
							//inserindo dados do usuario
							$sqlin='insert into usuario(dta_criacao_conta,nome,sobrenome,email,senha,nick,id_nick,cpf,funcao_1,funcao_2,sexo,estado,cidade,dta_nascimento,telefone,categoria_usuario) values (NOW(),"'.$nome.'","'.$sobrenome.'","'.$email.'","'.$senha.'","'.$nick.'",'.$id_nick[1].',"'.$cpf.'","'.$funcao_1.'","'.$funcao_2.'","'.$sexo.'","'.$estado.'","'.$cidade.'","'.$datacerto.'","'.$telefone.'","'.$categoria_usuario.'");';
							$inserir=mysqli_query($conexao,$sqlin);
							//iniciando a sessão
							if($inserir)
							{
								session_start();
								$_SESSION['email']=$email;
						        echo('<script>alert("Cadastrado com sucesso");</script>');
								echo('<script>window.location="home.php";</script>');
							}
							else
							{
								echo('<script>alert("Erro no cadastro!");</script>');
								echo('<script>window.location="cadastro.php";</script>');
							}
						}			
					}
				}
			}
			else{
				echo('<script>alert("Todos os campos devem ser preenchidos!");</script>');
				echo('<script>window.location="cadastro.php";</script>');
			}
		}	
	}
	if (isset($_POST['enviar_investidor'])) 
	{
		$nome=$_POST['nome'];
		$sobrenome=$_POST['sobrenome'];
		$email=$_POST['email'];
		$senha=$_POST['senha'];
		$sexo=$_POST['sexo'];
		$cpf=$_POST['cpf'];
		$cnpj=$_POST['cnpj'];
		$estado=$_POST['estado'];
		$cidade=$_POST['cidade'];
		$dta_nascimento=$_POST['dta_nascimento'];
		$dataexplode=explode("/",$dta_nascimento);
		$cont=2;
		for($i=0;$i<3;$i++)
		{
			$datainv[$i]=$dataexplode[$cont];
			$cont--;
		}
		$datacerto=implode("-", $datainv);
		$telefone=$_POST['telefone'];
		$categoria_usuario=$_POST['categoria_usuario'];
		if(empty($cnpj))
		{
			$cnpj="Não informado";
		}
		if (!empty($nome)&&!empty($sobrenome)&&!empty($email)&&!empty($senha)&&!empty($sexo)&&!empty($cpf)&&!empty($estado)&&!empty($cidade)&&!empty($datacerto)&&!empty($telefone)&&!empty($categoria_usuario)) 
		{
			$senha=base64_encode($senha);
			if (strlen($cpf)<14) 
			{
				echo('<script>alert("O CPF deve ter 11 dígitos!");</script>');
				echo('<script>window.location="cadastro.php";</script>');
			}
			else
			{
				$sqlsel='select * from usuario where email="'.$email.'";';
				$resul=mysqli_query($conexao,$sqlsel);
				//verificando se já existe aquele email cadstrado,num_rows=numero de linhas, se o comando retornar alguma linha de registro é pq já há esse email cadastrado
				if(mysqli_num_rows($resul))
				{
					echo('<script>alert("Email já cadastrado!");</script>');
					echo('<script>window.location="cadastro.php";</script>');
				}
				else
				{
					$sqlsel='select * from usuario where cpf="'.$cpf.'";';
					$resul=mysqli_query($conexao,$sqlsel);
					if(mysqli_num_rows($resul))
					{
						echo('<script>alert("CPF já cadastrado!");</script>');
						echo('<script>window.location="cadastro.php";</script>');
					}
					else
					{
						//inserindo dados do usuario
						$sqlin='insert into usuario(dta_criacao_conta,nome,sobrenome,email,senha,sexo,cpf,cnpj,estado,cidade,dta_nascimento,telefone,categoria_usuario) values (NOW(),"'.$nome.'","'.$sobrenome.'","'.$email.'","'.$senha.'","'.$sexo.'","'.$cpf.'","'.$cnpj.'","'.$estado.'","'.$cidade.'","'.$datacerto.'","'.$telefone.'","'.$categoria_usuario.'");';
						$inserir=mysqli_query($conexao,$sqlin);
						//iniciando a sessão
				        if($inserir)
							{
								session_start();
								$_SESSION['email']=$email;
						        echo('<script>alert("Cadastrado com sucesso");</script>');
								echo('<script>window.location="home.php";</script>');
							}
							else
							{
								echo('<script>alert("Erro no cadastro!");</script>');
								echo('<script>window.location="cadastro.php";</script>');
							}
					}			
				}
			}
		}
		else{
			echo('<script>alert("Todos os campos devem ser preenchidos!");</script>');
			echo('<script>window.location="cadastro.php";</script>');
		}
	}
?>