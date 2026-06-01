<?php
require_once 'backend/funcoes.php';

$clientes = listarCliente();

$funcionarios = listarFuncionario();

$servicos = listarServico();

$agendamento = listarAgendamento();





?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de agendamento</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/cadastro-agendamento.css">
</head>

<body>


    <?php require_once 'includes/header.php';
    ?>
    <div class="container">

        <h1>Cadastro de Agendamento</h1>

        <form action="backend/cadastrar-agendamento.php" method="post" enctype="multipart/form-data">

            <div class="form-grid">

                <div class="input-group">
                    <label for="id_cliente">Cliente</label>

                    <select name="id_cliente" id="id_cliente" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php foreach ($clientes as $cliente): ?>
                            <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="input-group">
                    <label>Funcionário</label>
                    <select name="id_funcionario" id="id_funcionario" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php foreach ($funcionarios as $funcionario): ?>
                            <option value="<?php echo $funcionario['id']; ?>"><?php echo $funcionario['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="input-group">
                    <label>Serviço</label>
                    <select name="id_servico" id="id_servico" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php foreach ($servicos as $servico): ?>
                            <option value="<?php echo $servico['id']; ?>"><?php echo $servico['nome_servico']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="input-group">
                    <label>Data</label>
                    <input type="date" id="data" name="data">
                </div>

                <div class="input-group">
                    <label>Hora</label>
                    <input type="time" id="hora" name="hora">
                </div>
                <div class="input-group">
                    <label>Valor Total</label>
                    <input type="number" step="0.01" id="valor" name="valor">
                </div>

            </div>


            <input type="submit" value="Cadastrar">
        </form>


    </div>

</body>

</html>