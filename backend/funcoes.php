<?php
require_once 'conexao.php';

function listarCliente()
{
    global $conexao;
    try {
        $sql = "SELECT * FROM tb_cliente";
        $comando = $conexao->prepare($sql);
        $comando->execute();

        //retorna os dados para a "tela do sistema"
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $erro) {
        // guarda o erro gerado no log do servidor
        error_log($erro->getMessage());
        echo "Não foi possível executar a função";
    }
}

function listarFuncionario()
{
    global $conexao;
    try {
        $sql = "SELECT * FROM tb_funcionario";
        $comando = $conexao->prepare($sql);
        $comando->execute();

        //retorna os dados para a "tela do sistema"
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $erro) {
        // guarda o erro gerado no log do servidor
        error_log($erro->getMessage());
        echo "Não foi possível executar a função";
    }
}


function listarServico()
{
    global $conexao;
    try {
        $sql = "SELECT * FROM tb_servico";
        $comando = $conexao->prepare($sql);
        $comando->execute();

        //retorna os dados para a "tela do sistema"
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $erro) {
        // guarda o erro gerado no log do servidor
        error_log($erro->getMessage());
        echo "Não foi possível executar a função";
    }
}

function listarAgendamento()
{
    global $conexao;
    try {
        $sql = "SELECT tb_agendamento.*,tb_cliente.nome FROM tb_agendamento
        INNER JOIN tb_cliente ON tb_cliente.id = tb_agendamento.id_cliente";
        $comando = $conexao->prepare($sql);
        $comando->execute();

        //retorna os dados para a "tela do sistema"
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $erro) {
        // guarda o erro gerado no log do servidor
        error_log($erro->getMessage());
        echo "Não foi possível executar a função";
    }
}
