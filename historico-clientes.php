<?php

require_once 'backend/conexao.php';
try {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_agendamento WHERE id=$id";

    $comando = $conexao->prepare($sql);

    $comando->execute([$id]);

    $agendamentos = $comando->fetchAll(PDO::FETCH_ASSOC);

    // echo $id;
} catch (PDOException $erro) {
    // guarda o erro gerado no log do servidor
    error_log($erro->getMessage());
    // exibe a mensagem de erro
    echo "Não foi possivel buscar os dados";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico do Cliente</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/funcionario/clientes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <main>

        <?php require_once 'includes/header.php'; ?>

        <div class="container">
            <h1 class="titulo-pagina">Histórico do Cliente</h1>

            <div class="table-container">
                <table>

                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Serviço</th>
                            <th>Valor</th>
                            <th>Data do Atendimento</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($agendamentos as $agendamento):
                    ?>
                        <tbody>

                            <tr>

                                <td>
                                    <?= $agendamento['cliente'] ?>
                                </td>

                                <td>
                                    <?= $agendamento['servico'] ?>
                                </td>

                                <td>
                                    R$ <?= number_format($agendamento['valor'], 2, ',', '.') ?>
                                </td>

                                <td>
                                    <?= date('d/m/Y', strtotime($agendamento['data'])) ?>
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