<?php

//conexao do PHP com o banco de dados MYSQL


require_once 'backend/funcoes.php';
$agendamentos = listarAgendamento();

if (isset($_GET['alterarAtivo'])) {
    $id = filter_input(INPUT_GET, 'alterarAtivo');
    alterarAtivoAgendamento($id);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus agendamentos</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/funcionario/clientes.css">
    <link rel="stylesheet" href="assets/css/clientes-lista.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.bootstrap5.css">

</head>

<body>
    <?php require_once 'includes/header.php';
    ?>
    <main>
        <h1 class="titulo-pagina">Meus Agendamentos</h1>
        <div class="top-actions">




        </div>
        <div class="table-container">
            <table id="listagem-agendamento">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Funcionário</th>
                        <th>Serviço</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Valor Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>




                <tbody>
                    <?php
                    foreach ($agendamentos as $agendamento):
                    ?>
                        <tr>

                            <td><?php echo  $agendamento['id']; ?></td>
                            <td><?php echo $agendamento['nome']; ?></td>
                            <td><?php echo $agendamento['funcionario']; ?></td>
                            <td><?php echo $agendamento['nome_servico']; ?></td>
                            <td><?php echo $agendamento['data']; ?></td>
                            <td><?php echo $agendamento['hora']; ?></td>
                            <td><?php echo $agendamento['valor']; ?></td>

                            <td class="acoes">
                                <a class="table-btn editar " href="editar-agendamento.php?id=<?php echo $agendamento['id']; ?>">Editar</a>
                                <a href="?alterarAtivo=<?php echo $agendamento['id']; ?>" onclick="return confirm('Deseja alterar?')">
                                    <button class="table-btn status" type="button" class="<?php echo $agendamento['ativo'] == 1 ? 'ativo' : 'inativo'; ?>">
                                        <?php
                                        if ($agendamento['ativo'] == 1) {
                                            echo "Ativo";
                                        } else {
                                            echo "Inativo";
                                        } ?>
                                    </button>
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