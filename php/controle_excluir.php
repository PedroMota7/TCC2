

<?php
session_start();
	


if(isset($_POST['id_ex']))
{
	
	require '../classes/classes.php'; 
    
    $id_ex = $_POST['id_ex']; 

	$u = new Usuario("fluxo_tech","localhost","root","");  
	$u->excluirUsuario($id_ex);

    header("Location: ../pages/usuarios.php");

 
}


?>
