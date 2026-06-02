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

function listarAgendamentoDados($id)
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
        WHERE tb_agendamento.id=$id";
        $comando = $conexao->prepare($sql);
        $comando->execute();

        //armazena em um array as pizzas cadastradas no banco de dados
        return $comando->fetchAll(PDO::FETCH_ASSOC);

        //formata o código para exibição via var_dump
        // echo"<pre>";
        // var_dump($pizzas);



    } catch (PDOException $erro) {
        echo "Erro ao conectar no banco de dados" . $erro->getMessage();
    }
}

function alterarAtivoCliente($id)
{
   global $conexao;
   try {
      $sql = "UPDATE tb_cliente SET ativo = 1-ativo WHERE id=:id";
      $comando = $conexao->prepare($sql);
      $comando->bindValue(':id', $id);
      $comando->execute();
      header('Location:clientes-lista.php');
   }  catch (Exception $e) {
    echo $e->getMessage();
}
}