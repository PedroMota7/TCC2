<?php
session_start();

if (!isset($_POST['email']) || !isset($_POST['senha'])) {
    header('Location:../pages/Login.php');
    exit();
}

$_SESSION['autenticado'] = 'NAO';

$email_adm = $_POST['email'];
$senha_adm = $_POST['senha'];

$abc = mysqli_connect('localhost', 'root', NULL, 'fluxo_tech') or die('Erro ao se conectar ao banco de dados');

$consulta = "SELECT * FROM adm WHERE email = '$email_adm'";
$result = mysqli_query($abc, $consulta);

if (!$result) {
    header('Location:../pages/Login.php?log=erro');
    exit();
}

$row = mysqli_fetch_array($result);
if (!$row) {
    header('Location:../pages/Login.php?log=erro2');
    exit();
} else {
    $hashArmazenada = $row['senha'];
    if (password_verify($senha_adm, $hashArmazenada)) {
        $_SESSION['email'] = $email_adm;
        $_SESSION['autenticado'] = 'SIM';
        header('Location:../pages/cadastro_user.php');
        exit();
    } else {
        header('Location:../pages/Login.php?log=erro2');
        exit();
    }
}

mysqli_close($abc);
?>
