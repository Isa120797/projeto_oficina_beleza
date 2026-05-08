<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="assets/css/funcionario/funcionario.css">
</head>

<body>


    <?php require_once 'includes/header.php';
    ?>
    <div class="container">

        <h1>Cadastro de Clientes</h1>

        <form action="backend/cadastrar-clientes.php" method="post" enctype="multipart/form-data">

            <div class="form-grid">

                <div class="input-group">
                    <label>Nome</label>
                    <input type="text" id="nome" name="nome">
                </div>

                <div class="input-group">
                    <label>Data de nascimento</label>
                    <input type="date" id="data_nascimento" name="data_nascimento">
                </div>

                <div class="input-group">
                    <label>Data de Cadastro</label>
                    <input type="date" id="data_cadastro" name="data_cadastro">
                </div>

                <div class="input-group">
                    <label>Endereço</label>
                    <input type="text" id="endereco" name="endereco">
                </div>

                <div class="input-group">
                    <label>E-mail</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="input-group">
                    <label>Telefone</label>
                    <input type="number" id="telefone" name="telefone">
                </div>
                <div class="input-group">
                    <label>Cidade</label>
                    <input type="text" id="cidade" name="cidade">
                </div>
                <div class="input-group">
                    <label>Estado</label>
                    <input type="text" id="estado" name="estado">
                </div>

            </div>


            <input type="submit" value="Cadastrar">
        </form>


    </div>

</body>

</html>