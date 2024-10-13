<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>

    <!-- Importar o arquivo de estilos com Bootstrap -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-centralizado">
        <h3>Cadastro de Item</h3>
        <form method="POST" action="cadastroItem.php" class="formulario" onsubmit="return validarFormulario();">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" required>

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" required>

            <label for="condicao">Condição:</label>
            <select name="condicao" id="condicao" required>
                <option value="">Selecione a condição</option>
                <option value="ótimo">Ótimo</option>
                <option value="bom">Bom</option>
                <option value="ruim">Ruim</option>
                <option value="péssimo">Péssimo</option>
            </select>

            <label for="localizacao">Localização atual:</label>
            <select name="localizacao" id="localizacao" required>
                <option value="">Selecione a localização</option>
                <option value="sala 1">Sala 1</option>
                <option value="sala 2">Sala 2</option>
                <option value="sala 3">Sala 3</option>
            </select>

            <div class="botoes-container">
                <button type="submit" class="btn btn-cadastrar">Cadastrar</button>
                <a href="index.php" class="btn btn-menu">Menu inicial</a>
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
