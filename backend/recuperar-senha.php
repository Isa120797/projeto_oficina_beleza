<?php
require_once 'conexao.php';

// importação do arquivo de envio de e-mails via PHPMAilER
require_once 'envia-email.php';
try {
    $email = $_POST['email'];
    $sql = "SELECT id,email FROM tb_login WHERE email = '$email'";
    $comando = $conexao->prepare($sql);
    $comando->execute();
    $verifica_email = $comando->fetch(PDO::FETCH_ASSOC);

    if ($verifica_email != null) {
        //Armazena o Id do login
        $id = $verifica_email['id'];
        // gera um token para recuperação de senha
        $token = md5(uniqid());

        // apaga os tokens antigos do usuário
        $sql = "DELETE FROM tb_token_recuperar_senha WHERE id_login = $id";
        $comando = $conexao->prepare($sql);
        $comando->execute();

        $sql = "INSERT INTO tb_token_recuperar_senha (id_login,token) VALUES ($id,'$token')";
        $comando = $conexao->prepare($sql);
        $comando->execute();

        //executa a função que irá enviar o token por e-mail
        enviaEmail($email, $token);
    }
    echo "Verifique sua caixa de e-mails, e siga os passos para recuperar sua senha!";
} catch (PDOException $erro) {
    // guarda o erro gerado no log do servidor
    error_log($erro->getMessage());

    //exibe a mensagem de erro
    echo "Não foi possível cadastrar";
}
