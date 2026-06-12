<?php

require_once 'backend/conexao.php';

try {

    $id = $_GET['id'];

    $sql = "
        SELECT
            c.nome,
            c.observacao,
            s.nome_servico,
            a.valor,
            a.data
        FROM tb_agendamento a
        INNER JOIN tb_cliente c
            ON a.id_cliente = c.id
        INNER JOIN tb_servico s
            ON a.id_servico = s.id
        WHERE a.id_cliente = ?
        ORDER BY a.data DESC
    ";

    $comando = $conexao->prepare($sql);

    $comando->execute([$id]);

    $agendamentos = $comando->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $erro) {

    error_log($erro->getMessage());

    echo "Não foi possível buscar os dados";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $observacao = $_POST['observacao'];

    $sql = "
        UPDATE tb_cliente
        SET observacao = ?
        WHERE id = ?
    ";

    $comando = $conexao->prepare($sql);
    $comando->execute([$observacao, $id]);

    header("Location: historico-clientes.php?id=$id");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico do Cliente</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/funcionario/clientes.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <?php require_once 'includes/header.php'; ?>

    <main>

        <div class="container">

            <h1 class="titulo-pagina">Histórico do Cliente</h1>

            <a href="lista-clientes.php" class="btn-voltar">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
            <div class="card-observacao">

                <h2>Observações do Cliente</h2>

                <form method="POST">

                    <textarea
                        name="observacao"
                        rows="5"
                        placeholder="Digite observações sobre o cliente..."><?= $agendamentos[0]['observacao'] ?? '' ?></textarea>

                    <button type="submit" class="btn-salvar">
                        Salvar Observação
                    </button>

                </form>

            </div>

            <?php if (empty($agendamentos)) : ?>

                <p class="sem-registro">
                    Este cliente ainda não possui atendimentos cadastrados.
                </p>

            <?php else : ?>

                <div class="table-container">

                    <table>

                        <thead>
                            <tr>
                                <th>Nome</th>
                    
                                <th>Serviço</th>
                                <th>Valor</th>
                                <th>Data do Atendimento</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($agendamentos as $agendamento) : ?>

                                <tr>

                                    <td>
                                        <?= $agendamento['nome'] ?>
                                    </td>

                                   

                                    <td>
                                        <?= $agendamento['nome_servico'] ?>
                                    </td>

                                    <td>
                                        R$ <?= number_format($agendamento['valor'], 2, ',', '.') ?>
                                    </td>

                                    <td>
                                        <?= date('d/m/Y', strtotime($agendamento['data'])) ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php endif; ?>

        </div>

    </main>

</body>

</html>