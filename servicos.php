<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    <link rel="stylesheet" href="assets/css/servico/servico.css">
</head>

<body>

    <?php require_once 'includes/header.php';
    ?>

    <div class="container">
        <h1>Cadastro de Serviços</h1>


        <form action="backend/cadastrar-servicos.php" method="POST">
            <div class="input-group">
                <label for="nome_servico">Nome do Serviço</label>
                <input type="text" name="nome_servico" id="nome_servico">
            </div>

            <div class="input-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao"></textarea>
            </div>

            <div class="input-group">
                <label for="preco">Preco</label>
                <input type="number" step="0.01" name="preco" id="preco" required />
            </div>

            <div class="input-group">
                <label for="duracao">Duração</label>
                <input type="text" name="duracao" id="duracao">
            </div>

            <div class="input-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" required>
                    <option value="" disable selected>Selecione...</option>
                    <option value="Cabelo">Cabelo</option>
                    <option value="Unha">Unha</option>
                    <option value="Sobrancelha">Sobrancelha</option>
                    <option value="Maquiagem">Maquiagem</option>
                </select>
            </div>
            <input type="submit" value="Cadastrar">
        </form>
    </div>


</body>


</html>