<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
    <link rel="stylesheet" href="assets/css/funcionario/funcionario.css">
</head>

<body>

    <?php require_once 'includes/header.php';
    ?>

    <div class="container">
        <h1>Cadastro de Funcionários</h1>


        <form action="backend/funcionarios-cadastrar.php" method="POST">
            <div class="input-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="input-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone">
            </div>

            <input type="submit" value="Cadastrar">
        </form>
    </div>

    <script src="assets/js/inputmask.js"></script>

    <script>
        var telefone = document.getElementById('telefone');

        var im = new Inputmask({
            mask: [
                "(99) 9999-9999", // fixo
                "(99) 99999-9999" // celular
            ],
            keepStatic: true
        });

        im.mask(telefone);
    </script>
</body>


</html>