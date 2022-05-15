<?php

$usuario = 'root';
$senha = 'root1234';
$database = 'cantasertao';
$host = 'localhost:3307';

$conexao = new mysqli($host, $usuario, $senha, $database);

if($conexao->error) {
    die("Falha ao conectar ao banco de dados: " . $conexao->error);
}