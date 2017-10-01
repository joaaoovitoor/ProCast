<div class="panel-body bg_cinza_escuro">  	
	<h4 class="text-center fonte_branca nome_user"><strong>
        <?php
            echo($con['nome']);
        ?>
    </strong></h4>
		<ul class="list-group">
            <a href="mensagens.php">
    		    <li class="list-group-item bg_cinza_escuro sem_borda fonte_branca"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Mensagens Recebidas 
                    <span class="badge bg_cinza_claro">
                            <?php
                                //contador do badge
                                
                                $sqlsel='select * from mensagem where (id_receber="'.$con['id_usuario'].'") AND (favorito="F") AND (rascunho="F") AND (excluido="F");';
                                $resul=mysqli_query($conexao,$sqlsel);
                                echo(mysqli_num_rows($resul));

                            ?>
                    </span>
                </li>
            </a>
			<a href="mensagens.php">
                <li class="list-group-item bg_cinza_escuro sem_borda fonte_branca"><span class="glyphicon glyphicon-export" aria-hidden="true"></span> Mensagens Enviadas 
                    <span class="badge bg_cinza_claro">
                            <?php
                                //contador do badge
                                $sqlsel='select * from mensagem where (id_enviar="'.$con['id_usuario'].'") AND (favorito="F") AND (rascunho="F") AND (excluido="F");';
                                $resul=mysqli_query($conexao,$sqlsel);
                                echo(mysqli_num_rows($resul));

                            ?>
                    </span>
                </li>
            </a>
            <a href="mensagens_exc.php">
    			<li class="list-group-item bg_cinza_escuro sem_borda fonte_branca">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Mensagens Excluídas 
                    <span class="badge bg_cinza_claro"> 
                            <?php
                                //contador do badge
                                 $sqlsel='select * from mensagem where ((id_receber="'.$con['id_usuario'].'") AND (excluido="V")) OR ((id_enviar="'.$con['id_usuario'].'") AND (excluido="V")) ;';
                                $resul=mysqli_query($conexao,$sqlsel);
                                $resul=mysqli_num_rows($resul);
                                echo($resul);

                            ?>
                    </span>
                </li>
            </a>
			<li class="list-group-item bg_cinza_escuro sem_borda fonte_branca">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Mensagens Favoritadas 
                <span class="badge bg_cinza_claro"> 
                        <?php
                            //contador do badge
                             $sqlsel='select * from mensagem where ((id_receber="'.$con['id_usuario'].'") AND (favorito="V")) OR ((id_enviar="'.$con['id_usuario'].'") AND (favorito="V")) ;';
                                $resul=mysqli_query($conexao,$sqlsel);
                                $resul=mysqli_num_rows($resul);
                                echo($resul);

                        ?>
                </span>
            </li>
			<li class="list-group-item bg_cinza_escuro sem_borda fonte_branca">
                <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Rascunhos 
                <span class="badge bg_cinza_claro"> 
                        <?php
                            //contador do badge
                            $$sqlsel='select * from mensagem where ((id_enviar="'.$con['id_usuario'].'") AND (rascunho="V")) ;';
                            $resul=mysqli_query($conexao,$sqlsel);
                            $resul=mysqli_num_rows($resul);
                            echo($resul);
                        ?>
                </span>
            </li>
	</ul>				
</div> 