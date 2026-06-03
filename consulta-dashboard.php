<?php

require_once 'backend/conexao.php';

// Total de clientes
$sql = "SELECT COUNT(*) AS total FROM tb_cliente";
$stmt = $conexao->query($sql);
$totalClientes = $stmt->fetch(PDO::FETCH_ASSOC);

// Total de agendamentos hoje
$sql = "SELECT COUNT(*) AS total
        FROM tb_agendamento
        WHERE data = CURDATE()";

$stmt = $conexao->query($sql);
$totalAgendamentos = $stmt->fetch(PDO::FETCH_ASSOC);

// Estoque total
$sql = "SELECT SUM(estoque_atual) AS total
        FROM tb_produto";

$stmt = $conexao->query($sql);
$totalEstoque = $stmt->fetch(PDO::FETCH_ASSOC);

// Faturamento do dia
$sql = "SELECT SUM(valor) AS total
        FROM tb_agendamento
        WHERE data = CURDATE()";

$stmt = $conexao->query($sql);
$faturamentoDia = $stmt->fetch(PDO::FETCH_ASSOC);