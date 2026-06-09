<?php

//conexao do PHP com o banco de dados MYSQL

require_once 'backend/funcoes.php';
//string de conexao usando PDO
try {
    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tb_cliente";

    $comando = $conexao->prepare($sql);

    $comando->execute();
    // armazena em um array os funcionarios cadastrados no banco de dados

    $clientes = $comando->fetchAll(PDO::FETCH_ASSOC);

    // formata o código para exibição via var_dump
    // echo "<pre>";
    // var_dump($funcionarios);
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}
// altera ativo/inativo
if (isset($_GET['alterarAtivo'])) {
    $id = filter_input(INPUT_GET, 'alterarAtivo');
    alterarAtivoCliente($id);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Clientes</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/clientes-lista.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.bootstrap5.css">

</head>

<body>
    <?php require_once 'includes/header.php';
    ?>
    <main>
        <h1 class="titulo-pagina">Meus Clientes</h1>
        <!-- <div class="top-actions">



            <div class="action-buttons">
                <a href="clientes.php" class="btn" id="btnCadastrar">Cadastrar</a>

            </div>

        </div> -->
        <div class="table-container">
            <table class="table table-striped display" id="listagem-cliente">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data Nasc.</th>
                        <th>Cadastro</th>
                        <th>Endereço</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>




                <tbody>
                    <?php
                    foreach ($clientes as $cliente):
                    ?>
                        <tr>

                            <td><?php echo $cliente['id']; ?></td>
                            <td><?php echo $cliente['nome']; ?></td>
                            <td><?php echo $cliente['data_nascimento']; ?></td>
                            <td><?php echo $cliente['data_cadastro']; ?></td>
                            <td><?php echo $cliente['endereco']; ?></td>
                            <td><?php echo $cliente['email']; ?></td>
                            <td><?php echo $cliente['telefone']; ?></td>
                            <td><?php echo $cliente['cidade']; ?></td>
                            <td><?php echo $cliente['estado']; ?></td>
                            <td class="acoes">
                                <a class="table-btn editar" href="editar-clientes.php?id=<?php echo $cliente['id']; ?>">Editar</a>
                                <a href="?alterarAtivo=<?php echo $cliente['id']; ?>" onclick="return confirm('Deseja alterar?')">
                                    <button class="table-btn status" type="button" class="<?php echo $cliente['ativo'] == 1 ? 'ativo' : 'inativo'; ?>">
                                        <?php
                                        if ($cliente['ativo'] == 1) {
                                            echo "Ativo";
                                        } else {
                                            echo "Inativo";
                                        } ?>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>

                </tbody>
            </table>
        </div>

    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.bootstrap5.js"></script>
    <script src="assets/js/datatable.js"></script>
</body>