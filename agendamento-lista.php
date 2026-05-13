
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

    $sql = "SELECT * FROM tb_agendamento";

    $comando = $conexao->prepare($sql);

    $comando->execute();
    // armazena em um array os funcionarios cadastrados no banco de dados

    $agendamentos = $comando->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Meus agendamentos</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/funcionario/clientes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php require_once 'includes/header.php';
    ?>
    <main>
        <h1 class="titulo-pagina">Meus Agendamentos</h1>
        <div class="top-actions">

            <div class="search-box">
                <input type="text" placeholder="Buscar por nome">
                <button class="btn buscar">Buscar</button>
            </div>

            <div class="action-buttons">
                <a href="cadastrar-agendamento.php" class="btn">Cadastrar</a>
                <a href="#" class="btn outline">Início</a>
            </div>

        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Funcionário</th>
                        <th>Serviço</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Valor Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>



                
                <tbody>
                     <?php
            foreach($agendamentos as $agendamento):
                ?>
                    <tr>

                       <td><?php echo  $agendamento['id'];?></td>
                        <td><?php echo $agendamento['cliente'];?></td>
                        <td><?php echo $agendamento['funcionario'];?></td>
                        <td><?php echo $agendamento['servico'];?></td>
                        <td><?php echo $agendamento['data'];?></td>
                        <td><?php echo $agendamento['hora'];?></td>
                        <td><?php echo $agendamento['valor'];?></td>
                       
                        <td class="acoes">
                            <a class="table-btn " href="editar-agendamento.php?id=<?php echo $agendamento['id'];?>">Editar</a> 
                            <a href="#" class="btn-visualizar">
                                <i class="bi bi-eye"></i> 
                            </a>
                            <a href="#" class="table-btn status">Ativar/Inativar</a>
                        </td>
                    </tr>
                    <?php
endforeach;
?>

                </tbody>
            </table>
        </div>

    </main>

</body>