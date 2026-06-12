<?php

require_once 'conexao.php';
try {
    $token     = $_GET['token'];
    $senha     = $_POST['senha'];
    $confirmar = $_POST['confirmar'];

    if ($senha != $confirmar) {
        echo "Senhas não conferem, digite e tente novamente!";
        exit;
    }

    //gerar o hash da senha digitada usando o alg ARGON2ID
    $senha_hash = password_hash($senha, PASSWORD_ARGON2ID);

    $sql = "SELECT id_login FROM tb_token_recuperar_senha WHERE token = '$token'";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $dados_login = $comando->fetch(PDO::FETCH_ASSOC);
    $id_login = $dados_login['id_login'];

    // atualiza a senha do usuário
    $sql = "UPDATE tb_login SET senha = '$senha_hash' WHERE id = $id_login";
    $comando = $conexao->prepare($sql);
    $comando->execute();


    // deleta os tokens do usuário
    $sql = "DELETE FROM tb_token_recuperar_senha  WHERE id_login = $id_login";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    echo "Senha alterada com sucesso";
} catch (PDOException $erro) {
    // guarda o erro gerado no log do servidor
    error_log($erro->getMessage());

    //exibe a mensagem de erro
    echo "Não foi possível cadastrar";
}
