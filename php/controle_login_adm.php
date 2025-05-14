<?php

session_start();

// definindo valor para uma variavel de sessão para ser testado em outros scripts. 
// $_SESSION['autenticado'] = 'NAO';

if(!isset($_POST['email']) || !isset($_POST['senha']))
{
  HEADER('Location:../pages/Login.php?Branco');
  exit();
}


$email = $_POST['email'];

$senha = trim($_POST['senha']); // para evitar vir espaços em branco


require '../classes/classes.php'; // para executar a classe
$u = new Administrador("fluxo_tech","localhost","root","");  // instanciando



if($u->pesquisarAdministradorLogin($email, $senha))
{
	$_SESSION['autenticado'] = 'SIM';
    $_SESSION['email'] = $email;

	header('location: ../pages/cadastro_user.php');
	exit();
}
else
{
	header('location: ../pages/Login.php?invalido');
	exit();
}



?>