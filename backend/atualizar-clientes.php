<?php

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BANCO', 'db_oficina_beleza');



try {

    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nome                           = $_POST['nome'];
    $data_nascimento                = $_POST['data_nascimento'];
    $endereco                       = $_POST['endereco'];
    $email                          = $_POST['email'];
    $telefone                       = $_POST['telefone'];
    $cidade                         = $_POST['cidade'];
    $estado                         = $_POST['estado'];
    $data_cadastro                  = $_POST['data_cadastro'];
    $status                         = $_POST['status'];
    $id                             = $_GET['id'];

    $sql = "UPDATE tb_cliente SET nome= '$nome', data_nascimento='$data_nascimento', endereco='$endereco',email='$email',telefone='$telefone',cidade='$cidade',estado='$estado',data_cadastro='$data_cadastro', status= '$status' WHERE id= $id";

    $comando = $conexao->prepare($sql);

    $comando->execute();

    header('Location: ../clientes-lista.php');
} catch (PDOException $erro) {
    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}
