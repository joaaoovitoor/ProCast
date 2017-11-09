<?php
	class AdicionarNoticia
	{
		private $titulo;
		private $texto;
		private $categoria;
		private $lide;

		public function __construct($titulo, $texto, $categoria, $lide)
		{
			$this->titulo = $titulo;

			$this->texto = $texto;

			$this->categoria = $categoria;

			$this->lide = $lide;

		}

		public function Publicar()
		{
 			include('conexao.php');
			 
			$foto = $_FILES["foto"];//$_FILES USADO para envio de arquivos armazena tudo do arquivo
			$tamanho = $_FILES["foto"]["size"];// size tamanho do arquivo 
			$arquivo = 1024000; // 1 MEGA 

			if (!empty($foto["name"])) // se o campo da  foto nao estiver vazia
			{
				// pegando largura e altura da imagem 
				$dimensoes = getimagesize($foto["tmp_name"]);// tmp_name e onde a foto ta no PC do usuario
				$largura = 1200;// largura padrao em pixels
				$altura = 800;// altura 
				if(!preg_match('/^image\/(?:gif|bmp|png|jpg|jpeg)$/i', $dimensoes['mime']))// mime nome da imagem e extensao 
				// preg_match filtra so que eu preciso nesse caso so as extensoes 
			{
				echo('<script>window.alert("Tipo de imagem incorreto...");window.location="cadastro.php";</script>');
				exit;//usado para interromper o script 
			}

			if ($tamanho > $arquivo)
			{	
				// se o tamanho da imagem for maior que 1 MB
				echo('<script>window.alert("Excedeu o tamanho max do arquivo...");window.location="cadastro.php";</script>');
				exit;
			}


			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);// $ext guarda extensao do arquivo pega somente a extensao da variavel

			$nome_imagem = md5(uniqid(""))."." . $ext[1]; // uniquid embaralha  o nome da imagem aleatoriamente em questao de miliegundos

			$caminho_imagem = "uploads/" . $nome_imagem;// pasta onde vai ficar as imagens

			move_uploaded_file($foto["tmp_name"], $caminho_imagem);// movendo a imagem do PC do usuario para pasta do servidor

			echo('<script>window.alert("Cadastrado com sucesso...");window.location="gerenciamento_noticias.php";</script>');
			}
			else // se 	ESTIVER vazio o campo foto 
			{
				echo('<script>window.alert("Preencha os campos...");window.location="gerenciamento_noticias.php";</script>');
			}


            $sqlin='INSERT INTO noticia(titulo,lide,texto,imagem_noticia,data,categoria)VALUES ("'.$this->titulo.'","'.$this->lide.'","'.$this->texto.'","'.$nome_imagem.'","'.date("y.m.d").'","'.$this->categoria.'");';

       		 mysqli_query($conexao,$sqlin);
 
		}
	}
	
	$titulo = $_POST['titulo_noticia'];
	$texto = $_POST['noticia'];
	$categoria = $_POST['categoria'];
	$lide = $_POST['lide'];

	$p1 = new AdicionarNoticia($titulo,$texto,$categoria,$lide);
	$p1->Publicar();

	

?>