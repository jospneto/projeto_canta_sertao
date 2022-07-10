<?php

include('../conexao.php');

session_start();

if (!($_SESSION['cpf_cnpj'] && $_SESSION['nome_fantasia'])){
    session_destroy();
    header("location: ../logout.php");
    exit;
 }

$cpf_cnpj = $_SESSION["cpf_cnpj"];

$sql_code = "SELECT * FROM user_musico WHERE cpf_cnpj = '$cpf_cnpj'";
$sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

$usuario = $sql_query->fetch_assoc();
$vazio = "";

if (isset($_POST['email'], $_POST['endereco'], $_POST['telefone'], $_POST['nome_fantasia'], $_POST['genero_musical'], $_POST['cache_show'],)) {

    if ($_POST['email'] && $_POST['endereco'] && $_POST['telefone'] && $_POST['nome_fantasia'] && $_POST['genero_musical'] && $_POST['cache_show']) {

        $nome_fantasia = trim($_POST['nome_fantasia']);
        $email = trim($_POST['email']);
        $telefone = trim($_POST['telefone']);
        $genero_musical = trim($_POST['genero_musical']);
        $cache_show = trim($_POST['cache_show']);
        $endereco = $_POST['endereco'];

        $sql_code = "";

        if (isset($_POST['senha']) && $_POST['senha']) {

            $senha = md5($_POST['senha']);

            $sql_code = "UPDATE user_musico 
        SET nome_fantasia = '$nome_fantasia', email = '$email', endereco = '$endereco', telefone = '$telefone', 
        genero_musical = '$genero_musical', cache_show = " . $cache_show . ", senha = '$senha'
        WHERE cpf_cnpj = " . $cpf_cnpj;
        } else {

            $sql_code = "UPDATE user_musico 
        SET nome_fantasia = '$nome_fantasia', email = '$email', endereco = '$endereco', telefone = '$telefone', 
        genero_musical = '$genero_musical', cache_show = " . $cache_show . "
        WHERE cpf_cnpj = " . $cpf_cnpj;
        }

        $_SESSION['nome_fantasia'] = $nome_fantasia;

        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        //header("Refresh:0");

        if ($sql_query)
            header("location: ./edicaoPerfil.php?status=success");
        else
            header("location: ./edicaoPerfil.php?status=error");

        exit;
    } else {

        $campos = ["email", "endereco", "telefone", "nome_fantasia", "genero_musical", "cache_show"];

        foreach ($campos as $campo){

            if(!$_POST[$campo]){
                $vazio = $campo;
                break;
            }

        }

        

        //header("location: ./edicaoPerfil.php?status=warning");
    }
}

include './formEditaPerfil.php';
