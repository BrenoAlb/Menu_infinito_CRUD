<?php
// Dados para conexão com o banco de dados
$host = 'localhost:3312';
$usuario = 'root';
$senha = '';
$banco = 'menu';

// Criando a conexão com o banco de dados
$conexao = mysqli_connect($host, $usuario, $senha, $banco);
if (!$conexao) {
    die('Erro ao conectar com o banco de dados: ' . mysqli_error());
}

?>