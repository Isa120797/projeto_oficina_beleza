<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function enviaEmail($emailDestino, $token)
{

    $mail = new PHPMailer(true);

    try {
        $mail = new PHPMailer(true);

        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ooficinadebeleza@gmail.com';                     //SMTP username
        $mail->Password   = 'vkml jojg ayvj ljiw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;
        $mail->CharSet      = 'UTF-8';                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('ooficinadebeleza@gmail.com', 'Oficina de Beleza');
        $mail->addAddress($emailDestino);     //Add a recipient



        // Conteúdo
        $mail->isHTML(true);
        $mail->Subject = 'Recuperação de Senha';

        // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $mail->Body = <<<HTML
<body>
    <h1>Olá, clique no link abaixo para cadastrar uma nova senha</h1>
    <a href="http://localhost/projeto_cardapio/nova-senha.php?token=$token">Recuperar Senha</a>

</body>

    

HTML;

        // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $mail->AltBody = 'Email de cadastro de nova senha!';

        // Enviar
        if ($mail->send()) {
            echo "E-mail enviado com sucesso!";
        } else {
            echo "Erro ao enviar: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Erro: {$mail->ErrorInfo}";
    }
}
