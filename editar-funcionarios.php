<?php

//conexao do PHP com o banco de dados MYSQL

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BANCO', 'db_oficina_beleza');

//string de conexao usando PDO
try {
    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_funcionario WHERE id=$id";

    $comando = $conexao->prepare($sql);

    $comando->execute();
    // armazena em um array os funcionarios cadastrados no banco de dados

    $funcionarios = $comando->fetchAll(PDO::FETCH_ASSOC);

    // formata o código para exibição via var_dump
    // echo "<pre>";
    // var_dump($funcionarios);
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}

?>


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
        <h1>Atualizar Funcionários</h1>


        <form action="backend/atualizar-funcionarios.php?id=<?php echo $funcionarios[0]['id']; ?>" method="POST">
            <div class="input-group">
                <label for="nome">Nome</label>
                <input value="<?php echo $funcionarios[0]['nome']; ?>" type="text" name="nome" id="nome">
            </div>
            <div class="input-group">
                <label for="email">E-mail</label>
                <input value="<?php echo $funcionarios[0]['email']; ?>" type="email" name="email" id="email">
            </div>
            <div class="input-group">
                <label for="telefone">Telefone</label>
                <input value="<?php echo $funcionarios[0]['telefone']; ?>" type="text" name="telefone" id="telefone">
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