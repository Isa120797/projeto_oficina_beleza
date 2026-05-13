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

    $sql = "SELECT * FROM tb_servico WHERE id=$id";

    $comando = $conexao->prepare($sql);

    $comando->execute();
    // armazena em um array dos serviços cadastrados no banco de dados

    $servicos = $comando->fetchAll(PDO::FETCH_ASSOC);

    // formata o código para exibição via var_dump
    // echo "<pre>";
    // var_dump($servicos);
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    <link rel="stylesheet" href="assets/css/servico/servico.css">

<body>

    <?php require_once 'includes/header.php';
    ?>

    <div class="container">
        <h1>Atualizar Serviços</h1>


        <form action="backend/atualizar-servicos.php?id=<?php echo $servicos[0]['id']; ?>" method="POST">

            <div class="input-group">
                <label for="nome_servico">Nome do Serviço</label>
                <input value="<?php echo $servicos[0]['nome_servico']; ?>" type="text" name="nome_servico" id="nome_servico">
            </div>

            <div class="input-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao"><?php echo $servicos[0]['descricao']; ?></textarea>
            </div>

            <div class="input-group">
                <label for="preco">Preco</label>
                <input value="<?php echo $servicos[0]['preco']; ?>" type="number" step="0.01" name="preco" id="preco" required />
            </div>

            <div class="input-group">
                <label for="duracao">Duração</label>
                <input value="<?php echo $servicos[0]['duracao']; ?>" type="text" name="duracao" id="duracao">
            </div>

            <div class="input-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" required>
                    <option value="" disable selected>Selecione...</option>
                    <option <?php if ($servicos[0]['categoria'] == 'Cabelo') echo 'selected' ?> value="Cabelo">Cabelo</option>
                    <option <?php if ($servicos[0]['categoria'] == 'Unha') echo 'selected' ?> value="Unha">Unha</option>
                    <option <?php if ($servicos[0]['categoria'] == 'Sobrancelha') echo 'selected' ?> value="Sobrancelha">Sobrancelha</option>
                    <option <?php if ($servicos[0]['categoria'] == 'Maquiagem') echo 'selected' ?> value="Maquiagem">Maquiagem</option>
                </select>
            </div>
            <input type="submit" value="Salvar">
        </form>
    </div>




</body>


</html>