<?php

require_once 'backend/conexao.php';

$id = $_GET['id'];

$sql = "
SELECT *
FROM tb_cliente
WHERE id = ?
";

$comando = $conexao->prepare($sql);
$comando->execute([$id]);

echo json_encode(
    $comando->fetch(PDO::FETCH_ASSOC)
);