<?php
//incluir o arquivo de conexao
require_once 'conexao.php';


//Inserir captura dos dados enviados pelo frontend(form)
try {
    $nome_servico = $_POST['nome_servico'];
    $descricao    = $_POST['descricao'];
    $preco        = $_POST['preco'];
    $duracao      = $_POST['duracao'];
    $categoria    = $_POST['categoria'];


    //monta query SQL

    $sql = "INSERT INTO tb_servico(nome_servico,descricao,preco,duracao,categoria) VALUES('$nome_servico','$descricao','$preco','$duracao','$categoria')";

    // prepara a execucao da query acima
    $comando = $conexao->prepare($sql);

    // executa o comando
    $comando->execute();

    // exibe msg de sucesso
    // echo "Cadastro realizado com sucesso!";
    header('Location:../servicos-lista.php');
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}

//Inserir os dados no banco(cadastro)