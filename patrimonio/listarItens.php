<?php
require 'Banco.php';
require 'ItemPatrimonio.php';

$Banco = new Banco();
$db = $Banco->getConexao();

$item = new ItemPatrimonio($db);
$stmt = $item->read();

$itemPatrimonio = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Itens</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-centralizado">
        <h2>Lista de Itens</h2>

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Condição</th>
                    <th>Localização</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itemPatrimonio as $item) { ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['codigo']; ?></td>
                        <td><?php echo $item['descricao']; ?></td>
                        <td><?php echo $item['condicao']; ?></td>
                        <td><?php echo $item['localizacao']; ?></td>
                        <td>
                            <a href="form_atualizaItem.php?id=<?php echo $item['id']; ?>" class="btn btn-acoes">Editar</a>
                            <a href="deletaItem.php?id=<?php echo $item['id']; ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="botoes-container">
            <a href="form_cadastroItem.php" class="btn btn-cadastrar">Cadastrar Novo Item</a>
            <a href="index.php" class="btn btn-menu">Menu inicial</a>
        </div>
    </div>
</body>
</html>
