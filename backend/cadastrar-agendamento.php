<?php

require_once 'conexao.php';


try {

    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Conectado com sucesso!";
    // capturar os dados enviados pelo frontend(form)

    $id_cliente                    = $_POST['id_cliente'];
    $id_funcionario                = $_POST['id_funcionario'];
    $id_servico                    = $_POST['id_servico'];
    $data                          = $_POST['data'];
    $hora                         = $_POST['hora'];
    $valor                        = $_POST['valor'];



    //monta a query SQL
    $sql = "INSERT INTO tb_agendamento(id_cliente,id_funcionario,id_servico, data ,hora, valor)
VALUES('$id_cliente','$id_funcionario', '$id_servico','$data' ,'$hora','$valor')";

    //prepara a execução da query acima
    $comando = $conexao->prepare($sql);

    // executa o comando
    $comando->execute();

    header('Location:../agendamento-lista.php');
    // exibe msg de sucesso
    // echo "Cadastro realizado com sucesso!";
} catch (PDOException $erro) {
    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}
