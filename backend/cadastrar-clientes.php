<?php

//conexão do PHP com o banco de dados
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BANCO', 'db_oficina_beleza');

//string de conexão usando PDO
try {

    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Conectado com sucesso!";
    // capturar os dados enviados pelo frontend(form)

    $nome                    = $_POST['nome'];
    $data_nascimento         = $_POST['data_nascimento'];
    $data_cadastro           = $_POST['data_cadastro'];
    $endereco                = $_POST['endereco'];
    $email                   = $_POST['email'];
    $telefone                = $_POST['telefone'];
    $cidade                  = $_POST['cidade'];
    $estado                  = $_POST['estado'];



    //monta a query SQL
    $sql = "INSERT INTO tb_cliente(nome, data_nascimento, data_cadastro, endereco,email, telefone,cidade , estado)
VALUES('$nome','$data_nascimento', '$data_cadastro','$endereco' ,'$email','$telefone','$cidade','$estado')";

    //prepara a execução da query acima
    $comando = $conexao->prepare($sql);

    // executa o comando
    $comando->execute();

    header('Location:../clientes-lista.php');
    // exibe msg de sucesso
    echo "Cadastro realizado com sucesso!";
} catch (PDOException $erro) {
    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}
