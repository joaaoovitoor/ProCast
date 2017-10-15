<?php
	include('verificar_logado.php');
    if($con['categoria_usuario']==1)
    {
    	header('location:perfil_jogador.php');
    }
?>
<html lang="pt-br">
	<head>
        <title>Perfil</title>
        <meta charset="utf-8">
	    <!--MENU PERFIL-->
	    <link rel="stylesheet" type="text/css" href="css/perfil/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/perfil/tabstyles.css" />
  		<script src="js/modernizr.custom.js"></script>
  		<!--ESTILO PERFIL-->
  		<link rel="stylesheet" href="css/perfil/perfil.css">
  		<script src="js/bootstrap.js"></script>
	    <script src="js/jquery.js"></script>
		<?php
			include('link_head.html');
		?>
	</head>
	<body>
	<?php
        include('menu2.php');
    ?>
	<div class="banner-perfil banner">
		<div class="container-fluid">
			<div class="row">
				<!-- CARD COM INFORMAÇÕES - GRANDE -->
				<div class="col-md-offset-0 col-md-5 hidden-sm hidden-xs">
			        <div class="cartao-grande spc-cartao">
			            <img src="img/perfil_icon.png" class="img-circle">
			            <div class="row">
			                <div class="col-md-1"></div>
			                <div class="col-md-10">
			                    <div class="informacoes">
			                        Nome <br><?php echo $con['nome'];?>
			                    </div>
			                </div>
			            </div>
			            <div class="clube-cartao">
			                <div class="row">
			                    <div class="col-sm-6">
			                        <span class="coach-name"><p>Clube</p></span>
			                        <span class="coach-job"><p>Red Canids</p></span>
			                    </div>
			                    <div class="col-sm-6">
			                        <img src="img/logo_redcanids.png" width="100">
			                    </div>
			                </div>
			            </div>
			            <div class="descricao">
		                    <p><strong>Sobre mim:</strong>
		                    <?php
		                    if($con['descricao']==NULL){
								echo 'Crie uma descrição<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>';
							}else{
		                    	echo $con['descricao'];
							}
		                    ?>
		                    </p> 
			            </div>
			        </div>
				</div>
				<!-- CARD COM INFORMAÇÕES - PEQUENO -->
				<div class="hidden-md hidden-lg">
					<div class="cartao">
					 <img src="img/perfil_icon.png" class="img-circle">
                        <p>Nome: <?php echo $con['nome'];?> </p>
                        <p>Clube: Red Canids</p>
		                <p>SOBRE MIM:
		                <?php
		                    if($con['descricao']==NULL){
								echo 'Crie uma descrição<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>';
							}else{
		                    	echo $con['descricao'];
							}
	                    ?>
		                </p>
		            </div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<!-- MENU -->
			<div class="col-md-7">
			<section><div class="tabs tabs-style-linebox">
				<nav>
					<ul>
						<li><a href="#1"><span>Jogadores</span></a></li>
						<li><a href="#2"><span>Clube</span></a></li>
						<li><a href="#3"><span>Agenda</span></a></li>
						<li><a href="#4"><span>Mensagens</span></a></li>
						<li><a href="#5"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
					</ul>
				</nav>
				<div class="content-wrap">
				<!--MENU - JOGADORES-->
				<section id="1">
					<?php 
					$sqlclube='SELECT * FROM clube WHERE id_usuario='.$con['id_usuario'].';';
					$resulclube = mysqli_query($conexao,$sqlclube);
					$dados=mysqli_fetch_array($resulclube);
					$rows=mysqli_num_rows($resulclube);
					$dataexplode = explode("-",$dados['dta_criacao']);
					$cont=2;
					for($i=0;$i<3;$i++)
					{
						$datainv[$i]=$dataexplode[$cont];
						$cont--;
					}
					$datacerto=implode("/", $datainv);
					if($rows>0)
					{
						echo "Jogadores do seu clube:";
						for($v=0;$v<$rows;$v++){ 
						?>
			            <div class="cartao-equipe">
			                <div class="media">
			                    <div class="media-left">
			                        <img class="media-object img-circle profile-img" src="img/fotinha.png">
			                        <button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</button>
			                    </div>
			                    <div class="media-body">
			                        <h3 class="media-heading">Nick carinha</h3>
			                        <h5>Nome carinha</h5>
			                        <p>Função primária: Atirador</p>
			                        <p>Função primária: Meio</p> 
			                        <p>Posição: Alguma coisa</p>
			                    </div>
			                </div>
			            </div>
			        <?php 
			    		}
					}
					else{
						echo 'Você ainda não criou seu clube! <a href="criar_clube.php">Crie seu clube!</a>';
					}
					?>
				</section>
				<!--MENU - CLUBE-->
				<section id="2">
					<div class="cartao-equipe cinza">
					  <img src="uploads/<?php echo($dados['logo_clube']); ?>">
				      <h2><?php echo($dados['nome_clube']); ?></h2>
				      <?php echo($dados['descricao_clube']); ?><br>
				      <small class="text-muted">Data de criação: <?php echo($datacerto); ?></small>
		            </div>
				</section>
				<!--MENU - AGENDA-->
				<section id="3">
					<div class="cartao-equipe">
		                <div class="media">
		                    <div class="media-left">
		                        <blockquote>
									<h5>Autor: <a href="#">Alguém</a></h5>
									<p>Dia: 05/04/2017</p>
									<p>Horário: 17:30</p>
								</blockquote>
		                    </div>
		                    <div class="media-body">
		                        <h3>Título do Evento</h3>
		                        <h4>Descrição: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
		                        </h4>
		                    </div>
		                </div>
		            </div>   
				</section>
				<!--MENU - MENSAGEM-->
				<section id="4">
					<div class="message-item" id="m16">
						<div class="message-inner">
							<div class="message-head clearfix">
								<div class="avatar pull-left"><img src="img/perfil_icon.png" class="img-circle" width="40px"></div>
								<div class="user-detail">
									<h5 class="handle">Nome do carinha</h5>
									<div class="post-meta">
										<div class="asker-meta">
											<span class="qa-message-what"></span>
											<span class="qa-message-when">
												<span class="qa-message-when-data">Dia 20/08/2017</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="qa-message-content">
								Oi, tudo bom?
							</div>
						</div>
					</div>
					<!--Fim da mensagem-->
					<!--Início da mensagem-->
					<div class="message-item" id="m16">
						<div class="message-inner">
							<div class="message-head clearfix">
								<div class="avatar pull-left"><img src="img/perfil_icon.png" class="img-circle" width="40px"></div>
								<div class="user-detail">
									<h5 class="handle">Nome do carinha</h5>
									<div class="post-meta">
										<div class="asker-meta">
											<span class="qa-message-what"></span>
											<span class="qa-message-when">
												<span class="qa-message-when-data">Dia 20/08/2017</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="qa-message-content">
								Beleza?
							</div>
						</div>
					</div>
					<!--Fim da mensagem-->
					<!--Início da mensagem-->
					<div class="message-item" id="m16">
						<div class="message-inner">
							<div class="message-head clearfix">
								<div class="avatar pull-left"><img src="img/perfil_icon.png" class="img-circle" width="40px"></div>
								<div class="user-detail">
									<h5 class="handle">Nome do carinha</h5>
									<div class="post-meta">
										<div class="asker-meta">
											<span class="qa-message-what"></span>
											<span class="qa-message-when">
												<span class="qa-message-when-data">Dia 20/08/2017</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="qa-message-content">
								Eai?
							</div>
						</div>
					</div>
					<!--Fim da mensagem-->
				</section>
				<!--MENU - ALTERAR-->
				<section id="5">
				    <!--Formulário para alterar-->
					<form action="#" method="post">
						<input type="hidden" class="validate" name="id_usuario" value="<?php echo($con['id_usuario']);?>">
						<div class="col-md-6">
							<div class="form-group">
								Nome <input type="text" class="form-control" name="nome_edt" value="<?php echo $con['nome'];?>" maxlength="15">
							</div>
							<div class="form-group">
								Sobrenome <input type="text" class="form-control" name="sobrenome_edt"  maxlength="15" value="<?php echo $con['sobrenome'];?>">
							</div>
							<div class="form-group">
								E-mail <input type="text" class="form-control" name="email_edt" maxlength="15" value="<?php echo $con['email'];?>">
							</div>
							<div class="form-group">
								Senha <input type="password" name="senha_edt" maxlength="25" class="form-control" value="<?php echo base64_decode($con['senha']);?>">
							</div>
							<div class="form-group">
								Estado
								<select name="estado_edt" class="form-control">
									<option <?php if($con['estado']=='ac'){echo 'selected';}?> value="ac">Acre</option>
									<option <?php if($con['estado']=='al'){echo 'selected';}?> value="al">Alagoas</option> 
									<option <?php if($con['estado']=='am'){echo 'selected';}?> value="am">Amazonas</option> 
									<option <?php if($con['estado']=='ap'){echo 'selected';}?> value="ap">Amapá</option> 
									<option <?php if($con['estado']=='ba'){echo 'selected';}?> value="ba">Bahia</option> 
									<option <?php if($con['estado']=='ce'){echo 'selected';}?> value="ce">Ceará</option> 
									<option <?php if($con['estado']=='df'){echo 'selected';}?> value="df">Distrito Federal</option> 
									<option <?php if($con['estado']=='es'){echo 'selected';}?> value="es">Espírito Santo</option> 
									<option <?php if($con['estado']=='go'){echo 'selected';}?> value="go">Goiás</option> 
									<option <?php if($con['estado']=='ma'){echo 'selected';}?> value="ma">Maranhão</option> 
									<option <?php if($con['estado']=='mt'){echo 'selected';}?> value="mt">Mato Grosso</option> 
									<option <?php if($con['estado']=='ms'){echo 'selected';}?> value="ms">Mato Grosso do Sul</option> 
									<option <?php if($con['estado']=='mg'){echo 'selected';}?> value="mg">Minas Gerais</option> 
									<option <?php if($con['estado']=='pa'){echo 'selected';}?> value="pa">Pará</option> 
									<option <?php if($con['estado']=='pb'){echo 'selected';}?> value="pb">Paraíba</option> 
									<option <?php if($con['estado']=='pr'){echo 'selected';}?> value="pr">Paraná</option> 
									<option <?php if($con['estado']=='pe'){echo 'selected';}?> value="pe">Pernambuco</option> 
									<option <?php if($con['estado']=='pi'){echo 'selected';}?> value="pi">Piauí</option> 
									<option <?php if($con['estado']=='rj'){echo 'selected';}?> value="rj">Rio de Janeiro</option> 
									<option <?php if($con['estado']=='rn'){echo 'selected';}?> value="rn">Rio Grande do Norte</option> 
									<option <?php if($con['estado']=='ro'){echo 'selected';}?> value="ro">Rondônia</option> 
									<option <?php if($con['estado']=='rs'){echo 'selected';}?> value="rs">Rio Grande do Sul</option> 
									<option <?php if($con['estado']=='rr'){echo 'selected';}?> value="rr">Roraima</option> 
									<option <?php if($con['estado']=='sc'){echo 'selected';}?> value="sc">Santa Catarina</option> 
									<option <?php if($con['estado']=='se'){echo 'selected';}?> value="se">Sergipe</option> 
									<option <?php if($con['estado']=='sp'){echo 'selected';}?> value="sp">São Paulo</option> 
									<option <?php if($con['estado']=='to'){echo 'selected';}?> value="to">Tocantins</option> 
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								Sexo <input type="text" class="form-control" value=
								"<?php 
									if ($con['sexo']=='f'){
										echo 'Feminino';
									}else{
										echo 'Masculino';
									}
								?>"
								readonly>
							</div>
							<div class="form-group">
								CPF <input type="text" class="form-control" value="<?php echo $con['cpf'];?>" readonly>
							</div>
							<div class="form-group">
								CNPJ <input type="text" class="form-control" value="<?php echo $con['cnpj'];?>" <?php if ($con['cnpj']=="nao_declarado"){}else echo " readonly"; ?>>
							</div>
							<div class="form-group">
								Data de nascimento<input type="text" class="form-control" value="<?php echo $con['dta_nascimento'];?>" readonly>
							</div>
							<div class="form-group">
								Telefone <input type="text" class="form-control" name="telefone_edt" value="<?php echo $con['telefone'];?>" id="telefone">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
				                Sobre mim
				                <textarea class="form-control" rows="3" placeholder="Descreva sobre você" name="descricao_edt" maxlength="200"><?php echo $con['descricao'];?></textarea>
				            </div>
							<input class="form-control azul" type="submit" name="editar" value="Editar"><br>
						</div>
					</form>
						<div class="col-md-12">
							<input class="form-control azul" type="submit" name="excluir" value="Excluir" data-toggle="modal" data-target="#confirmar" >
						</div>
						
						<!--Confirmar excluir-->
						<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Confirmar exclusão</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <form action="#" method="post">
							    <div class="modal-body">
							    	E-mail <input type="text" class="form-control" name="email_verificacao" value="<?php echo $con['email'];?>" id="telefone">
									Senha <input type="password" name="senha_verificacao" placeholder="Senha" maxlength="25" class="form-control">
							    </div>
						    	<div class="modal-footer">
                                    <input class="form-control" type="submit" name="confirmar" value="Confirmar">
						      	</div>
						      </form>
						      <!--Excluir-->
								<?php
									if(isset($_POST['confirmar']))
									{
								    	$sqlsel=('SELECT email,senha FROM usuario WHERE email="'.$email_usuario.'" ;');
										$email_verificacao=$_POST['email_verificacao'];
										$senha_verificacao=base64_decode($_POST['senha_verificacao']);
										if($email_verificacao==$con['email'] && $senha_verificacao==$con['senha']){
											header ('excluir.php');
										}else{
										}
										$resul=mysqli_query($conexao,$sqlsel);
										$con=mysqli_fetch_array($resul);
									}
							    ?>
						    </div>
						  </div>
						</div>
					<!--Excluir conta-->
					<!--Editar informações-->
					<?php
						if(isset($_POST['editar']))
						{
							//resgata
							$id_usuario=$_POST['id_usuario'];
							$nome=$_POST['nome_edt'];
							$sobrenome=$_POST['sobrenome_edt'];
							$senha=base64_encode($_POST['senha_edt']);
							$email=$_POST['email_edt'];
							$estado=$_POST['estado_edt'];
							$telefone=$_POST['telefone_edt'];
							$descricao=$_POST['descricao_edt'];
							//edita
							$sqledt=('UPDATE usuario set nome="'.$nome.'", sobrenome="'.$sobrenome.'", senha="'.$senha.'", email="'.$email.'", estado="'.$estado.'", telefone="'.$telefone.'", descricao="'.$descricao.'" WHERE email="'.$email_usuario.'" ;');
							$editado=mysqli_query($conexao,$sqledt);
							if($editado)
							{
								echo ('<script>window.alert("Dados alterados com sucesso!");window.location.href="perfil_investidor.php";</script>');
							}
							else
							{	
								echo ('<script>window.alert("Erro ao Editar Dados!");window.location.href="perfil_investidor.php";</script>');
							}
						}
					?>
				</section>
				</div>
			</div></section>
			</div>
		</div>
	</div>
	<?php
		include('rodape.html');
	?>
	<!--Validação-->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <!--Modal-->
    <script>
	    $('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').focus()
		})
	</script>
	<!-- Menu perfil -->
	<script src="js/cbpFWTabs.js"></script>
	<script>
	(function() {

	[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
		new CBPFWTabs( el );
	});

	})();
	</script>
    </body>
</html>