<?php

require_once 'consulta-clientes.php';
require_once 'consulta-produtos.php';
require_once 'consulta-formas-pagamento.php';


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Venda</title>

    <link rel="stylesheet" href="assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <?php require_once 'includes/header.php'; ?>
    <div id="mensagem"></div>

    <div class="container-fluid py-4">

        <!-- TOPO -->

        <div class="topo-venda d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="titulo-venda">
                    Registrar Venda
                </h2>

                <p class="subtitulo-venda">
                    Adicione produtos, selecione o cliente e finalize o pagamento.
                </p>
            </div>

            <button
                id="btn-cancelar-venda"
                class="btn btn-light btn-cancelar">

                Cancelar Venda

            </button>
        </div>


        <div class="row g-4">

            <!-- COLUNA ESQUERDA -->
            <div class="col-lg-8">

                <!-- CLIENTE -->
                <div class="card card-venda mb-4">

                    <div class="card-body">

                        <h2 class="titulo-card">

                            Cliente
                        </h2>

                        <label class="form-label">Selecione o cliente</label>

                        <div class="row g-3 align-items-center">

                            <div class="col-md-8">
                                <select
                                    name="id_cliente"
                                    id="id_cliente"
                                    class="form-select">

                                    <option value="">
                                        Selecione o cliente
                                    </option>

                                    <?php foreach ($clientes as $cliente): ?>

                                        <option value="<?= $cliente['id'] ?>">

                                            <?= $cliente['nome'] ?>

                                        </option>

                                    <?php endforeach; ?>

                                </select>
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-outline-primary w-100 btn-adicionar">
                                    <i class="fa-solid fa-plus"></i>
                                    Novo cliente
                                </button>
                            </div>

                        </div>


                        <div
                            class="cliente-info mt-4"
                            id="dados-cliente">

                            <h5>Selecione um cliente</h5>

                        </div>
                    </div>
                </div>


                <!-- PRODUTOS -->
                <div class="card card-venda">

                    <div class="card-body">

                        <h2 class="titulo-card mb-4">

                            Produtos
                        </h2>


                        <div class="row g-3 mb-4">

                            <select
                                id="produto"
                                class="form-select">

                                <option value="">
                                    Selecione um produto
                                </option>

                                <?php foreach ($produtos as $produto): ?>

                                    <option
                                        value="<?= $produto['id'] ?>"
                                        data-preco="<?= $produto['preco_venda'] ?>"
                                        data-nome="<?= $produto['nome'] ?>"
                                        data-estoque="<?= $produto['estoque_atual'] ?>">

                                        <?= $produto['nome'] ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                            <div class="col-md-4">
                                <button class="btn btn-outline-primary w-100 btn-adicionar" id="btn-adicionar-produto">
                                    <i class="fa-solid fa-plus"></i>
                                    Adicionar produto
                                </button>


                            </div>

                        </div>


                        <div class="table-responsive">

                            <table class="table tabela-vendas align-middle">

                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Preço</th>
                                        <th>Quantidade</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="itens-venda">

                                </tbody>

                            </table>

                        </div>


                        <div class="d-flex justify-content-between align-items-center mt-4">

                            <button
                                id="btn-limpar-itens"
                                class="btn btn-outline-secondary">

                                Limpar itens

                            </button>
                            <h3
                                class="valor-total"
                                id="total-venda">

                                Total: R$ 0,00

                            </h3>
                        </div>

                    </div>
                </div>

            </div>


            <!-- COLUNA DIREITA -->
            <div class="col-lg-4">

                <!-- RESUMO -->
                <div class="card card-venda mb-4">

                    <div class="card-body">

                        <h4 class="titulo-card">
                            Resumo da venda
                        </h4>

                        <div class="resumo-item">
                            <span>Subtotal</span>
                            <strong id="subtotal">
                                R$ 0,00
                            </strong>
                        </div>

                        <div class="resumo-item">
                            <span>Desconto</span>
                            <strong
                                class="text-danger"
                                id="valor-desconto">

                                R$ 0,00

                            </strong>
                        </div>

                        <hr>

                        <div class="resumo-total">
                            <span>Total</span>
                            <h2 id="total-resumo">
                                R$ 0,00
                            </h2>
                        </div>

                    </div>
                </div>


                <!-- PAGAMENTO -->
                <div class="card card-venda">

                    <div class="card-body">

                        <h2 class="titulo-card mb-4">

                            Pagamento
                        </h2>


                        <div class="mb-3">
                            <label class="form-label">Forma de pagamento</label>

                            <select
                                name="id_forma_pagamento"
                                id="id_forma_pagamento"
                                class="form-select">

                                <?php foreach ($formasPagamento as $forma): ?>

                                    <option value="<?= $forma['id'] ?>">

                                        <?= $forma['nome'] ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Desconto (R$)
                            </label>

                            <input
                                type="number"
                                id="desconto"
                                class="form-control"
                                value="0"
                                min="0"
                                step="0.01"
                                onchange="atualizarTotal()">

                        </div>


                        <div class="mb-3">
                            <label class="form-label">Observação</label>

                            <textarea
                                id="observacao"
                                class="form-control input-venda"
                                rows="4">
                         </textarea>
                        </div>


                        <button
                            id="confirmar-venda"
                            class="btn btn-success btn-confirmar w-100">
                            <i class="fa-solid fa-check"></i>
                            Confirmar Venda
                        </button>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="assets/js/pedidos.js"></script>
</body>

</html>