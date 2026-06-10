<?php
//incluir o arquivo de conexao
// require_once 'backend/conexao.php';

require_once 'backend/funcoes.php';
//string de conexao usando PDO

//string de conexao usando PDO
try {
    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tb_servico";

    $comando = $conexao->prepare($sql);

    $comando->execute();
    // armazena em um array os serviços cadastrados no banco de dados

    $servicos = $comando->fetchAll(PDO::FETCH_ASSOC);

    // formata o código para exibição via var_dump
    // echo "<pre>";
    // var_dump($servicos);
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}

if (isset($_GET['alterarAtivo'])) {
    $id = filter_input(INPUT_GET, 'alterarAtivo');
    //executa a função que ativa/desativa o produto
    alterarAtivoServico($id);
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços - Lista</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/funcionario/funcionario-lista.css">
    <link rel="stylesheet" href="assets/css/clientes-lista.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.bootstrap5.css">




</head>

<body>
    <?php require_once 'includes/header.php';
    ?>
    <main>
        <h1 class="titulo-pagina">Serviços</h1>
        <div class="top-actions">



        </div>
        <div class="table-container">
            <table id="listagem-servico">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Categoria</th>
                        <th>Nome do Serviço</th>
                        <th>Descrição</th>
                        <th>Duração</th>
                        <th>Data de cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                foreach ($servicos as $servico):
                ?>

                    <tbody>
                        <tr>
                            <td><?php echo $servico['id']; ?></td>
                            <td><?php echo $servico['categoria']; ?></td>
                            <td><?php echo $servico['nome_servico']; ?></td>
                            <td><?php echo $servico['descricao']; ?></td>
                            <td><?php echo $servico['duracao']; ?></td>
                            <td><?php echo $servico['data_cadastro']; ?></td>
                            <td class=" acoes">

                                <a class="table-btn editar" href="editar-servicos.php?id=<?php echo $servico['id']; ?>">Editar</a>

                                <a href="?alterarAtivo=<?php echo $servico['id']; ?>" onclick="return confirm('Deseja Alterar?')">
                                    <button class="table-btn status" type="button" class="<?php echo $servico['ativo'] == 1 ? 'ativo' : 'inativo'; ?>">
                                        <?php
                                        if ($servico['ativo'] == 1) {
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.bootstrap5.js"></script>
    <script src="assets/js/datatable.js"></script>


</body>

</html>