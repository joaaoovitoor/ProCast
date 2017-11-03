<?php
    ob_start();
    session_start();
    if(isset($_SESSION['email'])){
        $email_usuario=$_SESSION['email'];
        include('conexao.php');
        //verificando se ele é anunciante
        $sqlsel='select * from usuario where email="'.$email_usuario.'";';
        $resul=mysqli_query($conexao,$sqlsel);

        $sqlsela='select * from anunciante where email="'.$email_usuario.'";';
        $resula=mysqli_query($conexao,$sqlsela);

        //sabendo se ele é usuário
        if(mysqli_num_rows($resul)>0)
        {
            header("location: verificar_perfil.php");
        }
        //sabendo se ele é anunciante
        elseif(mysqli_num_rows($resula)>0)
        {
            header("location: perfil_anunciante.php");
        }
        //se ele realmente for admin, cairá neste else
        else
        { 
            $sqlsel='select * from admin where email="'.$email_usuario.'";';
            $resul=mysqli_query($conexao,$sqlsel);
            $con=mysqli_fetch_array($resul);
        }
    }
    else{
        header('location:destruir.php');    
    }
?>