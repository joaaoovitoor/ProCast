<?php
						include("conexao.php");
	                      $consulta=("SELECT * FROM noticia");
	                      $query=mysqli_query($conexao,$consulta);
	                      $not=0;
	                      while($con_not=mysqli_fetch_array($query))
	                      {
	                        $not=$not+1;
	                      }
	                      echo($not);
                       ?>