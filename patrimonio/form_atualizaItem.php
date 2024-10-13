<?php
    require 'Banco.php';
    require 'ItemPatrimonio.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();
    $itemPatrimonio = new ItemPatrimonio($conexao);

    $itemPatrimonio->setId($_GET['id']);
    $stmt = $itemPatrimonio->consultar();
    $itemSelecionado = $stmt->fetch(PDO::FETCH_ASSOC); //apenas para uma linha
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Item</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-centralizado">
        <h3>Atualizar Item</h3>
        <form method="POST" action="atualizaItem.php" class="formulario">
            <input type="hidden" name="id" value="<?php echo $itemSelecionado['id']; ?>">

            <label for="codigo">Código:</label>
            <input type="text" name="codigo" value="<?php echo $itemSelecionado['codigo']; ?>" required>

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" value="<?php echo $itemSelecionado['descricao']; ?>" required>

            <label for="condicao">Condição:</label>
            <select name="condicao" required>
                <option value="ótimo" <?php echo $itemSelecionado['condicao'] == 'ótimo' ? 'selected' : ''; ?>>Ótimo</option>
                <option value="bom" <?php echo $itemSelecionado['condicao'] == 'bom' ? 'selected' : ''; ?>>Bom</option>
                <option value="ruim" <?php echo $itemSelecionado['condicao'] == 'ruim' ? 'selected' : ''; ?>>Ruim</option>
                <option value="péssimo" <?php echo $itemSelecionado['condicao'] == 'péssimo' ? 'selected' : ''; ?>>Péssimo</option>
            </select>

            <label for="localizacao">Localização:</label>
            <select name="localizacao" required>
                <option value="sala 1" <?php echo $itemSelecionado['localizacao'] == 'sala 1' ? 'selected' : ''; ?>>Sala 1</option>
                <option value="sala 2" <?php echo $itemSelecionado['localizacao'] == 'sala 2' ? 'selected' : ''; ?>>Sala 2</option>
                <option value="sala 3" <?php echo $itemSelecionado['localizacao'] == 'sala 3' ? 'selected' : ''; ?>>Sala 3</option>
            </select>

            <div class="botoes-container">
                <button type="submit" class="btn btn-cadastrar">Atualizar</button>
                <a href="listarItens.php" class="btn btn-menu">Voltar</a>
            </div>
        </form>
    </div>

    <script>
        function validarFormulario() {
            const condicao = document.getElementById('condicao').value;
            const localizacao = document.getElementById('localizacao').value;

            if (condicao === "") {
                alert("Por favor, selecione uma condição válida.");
                return false;
            }

            if (localizacao === "") {
                alert("Por favor, selecione uma localização válida.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
