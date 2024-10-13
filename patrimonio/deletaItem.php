<?php
    require 'Banco.php';
    require 'ItemPatrimonio.php';

    $database = new Banco();
    $db = $database->getConexao();

    $itemPatrimonio = new ItemPatrimonio($db);

    $itemPatrimonio->setId($_GET['id']);

    if ($itemPatrimonio->delete()) {
        echo "Item deletado com sucesso!";
        header("Refresh:3;url=listarItens.php");
    } else {
        echo "Erro ao deletar o Item.";
        header("Refresh:3;url=listarItens.php");
    }
?>