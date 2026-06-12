<?php

session_start();

require_once 'conexao.php';

try {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($senha != $confirmar_senha) {

        $_SESSION['erro_cadastro'] = "As senhas não conferem.";

        header("Location: ../cadastro-login-funcionario.php");
        exit;
    }

    // Gera hash da senha
    $senha_hash = password_hash($senha, PASSWORD_ARGON2I);

    $sql = "INSERT INTO tb_login(nome, email, senha)
            VALUES (?, ?, ?)";

    $comando = $conexao->prepare($sql);

    $comando->execute([
        $nome,
        $email,
        $senha_hash
    ]);

    $_SESSION['sucesso'] = "Conta criada com sucesso!";

    header("Location: ../login.php");
    exit;

} catch (PDOException $erro) {

    error_log($erro->getMessage());

    $_SESSION['erro_cadastro'] = "Não foi possível cadastrar.";

    header("Location: ../cadastro-login-funcionario.php");
    exit;
}