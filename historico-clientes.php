<?php

require_once 'backend/conexao.php';

try {

    $id = $_GET['id'];

    $sql = "
        SELECT
            c.nome,
            s.nome_servico,
            a.valor,
            a.data
        FROM tb_agendamento a
        INNER JOIN tb_cliente c
            ON a.id_cliente = c.id
        INNER JOIN tb_servico s
            ON a.id_servico = s.id
        WHERE a.id_cliente = ?
        ORDER BY a.data DESC
    ";

    $comando = $conexao->prepare($sql);

    $comando->execute([$id]);

    $agendamentos = $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $erro) {

    error_log($erro->getMessage());

    echo "Não foi possível buscar os dados";
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

    <!-- <style>
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background-color: #f8f9fa;
        }

        table th,
        table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background-color: #f5f5f5;
        }

        .sem-registro {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #777;
        }

        .btn-voltar {
            display: inline-block;
            margin-top: 15px;
            margin-bottom: 10px;
            text-decoration: none;
            background-color: #6c757d;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .btn-voltar:hover {
            background-color: #5a6268;
        }
    </style> -->

</head>

<body>

    <?php require_once 'includes/header.php'; ?>

    <main>

        <div class="container">

            <h1 class="titulo-pagina">Histórico do Cliente</h1>

            <a href="lista-clientes.php" class="btn-voltar">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>

            <?php if (empty($agendamentos)) : ?>

                <p class="sem-registro">
                    Este cliente ainda não possui atendimentos cadastrados.
                </p>

            <?php else : ?>

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

                        <tbody>

                            <?php foreach ($agendamentos as $agendamento) : ?>

                                <tr>

                                    <td>
                                        <?= $agendamento['nome'] ?>
                                    </td>

                                    <td>
                                        <?= $agendamento['nome_servico'] ?>
                                    </td>

                                    <td>
                                        R$ <?= number_format($agendamento['valor'], 2, ',', '.') ?>
                                    </td>

                                    <td>
                                        <?= date('d/m/Y', strtotime($agendamento['data'])) ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php endif; ?>

        </div>

    </main>

</body>

</html>