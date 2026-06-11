<?php

require_once 'backend/conexao.php';

$dados = json_decode(
    file_get_contents("php://input"),
    true
);

$idCliente =
    $dados['id_cliente'];

$idFormaPagamento =
    $dados['id_forma_pagamento'];

$valorTotal =
    $dados['valor_total'];

$itens =
    $dados['itens'];

try {

    $conexao->beginTransaction();

    $sql = "
    INSERT INTO tb_pedido
    (
        valor_total,
        id_cliente,
        id_forma_pagamento
    )
    VALUES
    (
        ?,
        ?,
        ?
    )
    ";

    $comando =
        $conexao->prepare($sql);

    $comando->execute([
        $valorTotal,
        $idCliente,
        $idFormaPagamento
    ]);

    $idPedido =
        $conexao->lastInsertId();

    foreach($itens as $item){

        $sql = "
        INSERT INTO tb_produtos_pedido
        (
            id_pedido,
            id_produto,
            quantidade
        )
        VALUES
        (
            ?,
            ?,
            ?
        )
        ";

        $comando =
            $conexao->prepare($sql);

        $comando->execute([
            $idPedido,
            $item['id'],
            $item['quantidade']
        ]);

        $sql = "
        UPDATE tb_produto
        SET estoque_atual =
            estoque_atual - ?
        WHERE id = ?
        ";

        $comando =
            $conexao->prepare($sql);

        $comando->execute([
            $item['quantidade'],
            $item['id']
        ]);
    }

    $conexao->commit();

    echo json_encode([
        'sucesso' => true
    ]);

} catch(Exception $e){

    $conexao->rollBack();

    echo json_encode([
        'sucesso' => false
    ]);
}