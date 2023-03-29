<?php
// Recebe os dados
$id = $_POST['id'];
$nome = $_POST['nome'];
$parent_id = $_GET['id'];
$link = $_POST['link'];
$ordem = $_POST['ordem'];

// Conecta ao banco de dados
$conexao = mysqli_connect('localhost:3312', 'root', '', 'menu');

// Insere os dados no banco de dados
$sql = "INSERT INTO menu (id, nome, parent_id, link, ordem) VALUES ('$id', '$nome', '$parent_id', '$link', '$ordem')";
mysqli_query($conexao, $sql);

// Fecha a conexão
mysqli_close($conexao);

// Redireciona para a página inicial
header('location: index.php');
?>