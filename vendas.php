<?php

require_once 'consulta-vendas.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Histórico de Vendas</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    <?php require_once 'includes/header.php'; ?>

    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2>
                    Histórico de Vendas
                </h2>

                <p>
                    Consulte todas as vendas realizadas.
                </p>

            </div>

            <a
                href="pedidos.php"
                class="btn btn-success">

                <i class="fa-solid fa-plus"></i>

                Nova Venda

            </a>

        </div>

        <div class="card">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th>Pedido</th>

                                <th>Cliente</th>

                                <th>Pagamento</th>

                                <th>Valor</th>

                                <th>Data</th>

                                <th>Ações</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach($vendas as $venda): ?>

                                <tr>

                                    <td>

                                        #<?= $venda['id'] ?>

                                    </td>

                                    <td>

                                        <?= $venda['cliente'] ?>

                                    </td>

                                    <td>

                                        <?= $venda['forma_pagamento'] ?>

                                    </td>

                                    <td>

                                        R$
                                        <?= number_format(
                                            $venda['valor_total'],
                                            2,
                                            ',',
                                            '.'
                                        ) ?>

                                    </td>

                                    <td>

                                        <?= date(
                                            'd/m/Y H:i',
                                            strtotime(
                                                $venda['data_hora']
                                            )
                                        ) ?>

                                    </td>

                                    <td>

                                        <a
                                            href="detalhes-venda.php?id=<?= $venda['id'] ?>"
                                            class="btn btn-primary btn-sm">

                                            <i class="fa-solid fa-eye"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</body>

</html>