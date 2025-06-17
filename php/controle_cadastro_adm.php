<!DOCTYPE html>
<html>

<head>
    <title>Controle de Cadastro</title>
    <meta charset="utf-8">
</head>

<body>
<?php
if (!isset($_POST['email'])) {
    header('Location:../pages/cadastro_adm.php');
    exit;
}

$v0 = $_POST['nome'];
$v1 = $_POST['email'];
$v2 = $_POST['cpf'];
$v3 = $_POST['cnpj'];
$v4 = $_POST['senha'];

if (!empty($v0) && !empty($v2) && !empty($v1) && !empty($v4)) {
    require '../classes/classes.php'; 
    
    $u = new Administrador("fluxo_tech", "localhost", "root", "");  
    
    $resultado = $u->cadastrarAdministrador($v0, $v1, $v2, $v3, $v4);

    if ($resultado === "email_existente") {
        header('Location:../pages/cadastro_adm.php?erro=email'); 
    } elseif ($resultado === "cpf_existente") {
        header('Location:../pages/cadastro_adm.php?erro=cpf'); 
    } elseif ($resultado === "sucesso") {
        header('Location:../pages/Login.php?sucesso'); 
    }
}
?>
</body>

</html>
