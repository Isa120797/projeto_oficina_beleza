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

    $nome           = $_POST['nome'];
    $marca          = $_POST['marca'];
    $categoria      = $_POST['categoria'];
    $preco_custo    = $_POST['preco_custo'];
    $preco_venda    = $_POST['preco_venda'];
    $estoque_atual  = $_POST['estoque_atual'];
    $estoque_minimo = $_POST['estoque_minimo'];
    $id          = $_GET['id'];

    //monta query SQL

    $sql = "UPDATE tb_produto SET nome='$nome', marca='$marca', categoria='$categoria', preco_custo='$preco_custo',preco_venda='$preco_venda',estoque_atual='$estoque_atual',estoque_minimo='$estoque_minimo' WHERE id=$id";

    // prepara a execucao da query acima
    $comando = $conexao->prepare($sql);

    // executa o comando
    $comando->execute();

    //exibe msg de sucesso
    // echo "Funcionário atualizado com sucesso!";
    header('Location:../produtos-lista.php');
} catch (PDOException $erro) {

    echo "Erro ao conectar no banco de dados" . $erro->getMessage();
}

//Inserir os dados no banco(cadastro)
