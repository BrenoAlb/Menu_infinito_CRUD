<?php

// Função para exibir o menu com botões
function exibirMenuComBotoes($conexao, $parent_id, $nivel = 0) {
    $sql = "SELECT * FROM menu WHERE parent_id = '$parent_id' ORDER BY ordem";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Apenas exibe o menu se o nível for 0
        if ($nivel == 0) {
            echo '<ul>';
        }

        while ($row = mysqli_fetch_array($result)) {
            echo '<li><a href="' . $row['link'] . '"  class="list-group-item list-group-item-action">' . $row['nome'] . '</a>';
            echo '<a href="cadastrar.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm">adicionar submenu</a>';
            echo '<a href="javascript:editarMenu(' . $row['id'] . ',\'' . $row['nome'] . '\',' . $row['parent_id'] . ',\'' . $row['link'] . '\',' . $row['ordem'] . ')" class="btn btn-secondary btn-sm bg-info" >Editar</a>';
            echo '<a href="excluir.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Excluir</a>';
            // Chama a função passando o nível atual + 1
            exibirMenuComBotoes($conexao, $row['id'], $nivel + 1);
            echo '</li>';
        }

        // Apenas exibe o menu se o nível for 0
        if ($nivel == 0) {
            echo '</ul>';
        }
    }
}
?>