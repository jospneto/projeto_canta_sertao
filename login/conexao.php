<?php

$usuario = 'root';
$senha = 'neto0412';
$database = 'cantasertao';
$host = 'localhost:3306';

$conexao = new mysqli($host, $usuario, $senha, $database);

if($conexao->error) {
    die("Falha ao conectar ao banco de dados: " . $conexao->error);
}