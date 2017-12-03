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
		?>
		<div class="col-md-3">
			<ul class="list-group">	
					<li class="list-group-item active"><center>
						<img src="img/teste.png" class="img-den"></center></li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nome: <?php echo($jg['nome'].' '.$jg['sobrenome']); ?></li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Motivo: <?php echo($tp['descricao_denuncia']); ?></li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Denunciado por: <?php echo($jg2['nome'].' '.$jg2['sobrenome']); ?></li>
					<li class="list-group-item fundo"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Número de denúncias:</li>
					<li class="list-group-item"><center>
						<button class="btn btn-default "><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comunicar</button>
						<button class="btn btn-default "><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Banir usuário</button>
					</center></li>
				
			</ul>
		</div>
		<?php
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