<?php
    include('conexao.php');
    session_start();

    $pesquisar = $_POST['pesquisa'];
    $sql_code= "SELECT * FROM user_musico WHERE nome_fantasia LIKE '%$pesquisar%' LIMIT 5";
    $resultado_musicos = mysqli_query($conexao, $sql_code);
    
    if($resultado_musicos){
        while($rows_musicos = mysqli_fetch_array($resultado_musicos)){
            header("Location: perfilPublic.php");
        }
    }else{
        echo "Músico não encontrado!";
    }
?>