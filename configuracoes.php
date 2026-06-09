<?php
require_once 'backend/conexao.php';

$sql = "SELECT * FROM tb_meta ORDER BY id DESC LIMIT 1";
$stmt = $conexao->query($sql);
$metaAtual = $stmt->fetch(PDO::FETCH_ASSOC);

 
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Configurações</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Meta Mensal</h2>

    <form action="salvar-meta.php" method="POST">

        <div class="mb-3">

            <label class="form-label">
                Valor da Meta
            </label>

            <input
                type="number"
                class="form-control"
                name="meta"
                step="0.01"
                required
                value="<?= $metaAtual['valor'] ?? '' ?>">

        </div>

        <button type="submit" class="btn btn-primary">
            Salvar Meta
        </button>

    </form>

</div>

</body>
</html>