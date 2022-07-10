<?php
include('../conexao.php');

session_start();

if (!($_SESSION['cpf_cnpj'] && $_SESSION['nome_fantasia'])){
    session_destroy();
    header("location: ../logout.php");
    exit;
 }

$cpf_cnpj = $_SESSION["cpf_cnpj"];

$sql_code = "SELECT * FROM midias_musico WHERE cpf_cnpj = '$cpf_cnpj'";
$sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

$midias = $sql_query->fetch_assoc();

if (isset($_POST['instagram'], $_POST['spotify'], $_POST['youtube'], $_POST['outros'])) {

        $instagram = trim($_POST['instagram']);
        $spotify = trim($_POST['spotify']);
        $youtube = trim($_POST['youtube']);
        $outros = trim($_POST['outros']);

        if ($midias) {
            $sql_code = "UPDATE midias_musico 
            SET instagram = '$instagram', spotify = '$spotify', youtube = '$youtube', outros = '$outros'
            WHERE cpf_cnpj = " . $cpf_cnpj;
        } else {
            $sql_code =  "INSERT INTO midias_musico (`cpf_cnpj`, `instagram`, `spotify`, `youtube`, `outros`) 
            values (" . $cpf_cnpj . ", '$instagram', '$spotify', 
            '$youtube', '$outros')";
        }

        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        if ($sql_query)
            header("location: ./edicaoMidias.php?status=success");
        else
            header("location: ./edicaoMidias.php?status=error");

        exit;

    
}

include "./formMidias.php";

?>

