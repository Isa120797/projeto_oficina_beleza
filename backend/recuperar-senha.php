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

        // Armazena o ID do login
        $id = $verifica_email['id'];

        // Gera um token para recuperação de senha
        $token = md5(uniqid());

        // Apaga os tokens antigos do usuário
        $sql = "DELETE FROM tb_token_recuperar_senha WHERE id_login = $id";
        $comando = $conexao->prepare($sql);
        $comando->execute();

        // Salva o novo token
        $sql = "INSERT INTO tb_token_recuperar_senha (id_login, token)
                VALUES ($id, '$token')";
        $comando = $conexao->prepare($sql);
        $comando->execute();

        // Envia o e-mail
        enviaEmail($email, $token);

        ?>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>E-mail Enviado</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

            <style>
                body {
                    height: 100vh;
                    margin: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-image: url("../assets/img/Fundo suave com brilhos delicados.png");
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                }

                .card-sucesso {
                    width: 500px;
                    background: rgba(255, 255, 255, 0.95);
                    border-radius: 15px;
                    padding: 35px;
                    text-align: center;
                    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                }

                .icone {
                    font-size: 60px;
                    color: #28a745;
                }

                .btn-rosa {
                    background-color: #e83e8c;
                    border: none;
                    color: white;
                }

                .btn-rosa:hover {
                    background-color: #d63384;
                    color: white;
                }
            </style>
        </head>

        <body>

            <div class="card-sucesso">

                <div class="icone">
                    ✓
                </div>

                <h3 class="mt-3">E-mail enviado com sucesso!</h3>

                <p class="mt-3">
                    Verifique sua caixa de entrada e também a pasta de spam.
                    Enviamos um link para redefinir sua senha.
                </p>

                <a href="../login.php" class="btn btn-rosa mt-3">
                    Voltar para o Login
                </a>

            </div>

        </body>

        </html>
        <?php

    } else {

        echo "
        <script>
            alert('E-mail não encontrado!');
            history.back();
        </script>
        ";

    }

} catch (PDOException $erro) {

    error_log($erro->getMessage());

    echo "
    <script>
        alert('Não foi possível processar a solicitação.');
        history.back();
    </script>
    ";
}
?>