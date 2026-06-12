<?php
require_once 'conexao.php';

try {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_login WHERE email = ?";

    $comando = $conexao->prepare($sql);
    $comando->execute([$email]);

    $dados = $comando->fetch(PDO::FETCH_ASSOC);

    if ($dados != null) {

        $senha_hash_banco = $dados['senha'];

        if (password_verify($senha, $senha_hash_banco)) {

            session_start();

            $_SESSION['logado'] = "sim";
            $_SESSION['id_usuario'] = $dados['id'];
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['email'] = $dados['email'];

            header("Location: ../dashboard.php");
            exit;

        } else {

            header("Location: ../login.php?erro=1");
            exit;

        }

    } else {

        header("Location: ../login.php?erro=1");
        exit;

    }

} catch (PDOException $erro) {

    error_log($erro->getMessage());

    header("Location: ../login.php?erro=2");
    exit;
}