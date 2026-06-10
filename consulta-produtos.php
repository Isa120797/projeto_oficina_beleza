<?php

require_once 'backend/conexao.php';

$sql = "
SELECT *
FROM tb_produto
ORDER BY nome
";

$comando = $conexao->prepare($sql);
$comando->execute();

$produtos = $comando->fetchAll(PDO::FETCH_ASSOC);