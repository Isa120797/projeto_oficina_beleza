<?php

//conexao do PHP com o banco de dados MYSQL

require_once 'backend/funcoes.php';
//string de conexao usando PDO
try {
    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tb_funcionario";

    $comando = $conexao->prepare($sql);

    $comando->execute();
    // armazena em um array os funcionarios cadastrados no banco de dados

    $funcionarios = $comando->fetchAll(PDO::FETCH_ASSOC);

    // formata o código para exibição via var_dump
    // echo "<pre>";
    // var_dump($funcionarios);
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}

if (isset($_GET['alterarAtivo'])) {
    $id = filter_input(INPUT_GET, 'alterarAtivo');
    //executa a função que ativa/desativa o produto
    alterarAtivoFuncionario($id);
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionarios - Lista</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/funcionario/funcionario-lista.css">
</head>

<body>
    <?php require_once 'includes/header.php';
    ?>
    <main>

        <h1 class="titulo-pagina">Funcionários</h1>
        <div class="top-actions">

            <div class="search-box">
                <input type="text" placeholder="Buscar por nome">
                <button class="btn buscar">Buscar</button>
            </div>

            <div class="action-buttons">
                <a href="funcionarios.php" class="btn">Cadastrar</a>

            </div>

        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Data de cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                foreach ($funcionarios as $funcionario):
                ?>

                    <tbody>
                        <tr>
                            <td><?php echo $funcionario['id']; ?></td>
                            <td><?php echo $funcionario['nome']; ?></td>
                            <td><?php echo $funcionario['email']; ?></td>
                            <td><?php echo $funcionario['telefone']; ?></td>
                            <td><?php echo $funcionario['data_cadastro']; ?></td>
                            <td class="acoes">

                                <a class="table-btn editar" href="editar-funcionarios.php?id=<?php echo $funcionario['id']; ?>">Editar</a>


                                <a href="?alterarAtivo=<?php echo $funcionario['id']; ?>" onclick="return confirm('Deseja Alterar?')">
                                    <button class="table-btn status" type="button" class="<?php echo $funcionario['ativo'] == 1 ? 'ativo' : 'inativo'; ?>">
                                        <?php
                                        if ($funcionario['ativo'] == 1) {
                                            echo "Ativo";
                                        } else
                                            echo "Inativo";
                                        ?>
                                    </button>
                                </a>

                                <!-- <a href="#" class="table-btn status">Ativar/Inativar</a> -->
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