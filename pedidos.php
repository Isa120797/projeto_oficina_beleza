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

            <button class="btn btn-light btn-cancelar">
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
                                <select class="form-select input-venda">
                                    <option>Maria Silva</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-outline-primary w-100 btn-adicionar">
                                    <i class="fa-solid fa-plus"></i>
                                    Novo cliente
                                </button>
                            </div>

                        </div>


                        <div class="cliente-info mt-4">

                            <div class="d-flex align-items-center gap-3">

                               

                                <div>
                                    <h5>Maria Silva</h5>

                                    <p>
                                        
                                        (11) 98765-4321 &nbsp; • &nbsp;
                                        maria@email.com
                                    </p>

                                    <span>
                                        Endereço: Rua das Flores, 123 - Centro
                                    </span>
                                </div>

                            </div>

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

                            <select class="form-select input-venda">
                                <option selected disabled>
                                    Selecione um produto
                                </option>

                                <option value="1">
                                    Shampoo
                                </option>

                                <option value="2">
                                    Condicionador
                                </option>

                                <option value="3">
                                    Escova
                                </option>

                                <option value="4">
                                    Secador
                                </option>
                            </select>

                            <div class="col-md-4">
                                <button class="btn btn-outline-primary w-100 btn-adicionar">
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

                                <tbody>

                                    <tr>
                                        <td>
                                            <div class="produto-info">
                                                <strong>Shampoo</strong>
                                                <span>Cód: PROD001</span>
                                            </div>
                                        </td>

                                        <td>R$ 59,90</td>

                                        <td>
                                            <input type="number" value="1" class="form-control quantidade">
                                        </td>

                                        <td>
                                            <strong>R$ 59,90</strong>
                                        </td>

                                        <td>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="produto-info">
                                                <strong>Condicionador</strong>
                                                <span>Cód: PROD002</span>
                                            </div>
                                        </td>

                                        <td>R$ 39,90</td>

                                        <td>
                                            <input type="number" value="2" class="form-control quantidade">
                                        </td>

                                        <td>
                                            <strong>R$ 79,80</strong>
                                        </td>

                                        <td>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>


                        <div class="d-flex justify-content-between align-items-center mt-4">

                            <button class="btn btn-outline-secondary">
                                Limpar itens
                            </button>

                            <h3 class="valor-total">
                                Total: R$ 139,70
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
                            <strong>R$ 139,70</strong>
                        </div>

                        <div class="resumo-item">
                            <span>Desconto</span>
                            <strong class="text-danger">R$ 0,00</strong>
                        </div>

                        <hr>

                        <div class="resumo-total">
                            <span>Total</span>
                            <h2>R$ 139,70</h2>
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

                            <select class="form-select input-venda">
                                <option>Pix</option>
                                <option>Cartão</option>
                                <option>Dinheiro</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Observação</label>

                            <textarea class="form-control input-venda" rows="4"></textarea>
                        </div>


                        <button class="btn btn-success btn-confirmar w-100">
                            <i class="fa-solid fa-check"></i>
                            Confirmar venda
                        </button>

                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>