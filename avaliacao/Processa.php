<?php
session_start();
include('conexao.php');


if(!empty($_POST['estrela'])){
	$estrela = $_POST['estrela'];
	
	//Salvar no banco de dados
	$result_avaliacos = "INSERT INTO avaliacos (qnt_estrela, created) VALUES ('$estrela', NOW())";
	$resultado_avaliacos = mysqli_query($conexao, $result_avaliacos);
	
	if(mysqli_insert_id($conexao)){
		$_SESSION['msg'] = "Avaliação cadastrada com sucesso";
		header("Location: avalia.php");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar a avaliação";
		header("Location: avalia.php");
	}
	
}else{
	$_SESSION['msg'] = "Necessário selecionar pelo menos 1 estrela";
	header("Location: avalia.php");
}
?>