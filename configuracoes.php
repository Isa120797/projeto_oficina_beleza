<?php
require_once 'backend/verifica-login.php';
require_once 'backend/conexao.php';

$sql = "SELECT * FROM tb_meta ORDER BY id DESC LIMIT 1";
$stmt = $conexao->query($sql);
$metaAtual = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Configurações - Meta Mensal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fb;
            font-family: Arial, Helvetica, sans-serif;
        }

        .card-meta {
            max-width: 600px;
            margin: 60px auto;
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .titulo {
            color: #d63384;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitulo {
            color: #6c757d;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #444;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #d63384;
            box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.25);
        }

        .btn-salvar {
            background: linear-gradient(135deg, #d63384, #ec407a);
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            font-weight: bold;
            color: white;
            transition: 0.3s;
        }

        .btn-salvar:hover {
            transform: translateY(-2px);
            opacity: 0.95;
        }

        .valor-atual {
            background-color: #fff0f6;
            border-left: 5px solid #d63384;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .valor-atual strong {
            color: #d63384;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="card-meta">

            <h2 class="titulo">
                🎯 Meta Mensal
            </h2>

            <p class="subtitulo">
                Configure a meta de faturamento do mês
            </p>

            <?php if (!empty($metaAtual['valor'])) : ?>

                <div class="valor-atual">
                    <strong>Meta Atual:</strong>
                    R$ <?= number_format($metaAtual['valor'], 2, ',', '.') ?>
                </div>

            <?php endif; ?>

            <form action="salvar-meta.php" method="POST">

                <div class="mb-4">

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

                <button type="submit" class="btn-salvar">
                    Salvar Meta
                </button>

            </form>

        </div>

    </div>

</body>

</html>