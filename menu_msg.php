<div class="panel-body bg_cinza_escuro">  	
	<h4 class="text-center fonte_branca nome_user"><strong>Nome do usuário</strong></h4>
		<ul class="list-group">
		    <li class="list-group-item bg_cinza_escuro sem_borda fonte_branca"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Mensagens Recebidas 
                <span class="badge bg_cinza_claro">
                        <?php
                            //contador do badge
                            include('conexao.php');
                            $sqlsel='select mensagem from mensagem where id_receber="'.$id_usuario.'";';
                            $resul=mysqli_query($conexao,$sqlsel);
                            echo(mysqli_num_rows($resul));

                        ?>
                </span>
            </li>
			<li class="list-group-item bg_cinza_escuro sem_borda fonte_branca"><span class="glyphicon glyphicon-export" aria-hidden="true"></span> Mensagens Enviadas 
                <span class="badge bg_cinza_claro">
                        <?php
                            //contador do badge
                            include('conexao.php');
                            $sqlsel='select mensagem from mensagem where id_enviar="'.$id_usuario.'";';
                            $resul=mysqli_query($conexao,$sqlsel);
                            echo(mysqli_num_rows($resul));

                        ?>
                </span>
            </li>
			<li class="list-group-item bg_cinza_escuro sem_borda fonte_branca">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Mensagens Excluídas 
                <span class="badge bg_cinza_claro"> 
                        <?php
                            //contador do badge
                            include('conexao.php');
                            $sqlsel='select mensagem from msg_exc;';
                            $resul=mysqli_query($conexao,$sqlsel);
                            echo(mysqli_num_rows($resul));

                        ?>
                </span>
            </li>
			<li class="list-group-item bg_cinza_escuro sem_borda fonte_branca">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Mensagens Favoritadas 
                <span class="badge bg_cinza_claro"> 
                        <?php
                            //contador do badge
                            include('conexao.php');
                            $sqlsel='select mensagem from mensagem where favorito=V;';
                            $resul=mysqli_query($conexao,$sqlsel);
                            echo(mysqli_num_rows($resul));

                        ?>
                </span>
            </li>
			<li class="list-group-item bg_cinza_escuro sem_borda fonte_branca">
                <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Rascunhos 
                <span class="badge bg_cinza_claro"> 
                        <?php
                            //contador do badge
                            include('conexao.php');
                            $sqlsel='select mensagem from rascunho;';
                            $resul=mysqli_query($conexao,$sqlsel);
                            echo(mysqli_num_rows($resul));

                        ?>
                </span>
            </li>
	</ul>				
</div> 