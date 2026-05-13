<?php
//incluir o arquivo de conexao
require_once 'backend/conexao.php';

//string de conexao usando PDO
try {
    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tb_servico";

    $comando = $conexao->prepare($sql);

    $comando->execute();
    // armazena em um array os serviços cadastrados no banco de dados

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
    <title>Serviços - Lista</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/funcionario/funcionario-lista.css">
</head>

<body>
    <?php require_once 'includes/header.php';
    ?>
    <main>
        <h1 class="titulo-pagina">Serviços</h1>
        <div class="top-actions">

            <div class="search-box">
                <input type="text" placeholder="Buscar por nome">
                <button class="btn buscar">Buscar</button>
            </div>

            <div class="action-buttons">
                <a href="servicos.php" class="btn">Cadastrar</a>
                <a href="#" class="btn outline">Início</a>
            </div>

        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Categoria</th>
                        <th>Nome do Serviço</th>
                        <th>Descrição</th>
                        <th>Duração</th>
                        <th>Data de cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                foreach ($servicos as $servico):
                ?>

                    <tbody>
                        <tr>
                            <td><?php echo $servico['id']; ?></td>
                            <td><?php echo $servico['categoria']; ?></td>
                            <td><?php echo $servico['nome_servico']; ?></td>
                            <td><?php echo $servico['descricao']; ?></td>
                            <td><?php echo $servico['duracao']; ?></td>
                            <td><?php echo $servico['data_cadastro']; ?></td>
                            <td class="acoes">

                                <a class="table-btn editar" href="editar-servicos.php?id=<?php echo $servico['id']; ?>">Editar</a>

                                <a href="#" class="table-btn status">Ativar/Inativar</a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                endforeach;
                ?>
            </table>
        </div>

    </main>

</body>

</html>