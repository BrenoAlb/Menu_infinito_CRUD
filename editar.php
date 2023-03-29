<?php
// Recebe os dados
$id = $_POST['id'];
$nome = $_POST['nome'];
$parent_id = $_POST['parent_id'];
$link = $_POST['link'];
$ordem = $_POST['ordem'];

// Conecta ao banco de dados
$conexao = mysqli_connect('localhost:3312', 'root', '', 'menu');

// Atualiza os dados no banco de dados
$sql = "UPDATE menu SET nome = '$nome', parent_id = '$parent_id', link = '$link', ordem = '$ordem' WHERE id = '$id'";
mysqli_query($conexao, $sql);

// Fecha a conexão
mysqli_close($conexao);

// Redireciona para a página inicial
header('location: index.php');
?>