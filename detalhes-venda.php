<?php

require_once 'consulta-detalhes-venda.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Detalhes da Venda</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    <?php require_once 'includes/header.php'; ?>

    <div class="container-fluid py-4">
        <div class="mb-3">

    <a href="vendas.php" class="btn btn-secondary">

        <i class="fa-solid fa-arrow-left"></i>

        Voltar 

    </a>

</div>

        <div class="card card-detalhes">

            <div class="card-body">

                <h2 class="titulo-pedido">
                    Pedido #<?= $venda['id'] ?>
                </h2>

                <hr>

                <div class="info-venda">

                    <div class="info-item">

                        <span>Cliente</span>

                        <strong>

                            <?= $venda['cliente'] ?>

                        </strong>

                    </div>

                    <div class="info-item">

                        <span>Forma de pagamento</span>

                        <strong>

                            <?= $venda['forma_pagamento'] ?>

                        </strong>

                    </div>

                    <div class="info-item">

                        <span>Data da venda</span>

                        <strong>

                            <?= date(
                                'd/m/Y H:i',
                                strtotime(
                                    $venda['data_hora']
                                )
                            ) ?>

                        </strong>

                    </div>

                </div>

                <table class="table tabela-itens">

                    <thead>

                        <tr>

                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Total</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($itens as $item): ?>

                            <tr>

                                <td>
                                    <?= $item['nome'] ?>
                                </td>

                                <td>

                                    R$
                                    <?= number_format(
                                        $item['preco_venda'],
                                        2,
                                        ',',
                                        '.'
                                    ) ?>

                                </td>

                                <td>

                                    <?= $item['quantidade'] ?>

                                </td>

                                <td>

                                    R$
                                    <?= number_format(
                                        $item['preco_venda'] *
                                            $item['quantidade'],
                                        2,
                                        ',',
                                        '.'
                                    ) ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

                <div class="total-geral">

                    Total:
                    R$
                    <?= number_format(
                        $venda['valor_total'],
                        2,
                        ',',
                        '.'
                    ) ?>

                </div>

            </div>

</body>

</html>