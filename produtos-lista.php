<?php

//conexao do PHP com o banco de dados MYSQL

require_once 'backend/funcoes.php';
//string de conexao usando PDO

try {
    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tb_produto";

    $comando = $conexao->prepare($sql);

    $comando->execute();
    // armazena em um array os produtos cadastrados no banco de dados

    $produtos = $comando->fetchAll(PDO::FETCH_ASSOC);

    // formata o código para exibição via var_dump
    // echo "<pre>";
    // var_dump($funcionarios);
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}
if (isset($_GET['alterarAtivo'])) {
    $id = filter_input(INPUT_GET, 'alterarAtivo');
    //executa a função que ativa/desativa o produto
    alterarAtivoProduto($id);
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/produto/produto.css">
</head>

<body>
    <?php require_once 'includes/header.php';
    ?>
    <main>
        <h1 class="titulo-pagina">Produtos</h1>
        <div class="top-actions">

            <div class="search-box">
                <input type="text" placeholder="Buscar por nome">
                <button class="btn buscar">Buscar</button>
            </div>

            <div class="action-buttons">
                <a href="produtos.php" class="btn">Cadastrar</a>

            </div>

        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Preço de Custo</th>
                        <th>Preço de Venda</th>
                        <th>Estoque Atual</th>
                        <th>Estoque Mínimo</th>
                        <th>Data de cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                foreach ($produtos as $produto):
                ?>

                    <tbody>
                        <tr>
                            <td><?php echo $produto['id']; ?></td>
                            <td><?php echo $produto['nome']; ?></td>
                            <td><?php echo $produto['marca']; ?></td>
                            <td><?php echo $produto['categoria']; ?></td>
                            <td><?php echo $produto['preco_custo']; ?></td>
                            <td><?php echo $produto['preco_venda']; ?></td>
                            <td><?php echo $produto['estoque_atual']; ?></td>
                            <td><?php echo $produto['estoque_minimo']; ?></td>
                            <td><?php echo $produto['data_cadastro']; ?></td>
                            <td class="acoes">

                                <a class="table-btn editar" href="editar-produtos.php?id=<?php echo $produto['id']; ?>">Editar</a>

                                <a href="?alterarAtivo=<?php echo $produto['id']; ?>" onclick="return confirm('Deseja Alterar?')">
                                    <button class="table-btn status" type="button" class="<?php echo $produto['ativo'] == 1 ? 'ativo' : 'inativo'; ?>">
                                        <?php
                                        if ($produto['ativo'] == 1) {
                                            echo "Ativo";
                                        } else
                                            echo "Inativo";
                                        ?>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                endforeach;
                ?>
            </table>
        </div>

    </main>

</body>

</html>