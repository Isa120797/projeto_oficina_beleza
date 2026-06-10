<?php

require_once 'backend/conexao.php';

$sql = "
SELECT *
FROM tb_cliente
ORDER BY nome
";

$comando = $conexao->prepare($sql);
$comando->execute();

$clientes = $comando->fetchAll(PDO::FETCH_ASSOC);