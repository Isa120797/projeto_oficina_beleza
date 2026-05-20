<?php

//conexao do PHP com o banco de dados MYSQL

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BANCO', 'db_oficina_beleza');

//string de conexao usando PDO
try {
    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_produto WHERE id=$id";

    $comando = $conexao->prepare($sql);

    $comando->execute();
    // armazena em um array dos produtos cadastrados no banco de dados

    $produtos = $comando->fetchAll(PDO::FETCH_ASSOC);

    // formata o código para exibição via var_dump
    // echo "<pre>";
    // var_dump($servicos);
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="assets/css/servico/servico.css">

<body>

    <?php require_once 'includes/header.php';
    ?>

    <div class="container">
        <h1>Atualizar Produtos</h1>


        <form action="backend/atualizar-produtos.php?id=<?php echo $produtos[0]['id']; ?>" method="POST">

            <div class="input-group">
                <label for="nome">Nome</label>
                <input value="<?php echo $produtos[0]['nome']; ?>" type="text" name="nome" id="nome">
            </div>

            <div class="input-group">
                <label for="marca">Marca</label>
                <textarea name="marca" id="marca"><?php echo $produtos[0]['marca']; ?></textarea>
            </div>
            <div class="input-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" required>
                    <option value="" disable selected>Selecione...</option>
                    <option <?php if ($produtos[0]['categoria'] == 'Cabelo') echo 'selected' ?> value="Cabelo">Cabelo</option>
                    <option <?php if ($produtos[0]['categoria'] == 'Unha') echo 'selected' ?> value="Unha">Unha</option>
                    <option <?php if ($produtos[0]['categoria'] == 'Estetica') echo 'selected' ?> value="Estetica">Estética</option>
                </select>
            </div>

            <div class="input-group">
                <label for="preco_custo">Preço de Custo</label>
                <input value="<?php echo $produtos[0]['preco_custo']; ?>" type="number" step="0.01" name="preco_custo" id="preco_custo" required />
            </div>

            <div class="input-group">
                <label for="preco_venda">Preço de Venda</label>
                <input value="<?php echo $produtos[0]['preco_venda']; ?>" type="number" step="0.01" name="preco_venda" id="preco_venda" required />
            </div>
            <div class="input-group">
                <label for="estoque_atual">Estoque Atual</label>
                <input value="<?php echo $produtos[0]['estoque_atual']; ?>" type="number" step="0.01" name="estoque_atual" id="estoque_atual" required />
            </div>
            <div class="input-group">
                <label for="estoque_minimo">Estoque Mínimo</label>
                <input value="<?php echo $produtos[0]['estoque_minimo']; ?>" type="number" step="0.01" name="estoque_minimo" id="estoque_minimo" required />
            </div>



            <input type="submit" value="Salvar">
        </form>
    </div>




</body>


</html>