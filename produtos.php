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
        <h1>Cadastro de Produto</h1>


        <form action="backend/cadastrar-produtos.php" method="POST">
            <div class="input-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>

            <div class="input-group">
                <label for="marca">Marca</label>
                <textarea name="marca" id="marca"></textarea>
            </div>
            <div class="input-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" required>
                    <option value="" disable selected>Selecione...</option>
                    <option value="Cabelo">Cabelo</option>
                    <option value="Unha">Unha</option>
                    <option value="Estetica">Estética</option>
                </select>
            </div>

            <div class="input-group">
                <label for="preco_custo">Preço de Custo</label>
                <input type="number" step="0.01" name="preco_custo" id="preco_custo" required />
            </div>

            <div class="input-group">
                <label for="preco_venda">Preço de Venda</label>
                <input type="number" step="0.01" name="preco_venda" id="preco_venda" required />
            </div>
            <div class="input-group">
                <label for="estoque_atual">Estoque Atual</label>
                <input type="number" step="0.01" name="estoque_atual" id="estoque_atual" required />
            </div>
            <div class="input-group">
                <label for="estoque_minimo">Estoque Mínimo</label>
                <input type="number" step="0.01" name="estoque_minimo" id="estoque_minimo" required />
            </div>


            <input type="submit" value="Cadastrar">
        </form>
    </div>


</body>


</html>