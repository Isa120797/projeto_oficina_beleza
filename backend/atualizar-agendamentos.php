<?php

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BANCO', 'db_oficina_beleza');



try {

    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $funcionario               = $_POST['id_funcionario'];
    $servico                   = $_POST['id_servico'];
    $data                      = $_POST['data'];
    $hora                      = $_POST['hora'];
    $valor                     = $_POST['valor'];
    $id                        = $_GET['id'];

    $sql = "UPDATE tb_agendamento SET  id_funcionario='$funcionario', id_servico='$servico',data='$data',hora='$hora',valor='$valor' WHERE id= $id";

    $comando = $conexao->prepare($sql);

    $comando->execute();

    header('Location: ../agendamento-lista.php');
} catch (PDOException $erro) {
    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}
