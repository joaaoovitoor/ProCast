<?php
	if(isset($_POST['pesquisar']))
	{
		$idade= $_POST['idade'];
		$estado= $_POST['estado'];
		$funcao=$_POST['funcao'];

		$dt_at=date("Y"); 
		$dt_hj="-".date("m-d"); 
		

		if ($idade=='1') {
			$dt_at=$dt_at-15;
		}
		elseif ($idade=='2') {
			$dt_at=$dt_at-16;
			$dt_at2=$dt_at-19;
		}
		elseif ($idade=='3') {
			$dt_at=$dt_at-20;
			$dt_at2=$dt_at-23;
		}
		elseif ($idade=='4') {
			$dt_at=$dt_at-24;
			$dt_at2=$dt_at-27;
		}
		elseif ($idade=='5'){
			$dt_at=$dt_at-28;
		}

		//idade
		if (empty($estado)&&!empty($idade)&&empty($funcao)) 
		{
			if ($idade=='1') {
			$sqlsel=('SELECT * FROM usuario WHERE dta_nascimento>="'.$dt_at.$dt_hj.'";');
			}
			elseif ($idade=='2') {
				
				$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.$dt_hj.'" AND dta_nascimento>="'.$dt_hj.$dt_at2.'");');
			}
			elseif ($idade=='3') {
				
				$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.$dt_hj.'" AND dta_nascimento>="'.$dt_hj.$dt_at2.'");');
			}
			elseif ($idade=='4') {
			
			$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.$dt_hj.'" AND dta_nascimento>="'.$dt_hj.$dt_at2.'");');
			}
			elseif ($idade=='5'){
				
				$sqlsel=('SELECT * FROM usuario WHERE dta_nascimento<="'.$dt_at.$dt_hj.'";');
			}
		}

		//estado
		elseif (!empty($estado)&&empty($idade)&&empty($funcao)) 
		{
			$sqlsel=('SELECT * FROM usuario WHERE estado='.$estado.';');
		}	

		//estado e idade
		elseif (!empty($estado)&&!empty($idade)&&empty($funcao)) 
		{
			if ($idade=='1')
			{
				$sqlsel=('SELECT * FROM usuario WHERE dta_nascimento<="'.$dt_at.'" AND estado='.$estado.';');
			}
			elseif ($idade=='2') 
			{
				$dt_at=$dt_at-16;
				$dt_at2=$dt_at-19;
				$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.'" AND dta_nascimento>="'.$dt_at2.'" AND estado='.$estado.');');
			}
			elseif ($idade=='3') 
			{
				$dt_at=$dt_at-20;
				$dt_at2=$dt_at-23;
				$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.'" AND dta_nascimento>="'.$dt_at2.'" AND estado='.$estado.');');
			}
			elseif ($idade=='4') 
			{
				$dt_at=$dt_at-24;
				$dt_at2=$dt_at-27;
				$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.'" AND dta_nascimento>="'.$dt_at2.'" AND estado='.$estado.');');
			}
			elseif ($idade=='5')
			{
				$dt_at=$dt_at-28;
				$sqlsel=('SELECT * FROM usuario WHERE dta_nascimento<="'.$dt_at.'" AND estado='.$estado.';');
			}
		}


		//função e idade
		elseif (!empty($estado)&&!empty($idade)&&empty($funcao)) 
		{
			if ($idade=='1')
			{
				$sqlsel=('SELECT * FROM usuario WHERE dta_nascimento<="'.$dt_at.'" AND funcao_1='.$funcao.';');
			}
			elseif ($idade=='2') 
			{
				$dt_at=$dt_at-16;
				$dt_at2=$dt_at-19;
				$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.'" AND dta_nascimento>="'.$dt_at2.'" AND funcao_1='.$funcao.');');
			}
			elseif ($idade=='3') 
			{
				$dt_at=$dt_at-20;
				$dt_at2=$dt_at-23;
				$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.'" AND dta_nascimento>="'.$dt_at2.'" AND funcao_1='.$funcao.');');
			}
			elseif ($idade=='4') 
			{
				$dt_at=$dt_at-24;
				$dt_at2=$dt_at-27;
				$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.'" AND dta_nascimento>="'.$dt_at2.'" AND funcao_1='.$funcao.');');
			}
			elseif ($idade=='5')
			{
				$dt_at=$dt_at-28;
				$sqlsel=('SELECT * FROM usuario WHERE dta_nascimento<="'.$dt_at.'" AND funcao_1='.$funcao.';');
			}
		}

		//estado e função
		elseif (!empty($estado)&&empty($idade)&&!empty($funcao)) 
		{
				$sqlsel=('SELECT * FROM usuario WHERE funcao_1='.$funcao.' AND estado='.$estado.';');
		}


		//estado , função e idade
		elseif (!empty($estado)&&!empty($idade)&&!empty($funcao)) 
		{
			if ($idade=='1') {
				$sqlsel=('SELECT * FROM usuario WHERE dta_nascimento<="'.$dt_at.'" AND funcao_1='.$funcao.' AND estado='.$estado.';');
			}
			elseif ($idade=='2') {
				
				$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.'" AND dta_nascimento>="'.$dt_at2.'" AND funcao_1='.$funcao.' AND estado='.$estado.');');
			}
			elseif ($idade=='3') {
				
				$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.'" AND dta_nascimento>="'.$dt_at2.'" AND funcao_1='.$funcao.' AND estado='.$estado.');');
			}
			elseif ($idade=='4') {
			
				$sqlsel=('SELECT * FROM usuario WHERE (dta_nascimento<="'.$dt_at.'" AND dta_nascimento>="'.$dt_at2.'" AND funcao_1='.$funcao.' AND estado='.$estado.');');
			}
			elseif ($idade=='5'){
				
				$sqlsel=('SELECT * FROM usuario WHERE dta_nascimento<="'.$dt_at.'" AND funcao_1='.$funcao.' AND estado='.$estado.';');
			}
		}


		//função
		elseif (empty($estado)&&empty($idade)&&!empty($funcao)) 
		{
			$sqlsel=('SELECT * FROM usuario WHERE funcao_1='.$funcao.';');
		}


		//sem filtro
		else
		{
			echo('<script>alert("Filtros vazios! Veja outros jogadores");</script>');
			$sqlsel=('SELECT * FROM usuario;');
		}
		
		//resultados
		$resul = mysqli_query($conexao,$sqlsel);
		if(mysqli_num_rows($resul))
		{
			while ($conresul=mysqli_fetch_array($resul))
			{
				$sqlsel2='SELECT * FROM funcao WHERE id_funcao='.$conresul['funcao_1'].';';
				$resul=mysqli_query($conexao,$sqlsel2);
				$con2=mysqli_fetch_array($resul);
				$sqlsel3='SELECT * FROM funcao WHERE id_funcao='.$conresul['funcao_2'].';';
				$resul=mysqli_query($conexao,$sqlsel3);
				$con3=mysqli_fetch_array($resul);
				if($conresul['foto_perfil']){
			       	$cam='uploads/'.$conresul['foto_perfil'];
			    }
			    else{
			    	$cam='img/perfil_icon.png';
			    }
				echo
				('
					<div class="col-md-offset-2 col-md-8">
						<div class="cartao-equipe">
			                <div class="media">
			                    <div class="media-left">

			                        <img class="media-object img-circle profile-img" src="'.$cam.'">
			                        <form action="pesquisa.php" method="POST">
			                        <button class="btn btn-default name="convidar" type="submit"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Convidar</button>
			                        </form>
			                    </div>
			                    <div class="media-body">
			                        <a href="ver_jogador.php?pesq='.$conresul['nick'].'"><h3 class="media-heading">'.$conresul['nick'].'</h3></a>
				                    <h5>'.$conresul['nome'].' '.$conresul['sobrenome'].'</h5>
				                    <p>Função primária: '.$con2['nome_funcao'].'</p>
				                    <p>Função primária: '.$con3['nome_funcao'].'</p>
			                    </div>
			                </div>
			            </div>
		            </div>
				');
			}
		}
		else{
			echo('<script>alert("Perfil não encontrado!");</script>');
		}
		unset($con);

	}
	
?>