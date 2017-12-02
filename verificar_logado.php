<?php
    ob_start();
    session_start();
    if(isset($_SESSION['email'])){
        $email_usuario=$_SESSION['email'];
        include('conexao.php');
        //verificando se ele é anunciante
        $sqlsel='select * from anunciante where email="'.$email_usuario.'";';
        $resul=mysqli_query($conexao,$sqlsel);

        //verificando se ele é admin
        $sqlsela='select * from admin where email="'.$email_usuario.'";';
        $resula=mysqli_query($conexao,$sqlsela);

        //se ele for anunciante, cairá aqui
        if(mysqli_num_rows($resul)>0)
        {
            header("location: perfil_anunciante.php");
        }
        //se ele for admin, cairá aqui
        elseif(mysqli_num_rows($resula)>0)
        {
            header("location: admin.php");
        }
        //se ele realmente for usuario, cairá neste else
        else
        { 
            $sqlsel='select * from usuario where email="'.$email_usuario.'";';
            $resul=mysqli_query($conexao,$sqlsel);
            $con=mysqli_fetch_array($resul);
        }
    }
    else{
        header('location:destruir.php');    
    }
?>