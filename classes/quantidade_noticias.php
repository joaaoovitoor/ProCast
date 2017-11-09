<?php
						$con = mysqli_connect('localhost','root','','dbprocast');
	                      $consulta=("SELECT * FROM noticia");
	                      $query=mysqli_query($con,$consulta);
	                      $not=0;
	                      while($con_not=mysqli_fetch_array($query))
	                      {
	                        $not=$not+1;
	                      }
	                      echo($not);
                       ?>