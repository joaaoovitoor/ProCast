<?php 
	include('conexao.php');
	if(isset($_POST['cad_anunciante']))
	{
		$nome=$_POST['nome'];
		$sobrenome=$_POST['sobrenome'];
		$email=$_POST['email'];
		$senha=$_POST['senha'];
		$cpf=$_POST['cpf'];
		$cnpj=$_POST['cnpj'];
		$estado=$_POST['estado'];
		$cidade=$_POST['cidade'];
		$telefone=$_POST['telefone'];
		$nome_empresa=$_POST['nome_empresa'];
		if(empty($cnpj))
		{
			$cnpj="Não informado";
		}
		if (!empty($cnpj))
		{
			$sqlsel='select * from usuario where cnpj="'.$cnpj.'";';
			$resul=mysqli_query($conexao,$sqlsel);
			if(mysqli_num_rows($resul))
			{
				echo('<script>alert("CNPJ já cadastrado!");</script>');
				echo('<script>window.location="cadastro_anunciante.php";</script>');
			}
		}

		if (!empty($nome)&&!empty($sobrenome)&&!empty($email)&&!empty($senha)&&!empty($cpf)&&!empty($cpf)&&!empty($estado)&&!empty($telefone)&&!empty($nome_empresa)&&!empty($cidade)) 
		{
			$senha=base64_encode($senha);
			if (strlen($cpf)<14) 
			{
				echo('<script>alert("O CPF deve ter 11 dígitos!");</script>');
				echo('<script>window.location="cadastro_anunciante.php";</script>');
			}
			else
			{
				$sqlsel='select * from anunciante where email="'.$email.'";';
				$resul=mysqli_query($conexao,$sqlsel);
				//verificando se já existe aquele email cadstrado,num_rows=numero de linhas, se o comando retornar alguma linha de registro é pq já há esse email cadastrado
				if(mysqli_num_rows($resul))
				{
					echo('<script>alert("Email já cadastrado!");</script>');
					echo('<script>window.location="cadastro_anunciante.php";</script>');
				}
				else
				{
					$sqlsel='select * from anunciante where cpf="'.$cpf.'";';
					$resul=mysqli_query($conexao,$sqlsel);
					if(mysqli_num_rows($resul))
					{
						echo('<script>alert("CPF já cadastrado!");</script>');
						echo('<script>window.location="cadastro.php";</script>');
					}
					else
					{
						//inserindo dados do usuario
						$sqlin='insert into anunciante(dta_criacao_conta,nome_anunciante,sobrenome,email,senha,cpf,cnpj,estado,cidade,telefone,nome_empresa) values (NOW(),"'.$nome.'","'.$sobrenome.'","'.$email.'","'.$senha.'","'.$cpf.'","'.$cnpj.'","'.$estado.'","'.$cidade.'","'.$telefone.'","'.$nome_empresa.'");';
						$inserir=mysqli_query($conexao,$sqlin);
						//iniciando a sessão
				        if($inserir)
						{
							session_start();
							$_SESSION['email']=$email;
					        echo('<script>alert("Cadastrado com sucesso");</script>');
							echo('<script>window.location="anuncio.php";</script>');
						}
						else
						{
							echo('<script>alert("Erro no cadastro!");</script>');
							echo('<script>window.location="cadastro_anunciante.php";</script>');
						}
					}			
				}
			}
		}
		else{
			echo('<script>alert("Todos os campos devem ser preenchidos!");</script>');
			echo('<script>window.location="cadastro_anunciante.php";</script>');
		}

	}
	if(isset($_POST['log_anunciante']))
	{
		$email=$_POST['usuario'];
        $senha=$_POST['senha'];
        $senha=base64_encode($senha);
        if(!empty($email)&&!empty($senha))
        {
        	//resgatando a senha correspondente ao email digitado
	        $sqlsel='select * from anunciante where email="'.$email.'";';
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
						echo('<script>window.location="anuncio.php";</script>');
					}
					else
					{
						echo('<script>alert("Senha inválida");</script>');
						echo('<script>window.location="cadastro_anunciante.php";</script>');
					}
				}
			}
			else
			{
				//se o email não retornar alguma linha de registro é pq ele não existe no banco
				echo('<script>alert("Email inválido");</script>');
				echo('<script>window.location="cadastro_anunciante.php";</script>');
				
			}
		}
	}
?>