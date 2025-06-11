<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome     = htmlspecialchars($_POST['nome']);
    $email    = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    $mensagem = htmlspecialchars($_POST['mensagem']);

    if (!$email) {
        exit("Email inválido.");
    }

    $mail = new PHPMailer(true);

    try {
        // Configurações SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'fluxotechsystems@gmail.com';        // Seu email
        $mail->Password   = 'pizk wynj fntl bqjj';     // Senha de app
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Você é o remetente oficial (por causa do Gmail)
        $mail->setFrom('fluxotechsystems@gmail.com', 'Suporte');

        // Pessoa que recebe a mensagem (você)
        $mail->addAddress('fluxotechsystems@gmail.com', 'Você');

        // Define o "Reply-To" como o email da pessoa que preencheu o formulário
        $mail->addReplyTo($email, $nome);

        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = "Nova mensagem de suporte: " ;
        $mail->Body = "
            <strong>Nome:</strong> {$nome}<br>
            <strong>Email:</strong> {$email}<br><br>
            <strong>Mensagem:</strong><br>" . nl2br($mensagem);

        $mail->send();
             header('Location:../pages/suporte.php?Enviado_com_sucesso');
    exit;
    } catch (Exception $e) {
        echo "Erro ao enviar email: {$mail->ErrorInfo}";
    }
} else {
    echo "Acesso inválido.";
}
