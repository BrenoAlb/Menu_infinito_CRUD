<!DOCTYPE html>
<html>
<head>
    <title>Menu Multinível Infinito</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        ul {
            list-style: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Menu Multinível Infinito</h1>

    <?php
// Incluindo o arquivo de conexão com o banco de dados e das funções
include('conexao.php');

include('funcoes.php');


// Se o formulário foi submetido
if (isset($_POST['submitted'])) {
    // Inserindo um novo menu
    inserirMenu($conexao, $_POST['nome'], $_POST['parent_id'], $_POST['link'], $_POST['ordem']);
}

// Exibindo o menu com botões
exibirMenuComBotoes($conexao, 0);
?>

    <!-- Modal para editar o menu -->
    <div class="modal fade" id="modalEditarMenu" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Menu</h4>
                </div>
                <div class="modal-body">
                
                <form action="editar.php" method="post">
    <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $row['nome']; ?>" required>
    </div>
    <div class="form-group">
        <label for="parent_id">Parent ID</label>
        <input type="number" name="parent_id" id="parent_id" class="form-control" value="<?php echo $row['parent_id']; ?>" required>
    </div>
    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" name="link" id="link" class="form-control" value="<?php echo $row['link']; ?>" required>
    </div>
    <div class="form-group">
        <label for="ordem">Ordem</label>
        <input type="number" name="ordem" id="ordem" class="form-control" value="<?php echo $row['ordem']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
                </div>
                <form action="excluir.php" method="get">
    <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
    <button type="submit" class="btn btn-danger">Excluir</button>
</form>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    // Abre o modal para editar o menu
    function editarMenu(id, nome, parent_id, link, ordem) {
        $('#modalEditarMenu #id').val(id);
        $('#modalEditarMenu #nome').val(nome);
        $('#modalEditarMenu #parent_id').val(parent_id);
        $('#modalEditarMenu #link').val(link);
        $('#modalEditarMenu #ordem').val(ordem);
        $('#modalEditarMenu').modal('show');
    }
</script>

</body>
</html>