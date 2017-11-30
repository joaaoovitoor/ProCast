<?php
	include('conexao.php');
	$pan = mysqli_query($conexao, "SELECT * FROM categoria_noticia");
	while ($painel = mysqli_fetch_array($pan)) 
	{
	?>
		
           <div role="tabpanel" class="tab-pane active" id="<?php echo $painel['categoria_noticia']?>">
                    <!-- Conteudo tab -->
                    <div class="container-fluid not">
                        <nav>
                            <ul class="pager">
                                <li class="previous"><a href="#" class="borda_azul fonte_azul_claro"><span aria-hidden="true">&larr;</span> Anterior</a></li>
                                <li class="next"><a href="#" class="borda_azul fonte_azul_claro">Próximo <span aria-hidden="true">&rarr;</span></a></li>
                            </ul>
                        </nav>
                        <div class="row">
                          
                        </div>
                    </div>
                    <!-- fim conteudo tab -->
                </div>
            
     
	<?php
	}

?>