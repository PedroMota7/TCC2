<!DOCTYPE html>
<html>

<head>
    <title>controle_cadastro</title>
    <meta charset="utf-8">
</head>

<body>
<?php

session_start();

if (!isset($_POST['email'])) {
    header('Location:../pages/cadastro_user.html');
    exit;
}

$v0 = $_POST['nome'];
$v1 = $_POST['cpf'];
$v2 = $_POST['email'];
$v3 = $_POST['data_nasc'];
$v4 = $_POST['telefone'];

if (!empty($v0) && !empty($v2) && !empty($v1) && !empty($v4)) {
    require '../classes/classes.php'; 
    
    $u = new Usuario("fluxo_tech", "localhost", "root", "");  
    
    
    if (!$u->cadastrarUsuario($v0, $v1, $v2, $v3, $v4)) {
        header('Location:../pages/cadastro_user.html?ja_cadastrado'); 
    } else {
        header('Location:../pages/usuarios.php?sucesso'); 
    }
}
?>
</body>

</html>
