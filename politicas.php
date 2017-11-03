<?php
    ob_start();
    session_start();
    if(isset($_SESSION['email'])){
        $email_usuario=$_SESSION['email'];
        include('conexao.php');
        //verificando se ele é usuário
        $sqlsel='select * from usuario where email="'.$email_usuario.'";';
        $resul=mysqli_query($conexao,$sqlsel);
        if(mysqli_num_rows($resul)>0)
        {
        	header("location: destruir.php");
        }
        //se ele realmente for anunciante, cairá neste else
        else
        {
	        $sqlsel='select * from anunciante where email="'.$email_usuario.'";';
	        $resul=mysqli_query($conexao,$sqlsel);
	        $con=mysqli_fetch_array($resul);
	    }
    }
    else{
        header('location:destruir.php');    
    }
?>
<html lang="pt-br">
	<head>
        <title>Políticas</title>
        <meta charset="utf-8">
  		<!--ESTILO-->
  		<link rel="stylesheet" href="css/anunciante.css">
  		<script src="js/bootstrap.js"></script>
	    <script src="js/jquery.js"></script>
	    <script src="js/pesq_cidade.js"></script>
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
	   <?php
			include('menu_anunciante.php');
		?>
		<div class="banner politica">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center  fonte_branca texto_sombra"><strong>Políticas de Anúncio</strong></h1> 
                    <p class="text-center  fonte_branca texto_sombra">
                	Leia atentamente antes de anunciar, <br>em caso de dúvidas contatar os administradores.
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-offset-1 col-md-10">
        			<h2><strong>1. Visão geral</strong></h2>
					<h4>Conhecendo nossas políticas</h4>
					<p>
						Nossas Políticas de Publicidade dão instruções sobre os tipos de conteúdo de publicidade permitidos. Quando os anunciantes fazem um pedido, cada anúncio é analisado segundo essas políticas. Se você acredita que seu anúncio foi reprovado por engano, <a href="contato.php">fale conosco</a>.
					</p>
					<h2><strong>2. O processo de análise de anúncio</strong></h2>
					<p>
						Antes de os anúncios serem publicados, eles são analisados para garantir que seguem nossas Políticas de Publicidade. Normalmente, a maioria dos anúncios são analisados em até 72 horas, embora em alguns casos possa demorar mais.
					</p>
					<h4>O que examinamos</h4>
					<p>
						Durante o processo de análise do anúncio, verificaremos as imagens, o texto e conteúdo na página de destino dele. Seu anúncio poderá não ser aprovado se o conteúdo da página de destino não estiver funcionando totalmente, não corresponder ao produto/serviço promovido no anúncio ou não estiver totalmente de acordo com nossas Políticas de Publicidade.
					</p>
					<h4>O que ocorre depois que o anúncio é analisado?</h4>
					<p>	
						Depois que o seu anúncio é analisado, você receberá uma notificação informando se o seu anúncio foi aprovado. Caso seja aprovado, vamos iniciar a veiculação do anúncio.
					</p>
					<h2><strong>3. Etapas a seguir se o anúncio for reprovado</strong></h2>
					<h4>Editar seu anúncio</h4>
					<p>
						Se seu anúncio não for aprovado ou não estiver totalmente de acordo com nossas políticas, você poderá  reenviá-lo para análise. 
					</p>
					<h4>Contestar a decisão</h4>
					<p> 
						Se você considerar um erro a reprovação de seu anúncio, conteste a decisão clicando <a href="contato.php">aqui</a>.
					</p>
					<h2><strong>4. Conteúdo proibido</strong></h2>
					<h4>1. Padrões da Comunidade</h4>
					<p>
						Os anúncios não deverão violar os nossos Padrões da Comunidade. 
					</p>
					<h4>2. Produtos ou serviços ilegais</h4>
					<p>
						Os anúncios não deverão constituir, facilitar ou promover produtos, serviços ou atividades ilegais. Os anúncios direcionados a menores não deverão promover produtos, serviços ou conteúdos que sejam inapropriados, ilegais ou inseguros, ou que explorem, enganem ou exerçam pressão sobre as faixas etárias direcionadas.
					</p>
					<h4>3. Práticas discriminatórias</h4>
					<p>
					Os anúncios não devem discriminar ou incentivar a discriminação contra pessoas com base em atributos pessoais como raça, etnia, cor, nacionalidade, religião, idade, sexo, orientação sexual, identidade de gênero, situação familiar, deficiência, condição genética ou de saúde.
					</p>
					<h4>4. Produtos de tabaco</h4>
					<p>
						Anúncios não podem promover a venda ou uso de produtos de tabaco ou equipamentos relacionados.
					</p>
					<h4>5. Bebidas, drogas e produtos relacionados com drogas</h4>
					<p>
						Os anúncios não promoverão a venda ou uso de drogas recreativas, medicamentosas ou ilegais.
					</p>
					<h4>6. Armas, munições ou explosivos</h4>
					<p>
						Os anúncios não promoverão a venda ou uso de armas, munição ou explosivos.
					</p>
					<h4>7. Produtos ou serviços para público adulto</h4>
					<p>
						Os anúncios não devem promover a venda ou uso de produtos ou serviços adultos.<br>Os anúncios não devem incluir conteúdo adulto. Isso abrange nudez, pessoas em posições explícitas ou sugestivas, ou atividades muito sugestivas ou sexualmente provocativas.
					</p>
					<h4>8. Infração de terceiros</h4>
					<p>
						Os anúncios não devem conter conteúdo que infrinja ou viola os direitos de terceiros, incluindo direitos autorais, marca comercial, privacidade, publicidade ou direitos pessoais ou de propriedade. Para denunciar o conteúdo que possa violar seus direitos, confira estes detalhes.
					</p>
					<h4>9. Conteúdo sensacionalista</h4>
					<p>
						Os anúncios não poderão apresentar conteúdo chocante, sensacionalista, desrespeitoso ou excessivamente violento.
					</p>
					<h4>10. Atributos pessoais</h4>
					<p>
						Os anúncios não devem incluir conteúdo que declare ou sugira atributos pessoais. Isso abrange afirmações ou sugestões diretas ou indiretas quanto à raça, origem étnica, religião, crença, idade, orientação ou práticas sexuais, identidade de gênero, deficiência, condições médicas (sejam de origem física ou mental), situação financeira, associação a sindicato, antecedentes criminais ou nome da pessoa.
					</p>
					<h4>11. Conteúdo falso ou enganoso</h4>
					<p>
						Os anúncios não apresentarão conteúdo enganoso, falso ou ilusório, inclusive afirmações, ofertas ou práticas comerciais falsas.
					</p>
					<h4>12. Conteúdo controverso</h4>
					<p>
						Os anúncios não apresentarão conteúdo que explore questões políticas ou sociais controversas para fins comerciais.
					</p>
					<h4>13. Páginas de destino que não funcionem</h4>
					<p>
						Os anúncios não devem direcionar as pessoas a páginas de destino não funcionais. Isso abrange o conteúdo de páginas de destino que interfira na capacidade de a pessoa sair da página.
					</p>
					<h4>14. Gramática e linguagem ofensiva</h4>
					<p>
						Os anúncios não devem conter linguagem ofensiva ou gramática e pontuação ruins. Os símbolos, números e letras devem ser usados de forma adequada.
					</p>
					<h4>15. Documentos falsos</h4>
					<p>
						Os anúncios não podem promover documentos falsos, como diplomas, passaportes ou documentos de imigração falsificados.
					</p>
					<h4>16. Conteúdo de baixa qualidade ou perturbador</h4>
					<p>
						O anúncio não deve incluir conteúdo que leve a páginas de destino que fornecem uma experiência perturbadora ou inesperada. Isso inclui anúncios enganosos, como cabeçalhos sensacionalistas, e levar as pessoas a páginas de destino que contenham conteúdo original mínimo e uma maioria de conteúdo não relacionado ou de baixa qualidade.
					</p>
					<h4>17. Spyware ou malware</h4>
					<p>
						Os anúncios não poderão conter spyware, malware ou qualquer outro software que resulte em uma experiência inesperada ou enganosa para o usuário. Isso abrange links para sites que contenham esses produtos.
					</p>
					<h4>18. Encontros e jogos de azar</h4>
					<p>
						É estreitamente proibido anúncios de serviços de encontros e anúncios que promovam ou facilitem jogos de azar online.
					</p>
					<h2><strong>4. Posicionamento</strong></h2>
					<h4>1. Relevância</h4>
					<p>
						Todos os componentes de um anúncio, incluindo textos, imagens ou outras mídias, devem ser relevantes e adequados ao produto ou serviço oferecido e ao público que verá o anúncio.
					</p>
					<h4>2. Precisão</h4>
					<p>
						Anúncios devem representar claramente a empresa, o produto, o serviço ou a marca que está sendo anunciada.
					</p>
					<h4>3. Páginas de destino relacionadas</h4>
					<p>
						Os produtos e serviços promovidos no texto do anúncio deverão corresponder aos produtos promovidos na página de destino, e o site de destino não deverá oferecer ou conter links para produtos ou serviços proibidos.
					</p>
					<h2><strong>5. Coisas que você deve saber</strong></h2>
					<p>
						1. Os anunciantes são responsáveis por compreender e cumprir todas as leis e regulações cabíveis. O não cumprimento poderá resultar em uma variedade de consequências, incluindo o cancelamento de anúncios que você veiculou e o encerramento da sua conta.
					</p>
					<p>
						2. Não usamos dados pessoais confidenciais para o direcionamento de anúncios. 
					</p>
					<p>
						3. Reservamos o direito de recusar, aprovar ou remover qualquer anúncio por qualquer motivo, a nosso critério exclusivo, incluindo anúncios que afetam de maneira negativa nossa relação com os usuários ou que promovam conteúdos, serviços ou atividades contrárias a nossa posição competitiva, nossos interesses ou nossa filosofia de anúncios.
					</p>
					<p>
						4. Estas políticas estão sujeitas a alteração a qualquer momento sem aviso prévio.
					</p>
        		</div>
        	</div>
        </div>
        <?php
        	include('rodape.html');
        ?>
    </body>
</html>