let carrinho = [];
const btnAdicionar =
    document.getElementById('btn-adicionar-produto');

btnAdicionar.addEventListener(
    'click',
    adicionarProduto
);

function adicionarProduto() {

    const selectProduto =
        document.getElementById('produto');

    const optionSelecionada =
        selectProduto.options[
        selectProduto.selectedIndex
        ];

    if (selectProduto.value == '') {

        mostrarMensagem(
            'Adicione produtos à venda',
            'warning'
        );

        return;
    }

    const idProduto = selectProduto.value;
    const estoque =
        parseInt(
            optionSelecionada.dataset.estoque
        );
    if (estoque <= 0) {

        mostrarMensagem(
            'Produto sem estoque disponível',
            'danger'
        );

        return;
    }

    const produtoExistente =
        carrinho.find(item =>
            item.id == idProduto
        );

    if (produtoExistente) {

        if (
            produtoExistente.quantidade <
            produtoExistente.estoque
        ) {

            produtoExistente.quantidade++;

        } else {

            mostrarMensagem(
                'Estoque máximo atingido',
                'warning'
            );

            return;
        }

    } else {
        const produto = {

            id: selectProduto.value,

            nome:
                optionSelecionada.dataset.nome,

            preco:
                parseFloat(
                    optionSelecionada.dataset.preco
                ),

            estoque:
                parseInt(
                    optionSelecionada.dataset.estoque
                ),

            quantidade: 1
        };

        carrinho.push(produto);
    }

    renderizarCarrinho();
}

function renderizarCarrinho() {

    const tabela =
        document.getElementById(
            'itens-venda'
        );

    tabela.innerHTML = '';

    carrinho.forEach((item, indice) => {

        tabela.innerHTML += `

        <tr>

            <td>
                ${item.nome}
            </td>

            <td>
                R$ ${item.preco.toFixed(2)}
            </td>

            <td>

               <input
                type="number"
                value="${item.quantidade}"
                min="1"
                class="form-control"
                onchange="alterarQuantidade(${indice}, this.value)">

            </td>

            <td>

                R$ ${(
                item.preco *
                item.quantidade
            ).toFixed(2)}

            </td>

            <td>

                <button
                    class="btn btn-danger btn-sm"
                    onclick="removerProduto(${indice})">

                    <i class="fa-solid fa-trash"></i>

                </button>

            </td>

        </tr>

        `;
    });

    atualizarTotal();
}

function atualizarTotal() {

    let subtotal = 0;

    carrinho.forEach(item => {

        subtotal +=
            item.preco *
            item.quantidade;

    });

    let desconto =
        parseFloat(
            document.getElementById(
                'desconto'
            ).value
        ) || 0;

    if (desconto > subtotal) {

        desconto = subtotal;

        document.getElementById(
            'desconto'
        ).value =
            subtotal.toFixed(2);
    }

    let total =
        subtotal - desconto;

    document.getElementById(
        'subtotal'
    ).innerHTML =
        'R$ ' +
        subtotal.toFixed(2);

    document.getElementById(
        'valor-desconto'
    ).innerHTML =
        'R$ ' +
        desconto.toFixed(2);

    document.getElementById(
        'total-resumo'
    ).innerHTML =
        'R$ ' +
        total.toFixed(2);

    document.getElementById(
        'total-venda'
    ).innerHTML =
        'Total: R$ ' +
        total.toFixed(2);
}

function removerProduto(indice) {

    carrinho.splice(
        indice,
        1
    );

    renderizarCarrinho();
}

function alterarQuantidade(
    indice,
    quantidade
) {

    quantidade =
        parseInt(
            quantidade
        );

    if (
        quantidade < 1
    ) {

        quantidade = 1;
    }

    carrinho[indice]
        .quantidade =
        quantidade;

    renderizarCarrinho();
}


const selectCliente =
    document.getElementById('id_cliente');

selectCliente.addEventListener(
    'change',
    carregarCliente
);


