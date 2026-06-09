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


$sql = "
SELECT
    a.hora,
    c.nome AS cliente,
    s.nome_servico,
    f.nome AS funcionario
FROM tb_agendamento a
INNER JOIN tb_cliente c
    ON a.id_cliente = c.id
INNER JOIN tb_servico s
    ON a.id_servico = s.id
INNER JOIN tb_funcionario f
    ON a.id_funcionario = f.id
WHERE a.data = CURDATE()
ORDER BY a.hora
";

$stmt = $conexao->prepare($sql);
$stmt->execute();

$agenda = $stmt->fetchAll(PDO::FETCH_ASSOC);



$sql = "SELECT valor
        FROM tb_meta
        ORDER BY id DESC
        LIMIT 1";

$stmt = $conexao->query($sql);

$meta = $stmt->fetch(PDO::FETCH_ASSOC);

$metaMes = $meta['valor'] ?? 0;

$sql = "SELECT SUM(valor) AS total
        FROM tb_agendamento
        WHERE MONTH(data) = MONTH(CURDATE())
        AND YEAR(data) = YEAR(CURDATE())";

$stmt = $conexao->query($sql);

$faturamentoMes = $stmt->fetch(PDO::FETCH_ASSOC);

$totalMes = $faturamentoMes['total'] ?? 0;


$percentualMeta = 0;

if ($metaMes > 0) {

    $percentualMeta = ($totalMes / $metaMes) * 100;

    if ($percentualMeta > 100) {
        $percentualMeta = 100;
    }
}