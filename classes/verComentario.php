<?php
	include("conexao.php");
	$id_noticia = $_GET['ex'];
	$resul = mysqli_query($conexao,"SELECT * FROM comentario WHERE id_noticia = ".$id_noticia.";");

	
	while ($coment = mysqli_fetch_array($resul)) 
	{
		if($email_usuario == "admin@admin")
		{
			$user = mysqli_query($conexao, "SELECT * FROM admin WHERE id_admin = ".$coment['id_usuario']."");
		}
		else
		{
			$user = mysqli_query($conexao, "SELECT * FROM usuario WHERE id_usuario = ".$coment['id_usuario']."");
		}
		while ($usuario = mysqli_fetch_array($user)) 
		{
			?>	
			<div class="row mg_tp mg_bt">
                <div class="col-md-offset-1 col-md-1">
                    <img src=<?php echo('"uploads/'.$usuario['foto_perfil'].'"'); ?> class="perf img-circle">
                </div>
                <div class="col-md-6">
                    <h5 class="fonte_azul_claro"><strong><?php echo $usuario['nome']?></strong></h5>
                    <p>
                        <?php echo $coment['texto_comentario']; ?> 
                    </p>
                </div>
            </div>
			<?php 
		}             
	}
?>