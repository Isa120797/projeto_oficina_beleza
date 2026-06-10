<?php

require_once 'backend/conexao.php';

$id = $_GET['id'];

$sql = "
SELECT
    p.id,
    p.valor_total,
    p.data_hora,
    c.nome AS cliente,
    fp.nome AS forma_pagamento
FROM tb_pedido p

INNER JOIN tb_cliente c
ON c.id = p.id_cliente

INNER JOIN tb_formas_pagamento fp
ON fp.id = p.id_forma_pagamento

WHERE p.id = ?
";

$comando = $conexao->prepare($sql);
$comando->execute([$id]);

$venda = $comando->fetch(PDO::FETCH_ASSOC);

$sql = "
SELECT
    pp.quantidade,
    pr.nome,
    pr.preco_venda
FROM tb_produtos_pedido pp

INNER JOIN tb_produto pr
ON pr.id = pp.id_produto

WHERE pp.id_pedido = ?
";

$comando = $conexao->prepare($sql);
$comando->execute([$id]);

$itens = $comando->fetchAll(PDO::FETCH_ASSOC);