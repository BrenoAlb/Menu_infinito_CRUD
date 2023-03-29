<?php
// Recebe o ID do menu
$id = $_GET['id'];

// Conecta ao banco de dados
$conexao = mysqli_connect('localhost:3312', 'root', '', 'menu');

// Exclui os dados do banco de dados
$sql = "DELETE FROM menu WHERE id = '$id' OR parent_id = '$id'";
mysqli_query($conexao, $sql);

// Fecha a conexão
mysqli_close($conexao);

// Redireciona para a página inicial
header('location: index.php');
?>