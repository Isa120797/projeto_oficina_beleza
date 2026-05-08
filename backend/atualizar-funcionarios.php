<?php
//conexao do PHP com o banco de dados MYSQL

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BANCO', 'db_oficina_beleza');

//string de conexao usando PDO
try {
    $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO . ";charset=utf8", USUARIO, SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Conectado com sucesso!";


    //Inserir captura dos dados enviados pelo frontend(form)

    $nome        = $_POST['nome'];
    $email       = $_POST['email'];
    $telefone    = $_POST['telefone'];
    $id          = $_GET['id'];

    //monta query SQL

    $sql = "UPDATE tb_funcionario SET nome='$nome', email='$email', telefone='$telefone' WHERE id=$id";

    // prepara a execucao da query acima
    $comando = $conexao->prepare($sql);

    // executa o comando
    $comando->execute();

    //exibe msg de sucesso
    // echo "Funcionário atualizado com sucesso!";
    header('Location:../funcionarios-lista.php');
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}

//Inserir os dados no banco(cadastro)
