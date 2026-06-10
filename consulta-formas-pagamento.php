<?php

require_once 'backend/conexao.php';

$sql = "
SELECT *
FROM tb_formas_pagamento
WHERE status = 1
";

$comando = $conexao->prepare($sql);
$comando->execute();

$formasPagamento =
$comando->fetchAll(PDO::FETCH_ASSOC);