<?php

require_once 'backend/conexao.php';

$meta = $_POST['meta'];

$sql = "INSERT INTO tb_meta(valor)
        VALUES(:valor)";

$stmt = $conexao->prepare($sql);

$stmt->bindValue(':valor', $meta);

$stmt->execute();

header('Location: dashboard.php');
exit;