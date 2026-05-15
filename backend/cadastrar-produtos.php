<?php
//incluir o arquivo de conexao
require_once 'conexao.php';


//Inserir captura dos dados enviados pelo frontend(form)
try {
    $nome           = $_POST['nome'];
    $marca          = $_POST['marca'];
    $categoria      = $_POST['categoria'];
    $preco_custo    = $_POST['preco_custo'];
    $preco_venda    = $_POST['preco_venda'];
    $estoque_atual  = $_POST['estoque_atual'];
    $estoque_minimo = $_POST['estoque_minimo'];


    //monta query SQL

    $sql = "INSERT INTO tb_produto(nome,marca,categoria,preco_custo,preco_venda,estoque_atual,estoque_minimo) VALUES('$nome','$marca','$categoria','$preco_custo','$preco_venda','$estoque_atual','$estoque_minimo')";

    // prepara a execucao da query acima
    $comando = $conexao->prepare($sql);

    // executa o comando
    $comando->execute();

    // exibe msg de sucesso
    // echo "Cadastro realizado com sucesso!";
    header('Location:../produtos-lista.php');
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}

//Inserir os dados no banco(cadastro)