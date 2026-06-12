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
<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Recuperação de Senha</title>
</head>
<body style="margin:0;padding:0;background-color:#f5f7fa;font-family:Arial,Helvetica,sans-serif;">

```
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f5f7fa;padding:40px 20px;">
    <tr>
        <td align="center">

            <table width="600" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);">

                <tr>
                    <td style="padding:40px 40px 20px 40px;text-align:center;">
                        <h1 style="margin:0;color:#1f2937;font-size:28px;font-weight:600;">
                            Recuperação de Senha
                        </h1>
                    </td>
                </tr>

                <tr>
                    <td style="padding:0 40px;">
                        <p style="margin:0;color:#4b5563;font-size:16px;line-height:1.6;text-align:center;">
                            Recebemos uma solicitação para redefinir a senha da sua conta.
                        </p>

                        <p style="margin:20px 0 0 0;color:#4b5563;font-size:16px;line-height:1.6;text-align:center;">
                            Clique no botão abaixo para criar uma nova senha:
                        </p>
                    </td>
                </tr>

                <tr>
                    <td align="center" style="padding:35px 40px;">
                        <a href="http://oficinadebeleza.codigojedi.com.br/nova-senha.php?token=$token"
                           style="display:inline-block;background-color:#111827;color:#ffffff;text-decoration:none;padding:14px 32px;border-radius:8px;font-size:16px;font-weight:600;">
                            Redefinir Senha
                        </a>
                    </td>
                </tr>

                <tr>
                    <td style="padding:0 40px 30px 40px;">
                        <p style="margin:0;color:#6b7280;font-size:14px;line-height:1.6;text-align:center;">
                            Se você não solicitou a alteração da senha, ignore este e-mail.
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="background:#f9fafb;padding:20px;text-align:center;">
                        <p style="margin:0;color:#9ca3af;font-size:12px;">
                            © 2026 Oficina de Beleza. Todos os direitos reservados.
                        </p>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>
```

</body>
</html>


    

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
