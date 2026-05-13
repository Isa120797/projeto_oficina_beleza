<?php

require_once 'conexao.php';


try {

    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Conectado com sucesso!";
    // capturar os dados enviados pelo frontend(form)

    $cliente                    = $_POST['cliente'];
    $funcionario                = $_POST['funcionario'];
    $servico                    = $_POST['servico'];
    $data                       = $_POST['data'];
    $hora                       = $_POST['hora'];
    $valor                      = $_POST['valor'];



    //monta a query SQL
    $sql = "INSERT INTO tb_agendamento(cliente, funcionario, servico, data ,hora, valor)
VALUES('$cliente','$funcionario', '$servico','$data' ,'$hora','$valor')";

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
