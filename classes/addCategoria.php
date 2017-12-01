<?php
	class AdicionarCategoria
	{
		private $nome;
		private $descri;

		public function __construct($nome, $descri)
		{
			$this->nome = strtoupper($nome);

			$this->descri = $descri;
		}

		public function Cadastrar()
		{

			include("conexao.php");
			$sqlsel='SELECT * FROM categoria_noticia WHERE categoria_noticia="'.$this->nome.'";';
			$resul=mysqli_query($conexao,$sqlsel);
			if (mysqli_num_rows($resul)) 
			{
				echo ('<script>window.alert("Essa categoria já existe!");</script>');

			}
			else
			{
				$insere = "INSERT INTO categoria_noticia(categoria_noticia,descri) VALUES('".$this->nome."','".$this->descri."');";
				if(mysqli_query($conexao,$insere))
				{
					echo ('<script>window.alert("Categoria criada!");</script>');
					echo('<script>window.location="gerenciamento_noticias.php";</script>');
				}
			}
			

		}
	}


	$nome = $_POST['nome'];
	$descri = $_POST['descri'];

	$p1 = new AdicionarCategoria($nome,$descri);
	$p1->Cadastrar();
	header('LOCATION:gerenciamento_noticias.php');

?>