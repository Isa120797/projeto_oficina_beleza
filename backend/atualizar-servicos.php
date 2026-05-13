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

    $nome_servico = $_POST['nome_servico'];
    $descricao    = $_POST['descricao'];
    $preco        = $_POST['preco'];
    $duracao      = $_POST['duracao'];
    $categoria    = $_POST['categoria'];
    $id          = $_GET['id'];

    //monta query SQL

    $sql = "UPDATE tb_servico SET nome_servico='$nome_servico', descricao='$descricao', preco='$preco', duracao='$duracao',categoria='$categoria' WHERE id=$id";

    // prepara a execucao da query acima
    $comando = $conexao->prepare($sql);

    // executa o comando
    $comando->execute();

    //exibe msg de sucesso
    // echo "Funcionário atualizado com sucesso!";
    header('Location:../servicos-lista.php');
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}

//Inserir os dados no banco(cadastro)
