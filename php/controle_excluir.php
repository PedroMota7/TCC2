

<?php
session_start();
	


if(isset($_POST['id_ex']))
{
	
	require '../classes/classes.php'; // para executar a classe
    
    $id_ex = $_POST['id_ex']; // Pegando o ID do usuário a excluir

	$u = new Usuario("fluxo_tech","localhost","root","");  // instanciando
	$u->excluirUsuario($id_ex);

    header("Location: ../pages/usuarios.php");

 
}


?>
