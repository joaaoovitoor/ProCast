<?php 
	include('verificar_admin.php');
	include("menu-admin.html");
?>
		<title>Denúncias</title>
		<meta name="viewport" content="width-device-width, initial-scale=1">
		<!-- Adicionando CSS Bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/perso.css">
		<div class="container-fluid">
			<div class="row">
						<div class="col-md-12 bg-procast titulo">
							<h1>Denúncias</h1>
						</div>
					</div>
		<br>
		<?php
			include('conexao.php');
			$sql_dn='SELECT * FROM denuncia ORDER BY data_denuncia DESC;';
			$res=mysqli_query($conexao,$sql_dn);
			if (mysqli_num_rows($res)) {
				while ($dn=mysqli_fetch_array($res)) {
					$sql_jg='SELECT * FROM usuario WHERE id_usuario='.$dn['id_usuario'].';';
					$res_jg=mysqli_query($conexao,$sql_jg);
					$jg=mysqli_fetch_array($res_jg);
					$sql_jg2='SELECT * FROM usuario WHERE id_usuario='.$dn['id_denunciante'].';';
					$res_jg2=mysqli_query($conexao,$sql_jg2);
					$jg2=mysqli_fetch_array($res_jg2);
					$sql_tp='SELECT * FROM tipo_denuncia WHERE id_tipo='.$dn['tipo_denuncia'].';';
					$res_tp=mysqli_query($conexao,$sql_tp);
					$tp=mysqli_fetch_array($res_tp);

					$sql_cf='SELECT * FROM denuncia WHERE id_usuario='.$dn['id_usuario'].';';
					$res_cf=mysqli_query($conexao,$sql_cf);
		?>
		<div class="col-md-3">
			<ul class="list-group">	
					<li class="list-group-item active"><center>
						<img src="uploads/<?php echo($jg['foto_perfil']); ?>" class="img-den"></center></li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nome: <?php echo($jg['nome'].' '.$jg['sobrenome']); ?></li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Motivo: <?php echo($tp['descricao_denuncia']); ?></li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Denunciado por: <?php echo($jg2['nome'].' '.$jg2['sobrenome']); ?></li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Número de denúncias: <?php echo(mysqli_num_rows($res_cf)); ?></li>
					<li class="list-group-item"><center>
						<a href="contatos.php?msg=<?php echo($jg['email']); ?>" class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comunicar</a>
						<a href="denuncia.php?exc=<?php echo($jg['id_usuario']); ?>" class="btn btn-default "><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir usuário</a>
					</center></li>
				
			</ul>
		</div>
		<?php
				}
			}
			if (isset($_GET['exc'])) {
				$ex=$_GET['exc'];
				$sqlex='DELETE FROM denuncia WHERE id_usuario='.$ex.';';
				mysqli_query($conexao,$sqlex);
				$sqlex='DELETE FROM comentario WHERE id_usuario='.$ex.';';
				mysqli_query($conexao,$sqlex);
				$sqlex='DELETE FROM denuncia WHERE id_usuario='.$ex.';';
				mysqli_query($conexao,$sqlex);
				$sqlex='DELETE FROM contato WHERE id_usuario='.$ex.';';
				mysqli_query($conexao,$sqlex);
				$sqlex='DELETE FROM clube WHERE id_usuario='.$ex.';';
				mysqli_query($conexao,$sqlex);
				$sqlex='DELETE FROM pagamento WHERE id_usuario='.$ex.';';
				mysqli_query($conexao,$sqlex);
				$sqlex='DELETE FROM video WHERE id_usuario='.$ex.';';
				mysqli_query($conexao,$sqlex);
				$sqlex='DELETE FROM agenda WHERE id_usuario='.$ex.';';
				mysqli_query($conexao,$sqlex);
				$sqlex='DELETE FROM mensagem WHERE id_enviar='.$ex.';';
				mysqli_query($conexao,$sqlex);
				$sqlex='DELETE FROM mensagem WHERE id_receber='.$ex.';';
				mysqli_query($conexao,$sqlex);
				$sqlex='DELETE FROM convite WHERE id_jogador='.$ex.';';
				mysqli_query($conexao,$sqlex);
				$sqlex='DELETE FROM usuario WHERE id_usuario='.$ex.';';
				$sqlex='DELETE FROM usuario WHERE id_usuario='.$ex.';';
				if (mysqli_query($conexao,$sqlex))
				{
					echo('<script>alert("Usuário excluido!");</script>');
					echo('<script>window.location="denuncia.php";</script>');
				}
			}
		?>
		</div>
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php 
	include("rodapeadm.html");
?>
	</body>
</html>