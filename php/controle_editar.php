<?php
session_start();

// Ve se os dados foram enviados
if (isset($_POST['id'])) {
    
    require '../classes/classes.php';
    $u = new Usuario("fluxo_tech", "localhost", "root", "");

   
    $id_usuario = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $data = $_POST['data_nasc']; 
    $telefone = $_POST['telefone'];

   
    $u->alterarUsuario($id_usuario, $nome, $cpf, $email, $data, $telefone);

   
    header("Location: ../pages/usuarios.php");
    exit();
} 
?>