function carregarCliente() {

    const idCliente =
        document.getElementById(
            'id_cliente'
        ).value;

    if (idCliente == '') {

        document.getElementById(
            'dados-cliente'
        ).innerHTML =
            '<h5>Selecione um cliente</h5>';

        return;
    }

    fetch(
        'buscar-cliente.php?id=' +
        idCliente
    )

        .then(resposta =>
            resposta.json()
        )

        .then(cliente => {

            document.getElementById(
                'dados-cliente'
            ).innerHTML = `

            <h5>
                ${cliente.nome}
            </h5>

            <p>

                ${cliente.telefone}
                <br>

                ${cliente.email}

            </p>

            <span>

                ${cliente.endereco}

                <br>

                ${cliente.cidade}
                -
                ${cliente.estado}

            </span>

        `;

        });
}

document
    .getElementById(
        'confirmar-venda'
    )
    .addEventListener(
        'click',
        salvarPedido
    );


function salvarPedido() {

    const idCliente =
        document.getElementById(
            'id_cliente'
        ).value;

    const idFormaPagamento =
        document.getElementById(
            'id_forma_pagamento'
        ).value;

    if (idCliente == '') {
        mostrarMensagem(
            'Selecione um cliente',
            'warning'
        );

        return;
    }

    if (carrinho.length == 0) {

        mostrarMensagem(
            'Selecione um produto',
            'warning'
        );

        return;
    }

    let valorTotal = 0;

    carrinho.forEach(item => {

        valorTotal +=
            item.preco *
            item.quantidade;

    });

    fetch(
        'salvar-pedido.php',
        {
            method: 'POST',

            headers: {
                'Content-Type':
                    'application/json'
            },

            body: JSON.stringify({

                id_cliente:
                    idCliente,

                id_forma_pagamento:
                    idFormaPagamento,

                valor_total: valorTotal,
                desconto: desconto,

                itens:
                    carrinho
            })
        }
    )

        .then(resposta =>
            resposta.json()
        )

        .then(retorno => {

            if (retorno.sucesso) {

                mostrarMensagem(
                    'Venda realizada com sucesso!',
                    'success'
                );

                setTimeout(() => {

                    location.reload();

                }, 2000);

            } else {

                mostrarMensagem(
                    'Erro ao salvar venda',
                    'danger'
                );
            }
        });
}
const desconto =
    parseFloat(
        document.getElementById(
            'desconto'
        ).value
    ) || 0;


function mostrarMensagem(texto, tipo) {

    document.getElementById('mensagem').innerHTML = `
        <div class="alert alert-${tipo}">
            ${texto}
        </div>
    `;

    setTimeout(() => {
        document.getElementById('mensagem').innerHTML = '';
    }, 3000);
}

document
    .getElementById('btn-limpar-itens')
    .addEventListener(
        'click',
        limparCarrinho
    );

    function limparCarrinho() {

    if(carrinho.length == 0){

        alert(
            'Não existem itens na venda'
        );

        return;
    }

    if(
        confirm(
            'Deseja remover todos os itens?'
        )
    ){

        carrinho = [];

        renderizarCarrinho();

    }

}
document
    .getElementById(
        'btn-cancelar-venda'
    )
    .addEventListener(
        'click',
        cancelarVenda
    );

    function cancelarVenda() {

    if(
        !confirm(
            'Deseja cancelar esta venda?'
        )
    ){
        return;
    }

    carrinho = [];

    renderizarCarrinho();

    document.getElementById(
        'id_cliente'
    ).value = '';

    document.getElementById(
        'id_forma_pagamento'
    ).selectedIndex = 0;

    document.querySelector(
        'textarea'
    ).value = '';

    document.getElementById(
        'dados-cliente'
    ).innerHTML =
        '<h5>Selecione um cliente</h5>';

    mostrarMensagem(
        'Venda cancelada!',
        'warning'
    );

}