<?php
    include('conexao.php');

    $pesquisar = $_POST['pesquisa'];
    $sql_code= "SELECT * FROM user_musico WHERE nome_fantasia LIKE '%$pesquisar%' LIMIT 5";
    $resultado_musicos = mysqli_query($conexao, $sql_code);
    
    while($rows_musicos = mysqli_fetch_array($resultado_musicos)){
        echo "Nome do músico: ".$rows_musico['nome_fantasia']."<br>";
        header("Location: perfilPublic.php");
    }
?>