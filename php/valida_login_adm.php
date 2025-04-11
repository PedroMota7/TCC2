

<?php

session_start();

$_SESSION['autenticado'] = 'NAO';

if(!isset($_POST['name']) && $_POST['senha'])
{
HEADER('Location:../pages/Login.html');
}


$email_adm = $_POST['email'];

$senha_adm = $_POST['senha'];
 
$abc = mysqli_connect('localhost', 'root', NULL, 'tcc')
or die ('Erro ao se conectar ao banco de dados');

    
$consulta = "SELECT * FROM adm 
WHERE email = '$email_adm' AND senha = '$senha_adm'";
	


$result = mysqli_query($abc, $consulta);

if(!$result)
{
  HEADER('Location:../pages/Login.html?log=erro');
}

if(!mysqli_fetch_array($result))
{
	HEADER('Location:../pages/Login.html?log=erro2');
}
else
{
	 HEADER('Location:../pages/cadastro_user.html'); 
}


mysqli_close($abc);

?>
