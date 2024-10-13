<?php
    require 'Banco.php';
    require 'ItemPatrimonio.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();

    $itemPatrimonio = new ItemPatrimonio($conexao);

    $itemPatrimonio->setId($_POST['id']);
    $itemPatrimonio->setCodigo($_POST['codigo']);
    $itemPatrimonio->setDescricao($_POST['descricao']);
    $itemPatrimonio->setCondicao($_POST['condicao']);
    $itemPatrimonio->setLocalizacao($_POST['localizacao']);

    if ($itemPatrimonio->update()) {
        echo "Item atualizado com sucesso!";
        header("Refresh:3;url=listarItens.php");
    } else {
        echo "Erro ao atualizar item.";
    }
?>
