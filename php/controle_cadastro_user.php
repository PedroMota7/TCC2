<?php
require 'conexao.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

session_start();

if (!isset($_POST['email'])) {
    header('Location:../pages/cadastro_user.php');
    exit;
}

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$data_nasc = $_POST['data_nasc'];
$telefone = $_POST['telefone'];

// Gera QR Code único
$qr_code = md5($email . time());
$url = $qr_code;

// Gerar imagem do QR
$qrImageUrl = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($url);
$imagem = file_get_contents($qrImageUrl);

// Diretório correto onde será salvo o QR Code
$diretorioQr = __DIR__ . "/qrcodes";
if (!is_dir($diretorioQr)) {
    @mkdir($diretorioQr, 0777, true);
}

// Caminho completo do arquivo de imagem
$caminhoImagem = $diretorioQr . "/qr_$qr_code.png";
file_put_contents($caminhoImagem, $imagem);

try {
    $pdo = new PDO("mysql:host=localhost;dbname=fluxo_tech", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o e-mail já existe
    $verificaEmail = $pdo->prepare("SELECT * FROM db_use WHERE email = :email");
    $verificaEmail->bindValue(":email", $email);
    $verificaEmail->execute();

    if ($verificaEmail->rowCount() > 0) {
        header('Location:../pages/cadastro_user.php?ja_cadastrado_email');
        exit;
    }

    // Verifica se o CPF já existe
    $verificaCPF = $pdo->prepare("SELECT * FROM db_use WHERE cpf = :cpf");
    $verificaCPF->bindValue(":cpf", $cpf);
    $verificaCPF->execute();

    if ($verificaCPF->rowCount() > 0) {
        header('Location:../pages/cadastro_user.php?ja_cadastrado_cpf');
        exit;
    }

    // Insere novo usuário
    $stmt = $pdo->prepare("INSERT INTO db_use (nome, cpf, email, data_nasc, telefone, qr_code)
                           VALUES (:n, :c, :e, :d, :t, :q)");
    $stmt->bindValue(":n", $nome);
    $stmt->bindValue(":c", $cpf);
    $stmt->bindValue(":e", $email);
    $stmt->bindValue(":d", $data_nasc);
    $stmt->bindValue(":t", $telefone);
    $stmt->bindValue(":q", $qr_code);
    $stmt->execute();
} catch (PDOException $e) {
    exit("Erro no banco de dados: " . $e->getMessage());
}

// Envia o e-mail com o QR Code
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'fluxotechsystems@gmail.com';
    $mail->Password = 'pizk wynj fntl bqjj';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('fluxotechsystems@gmail.com', 'Controle de Acesso');
    $mail->addAddress($email, $nome);

    $mail->isHTML(true);
    $mail->Subject = 'Seu QR Code de Acesso';
    $mail->Body    = "Olá, <strong>$nome</strong>!<br>Seu QR Code está em anexo. Apresente-o na entrada.";
    $mail->addAttachment($caminhoImagem);

    $mail->send();
    header('Location:../pages/usuarios.php?cadastrado_realizado');
} catch (Exception $e) {
    echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
}
?>
