<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de agendamento</title>
    <link rel="stylesheet" href="assets/css/funcionario/funcionario.css">
</head>

<body>


    <?php require_once 'includes/header.php';
    ?>
    <div class="container">

        <h1>Cadastro de Agendamento</h1>

        <form action="backend/cadastrar-agendamento.php" method="post" enctype="multipart/form-data">

            <div class="form-grid">

                <div class="input-group">
                    <label>Cliente</label>
                    <input type="text" id="cliente" name="cliente">
                </div>

                <div class="input-group">
                    <label>Funcionário</label>
                    <input type="text" id="funcionario" name="funcionario">
                </div>

                <div class="input-group">
                    <label>Serviço</label>
                    <input type="text" id="servico" name="servico">
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
                    <input type="number"  step="0.01" id="valor" name="valor">
                </div>
              
            </div>


            <input type="submit" value="Cadastrar">
        </form>


    </div>

</body>

</html>