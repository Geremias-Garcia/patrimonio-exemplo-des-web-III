<?php

    require 'Banco.php';
    require 'ItemPatrimonio.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();

    $itemPatrimonio = new ItemPatrimonio($conexao);
    $itemPatrimonio->setCodigo($_POST['codigo']);
    $itemPatrimonio->setDescricao($_POST['descricao']);
    $itemPatrimonio->setCondicao($_POST['condicao']);
    $itemPatrimonio->setLocalizacao($_POST['localizacao']);

    if ($itemPatrimonio->create()) {
        echo "Item cadastrado com sucesso!";
        header("Refresh:3;url=form_cadastroItem.php");
    } else {
        echo "Erro ao cadastrar o item.";
    }

?>
