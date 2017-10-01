<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
</html>
<?php
	include('conexao.php');
    //iniciando a sessão
    session_start();
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
						echo('<script>swal("Logado com sucesso", "", "success");</script>');
						echo('<script>window.location="home.php";</script>');
						//armazenando o email na sessão para usar posteriormente, para identificar o usuário
						$_SESSION['email']=$email;
					}
					else
					{
						echo('<script>swal("Senha inválida", "", "error");</script>');
											}
				}
			}
			else
			{
				//se o email não retornar alguma linha de registro é pq ele não existe no banco
				echo('<script>swal("Email inválido", "", "error");</script>');
				
			}
		}
	}
	if (isset($_POST['enviar_jogador'])) 
	{
		$nome=$_POST['nome'];
		$sobrenome=$_POST['sobrenome'];
		$nick=$_POST['nick'];
		$funcao_1=$_POST['funcao_1'];
		$funcao_2=$_POST['funcao_2'];
		$email=$_POST['email'];
		$senha=$_POST['senha'];
		$sexo=$_POST['sexo'];
		$cpf=$_POST['cpf'];
		$estado=$_POST['estado'];
		$dta_nascimento=$_POST['dta_nascimento'];
		$telefone=$_POST['telefone'];
		$categoria_usuario=$_POST['categoria_usuario'];
		if (!empty($nome)&&!empty($sobrenome)&&!empty($nick)&&!empty($funcao_1)&&!empty($funcao_2)&&!empty($email)&&!empty($sexo)&&!empty($cpf)&&!empty($estado)&&!empty($dta_nascimento)&&!empty($telefone)&&!empty($categoria_usuario)&&!empty($senha)) 
		{
			$senha=base64_encode($senha);
			if (strlen($cpf)<11) 
			{
				echo('<script>swal("O CPF deve ter no mínimo 11 dígitos", "", "error");</script>');
				echo('<script>window.location="cadastro.php";</script>');
			}
			else
			{
				$sqlsel='select * from usuario where email="'.$email.'";';
				$resul=mysqli_query($conexao,$sqlsel);
				//verificando se já existe aquele email cadstrado,num_rows=numero de linhas, se o comando retornar alguma linha de registro é pq já há esse email cadastrado
				if(mysqli_num_rows($resul))
				{
					echo('<script>swal("Email já cadastrado", "", "error");</script>');
					echo('<script>window.location="cadastro.php";</script>');
				}
				else
				{
					$sqlsel='select * from usuario where cpf="'.$cpf.'";';
					$resul=mysqli_query($conexao,$sqlsel);
					if(mysqli_num_rows($resul))
					{
						echo('<script>swal("CPF já cadastrado", "", "error");</script>');
						echo('<script>window.location="destruir.php";</script>');
					}
					$sqlsel='select * from usuario where nick="'.$nick.'";';
					$resul=mysqli_query($conexao,$sqlsel);
					if(mysqli_num_rows($resul))
					{
						echo('<script>swal("Nick já cadastrado", "", "error");</script>');
						echo('<script>window.location="destruir.php";</script>');
					}
					else
					{
						//inserindo dados do usuario
						$sqlin='insert into usuario(nome,sobrenome,email,senha,nick,cpf,funcao_1,funcao_2,sexo,estado,dta_nascimento,telefone,categoria_usuario) values ("'.$nome.'","'.$sobrenome.'","'.$email.'","'.$senha.'","'.$nick.'","'.$cpf.'","'.$funcao_1.'","'.$funcao_2.'","'.$sexo.'","'.$estado.'","'.$dta_nascimento.'","'.$telefone.'","'.$categoria_usuario.'");';
						mysqli_query($conexao,$sqlin);
						$_SESSION['email']=$email;
				        echo('<script>swal("Cadastrado com sucesso", "", "success");</script>');
						echo('<script>window.location="home.php";</script>');
					}			
				}
			}
		}
		else{
			echo('<script>swal("Todos os campos devem ser preenchidos", "", "error");</script>');
			echo('<script>window.location="cadastro.php";</script>');
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
		$dta_nascimento=$_POST['dta_nascimento'];
		$telefone=$_POST['telefone'];
		$categoria_usuario=$_POST['categoria_usuario'];
		if(empty($cnpj))
		{
			$cnpj="nao_declarado";
		}
		if (!empty($nome)&&!empty($sobrenome)&&!empty($email)&&!empty($senha)&&!empty($sexo)&&!empty($cpf)&&!empty($estado)&&!empty($dta_nascimento)&&!empty($telefone)&&!empty($categoria_usuario)) 
		{
			$senha=base64_encode($senha);
			if (strlen($cpf)<11) 
			{
				echo('<script>swal("O CPF deve ter no mínimo 11 dígitos", "", "error");</script>');
				echo('<script>window.location="cadastro.php";</script>');
			}
			else
			{
				$sqlsel='select * from usuario where email="'.$email.'";';
				$resul=mysqli_query($conexao,$sqlsel);
				//verificando se já existe aquele email cadstrado,num_rows=numero de linhas, se o comando retornar alguma linha de registro é pq já há esse email cadastrado
				if(mysqli_num_rows($resul))
				{
					echo('<script>swal("O CPF deve ter no mínimo 11 dígitos", "", "error");</script>');
					echo('<script>window.location="cadastro.php";</script>');
				}
				else
				{
					$sqlsel='select * from usuario where cpf="'.$cpf.'";';
					$resul=mysqli_query($conexao,$sqlsel);
					if(mysqli_num_rows($resul))
					{
						echo('<script>swal("CPF já cadastrado", "", "error");</script>');
						echo('<script>window.location="destruir.php";</script>');
					}
					else
					{
						//inserindo dados do usuario
						$sqlin='insert into usuario(nome,sobrenome,email,senha,sexo,cpf,cnpj,estado,dta_nascimento,telefone,categoria_usuario) values ("'.$nome.'","'.$sobrenome.'","'.$email.'","'.$senha.'","'.$sexo.'","'.$cpf.'","'.$cnpj.'","'.$estado.'","'.$dta_nascimento.'","'.$telefone.'","'.$categoria_usuario.'");';
						mysqli_query($conexao,$sqlin);
						$_SESSION['email']=$email;
				        echo('<script>swal("Cadastrado com sucesso", "", "success");</script>');
						echo('<script>window.location="home.php";</script>');
					}			
				}
			}
		}
		else{
			echo('<script>swal("Todos os campos devem ser preenchidos", "", "error");</script>');
			echo('<script>window.location="cadastro.php";</script>');
		}
	}
?>