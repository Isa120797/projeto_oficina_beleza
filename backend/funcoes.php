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
        $sql = "SELECT 
            tb_agendamento.*,
            tb_cliente.nome,
            tb_funcionario.nome as funcionario,
            tb_servico.nome_servico
        FROM tb_agendamento
        INNER JOIN tb_cliente ON tb_cliente.id = tb_agendamento.id_cliente
        INNER JOIN tb_funcionario ON tb_funcionario.id = tb_agendamento.id_funcionario
        INNER JOIN tb_servico ON tb_servico.id = tb_agendamento.id_servico

        
        ";
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
