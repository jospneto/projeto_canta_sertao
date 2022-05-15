<?php
     require_once "../login/conexao.php";
    session_start();

    $pesquisar = $_POST['pesquisa'];
    
    $sql_code = "SELECT * FROM user_musico WHERE nome_fantasia LIKE '%$pesquisar%' LIMIT 5";
    $resultado_musicos = mysqli_query($conexao, $sql_code);
   
   /* if( isset($_POST['nome_fantasia']) && isset($_POST['genero_musical']) )  { 
        $resultado_musicos = $_POST['nome_fantasia'];
        $resultado_musicos = $_POST['genero_musical'];
        
   }
    */
    if($resultado_musicos){
        while($rows_musicos = mysqli_fetch_array($resultado_musicos)){
            header("Location: perfilPublic.php");
            exit;
        }
    }else{
        echo "Músico não encontrado!";
    }
?>