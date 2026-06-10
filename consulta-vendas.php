<?php

require_once 'backend/conexao.php';

$sql = "
SELECT
    p.id,
    c.nome AS cliente,
    fp.nome AS forma_pagamento,
    p.valor_total,
    p.data_hora
FROM tb_pedido p
INNER JOIN tb_cliente c
    ON c.id = p.id_cliente
INNER JOIN tb_formas_pagamento fp
    ON fp.id = p.id_forma_pagamento
ORDER BY p.id DESC
";

$comando = $conexao->prepare($sql);
$comando->execute();

$vendas = $comando->fetchAll(PDO::FETCH_ASSOC);