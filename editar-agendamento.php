<?php

//conexao do PHP com o banco de dados MYSQL


require_once 'backend/funcoes.php';

$id = $_GET['id'];

$agendamentos = listarAgendamentoDados($id);


$funcionarios = listarFuncionario();

$servicos = listarServico();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Cliente</title>
    <link rel="stylesheet" href="assets/css/funcionario/funcionario.css">
</head>

<body>


    <?php require_once 'includes/header.php';
    ?>
    <div class="container">

        <h1>Editar - Agendamentos</h1>

        <form action="backend/atualizar-agendamentos.php?id=<?php echo $agendamentos[0]['id']; ?>" method="post">

            <div class="form-grid">

                <div class="input-group">
                    <label>Cliente</label>
                    <input value="<?php echo $agendamentos[0]['nome']; ?>" type="text" name="cliente" id="cliente" readonly>
                </div>

                <div class="input-group">
                    <label>Funcionário</label>
                    <select name="id_funcionario" id="id_funcionario" required>
                        <?php foreach ($funcionarios as $funcionario): ?>
                            <option value="<?php echo $funcionario['id']; ?>" <?php echo $agendamentos[0]['id_funcionario'] == $funcionario['id'] ? 'selected' : '' ?>><?php echo $funcionario['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="input-group">
                    <label>Serviço</label>
                    <select name="id_servico" id="id_servico" required>
                        <?php foreach ($servicos as $servico): ?>
                            <option value="<?php echo $servico['id']; ?>" <?php echo $agendamentos[0]['id_servico'] == $servico['id'] ? 'selected' : '' ?>><?php echo $servico['nome_servico']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="input-group">
                    <label>Data</label>
                    <input value="<?php echo $agendamentos[0]['data']; ?>" type="date" name="data" id="data">
                </div>


                <div class="input-group">
                    <label>Hora</label>
                    <input value="<?php echo $agendamentos[0]['hora']; ?>" type="time" name="hora" id="hora">
                </div>


                <div class="input-group">
                    <label>Valor Total</label>
                    <input value="<?php echo $agendamentos[0]['valor']; ?>" type="number" name="valor" id="valor">
                </div>


            </div>

            <input type="submit" value="Salvar">

        </form>


    </div>

</body>

</html>