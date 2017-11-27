<?php
	class AdicionarCategoria
	{
		private $nome;
		private $descri;

		public function __construct($nome, $descri)
		{
			$this->nome = $nome;

			$this->descri = $descri;
		}

		public function Cadastrar()
		{
			$con = mysqli_connect('localhost','root','','dbprocast');
			$insere = "INSERT INTO categoria_noticia(categoria_noticia,descri) VALUES('".$this->nome."','".$this->descri."');";
			if(mysqli_query($con,$insere))
			{
				echo ('<script>window.alert("Categoria criada!");</script>');
			}
		}
	}


	$nome = $_POST['nome'];
	$descri = $_POST['descri'];

	$p1 = new AdicionarCategoria($nome,$descri);
	$p1->Cadastrar();
	header('LOCATION:gerenciamento_noticias.php');

?>