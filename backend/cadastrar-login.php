<?php
require_once 'conexao.php';

try{ 
$nome       = $_POST['nome'];
$email      = $_POST['email'];
$senha      = $_POST['senha'];
$confirmar  = $_POST['confirmar'];

if ($senha != $confirmar){
    echo " Senhas não conferem";
    exit();
    
}

//gerar o hash da senha digitada usando o alg ARGON2ID
$senha_hash = password_hash ($senha,PASSWORD_ARGON2I);

$sql = "INSERT INTO tb_login(nome, email, senha) VALUES('$nome', '$email','$senha_hash') ";
$comando = $conexao->prepare($sql);
$comando->execute();
echo "Cadastrado com Sucesso!";

}catch (PDOException $erro) {
    //guarda o ero gerado no log do servidor
    error_log($erro->getMessage());
    //exibe a mensagem de erro
    echo "Não foi possível cadastrar";
}


?>