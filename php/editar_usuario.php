<!DOCTYPE html>
<html>

<head>

<title>editar_usuario</title>
<meta charset="utf-8">

</head>

<body>

<!-- <A href="index.php">Clique aqui para voltar à página inicial.</A> <br> <br> -->

<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM')
{
	header('Location: ../pages/cadastro_user.html');
}


if(isset($_POST['c_nome']) || isset($_POST['c_exc']))
{
	//direciona o comando para  o local determinado aqui dentro
	goto avanca;
}

if(!isset($_GET['log']) || $_GET['log'] != 'val_usu')
{
	header('Location:../pages/cadastro_user.html');
}

$lu = $_SESSION['lembra_usu'];

$abc = mysqli_connect('localhost', 'root', NULL, 'tcc')
or die ('Erro ao se conectar ao banco de dados');

$consulta =  "SELECT * FROM db_use WHERE NOME = '$lu'";

$result = mysqli_query($abc, $consulta);
if(!$result)
{
  header('Location:../pages/cadastro_user.html?log=erro');
}
?>
  <TABLE border=1>
   <TR>
    
    <TD>ID</TD>
    <TD>Nome</TD>
    <TD>CPF</TD>
	<TD>Email</TD>
    <TD>Data de nascimento</TD>
	<TD>Telefone</TD>
	
   </TR>
<?php
  while ($tbl = mysqli_fetch_array($result)) 
  {
    $id = $tbl["ID"];
	$nome  = $tbl["NOME"];
    $cpf   = $tbl["CPF"];
	$email = $tbl["EMAIL"];
	$data_n   = $tbl["DATA_NASC"];
    $tel = $tbl["TELEFONE"];
?>
	
    <FORM method="post" action="editar_usuario.php?cod=alt">

    <TR>

   	<INPUT type="hidden" name="c_id" value="<?php echo $id;?>">	
	<TD><INPUT type="text" name="c_nome" value="<?php echo $nome; ?>"> </TD>
	<TD><INPUT type="number" name="c_cpf" value="<?php echo $cpf; ?>"> </TD>
	<TD><INPUT type="text" name="c_email" value="<?php echo $email; ?>"> </TD>
	<TD><INPUT type="number" name="c_data" value="<?php echo $data_n; ?>"> </TD>
	<TD><INPUT type="number" name="c_tel" value="<?php echo $tel; ?>"> </TD>
	<TD><input type="submit" value="Alterar"></TD>
  	 
	</form>
	<TD>
	<form method="post" action="editar_usuario.php?cod=exc">
	<INPUT type="hidden" name="c_exc" value="<?php echo $id;?>">	
	<input type="submit" value="Excluir">
	</form>
	</TD>
    
	</TR>
    </TABLE>
<?php
    mysqli_close($abc);
  }
?>
  
  <!-- CODIGO DE EDIÇÃO DE IMAGEM
 <form action="altera_imagem_f.php" method="post" enctype="multipart/form-data">

<label for="foto">Selecionar foto:</label>
  <input type="file" id="foto" name="foto"> <br /> <br />
<input type="submit" value="Enviar" name="submit" />  -->

<?php

avanca:
if(isset($_POST['c_nome'])) // && $_GET['cod'] == 'alt') 
{
	$val0 = $_POST['c_id'];
	$val1 = $_POST['c_nome'];
	$val2 = $_POST['c_cpf'];
	$val3 = $_POST['c_email'];
	$val4 = $_POST['c_data'];
	$val5 = $_POST['c_tel'];

	$abc = mysqli_connect('localhost', 'root', NULL, 'tcc')
	or die ('Erro ao se conectar ao banco de dados');
	
	$editar = "UPDATE db_use SET NOME = '$val1', CPF = '$val2', EMAIL = '$val3',  DATA_NASC = '$val4', TELEFONE = '$val5'  WHERE ID = '$val0'";

	$result = mysqli_query($abc, $editar);

	if(!$result)
	{
		header('Location:../pages/cadastro_user.html?log=erro');
	}
   mysqli_close($abc);
   echo "Alteração feita com sucesso";
   
 /* o log recebendo val_usu abaixo, é para não sair da pagina quando
  for testar acima. */
   header("Refresh: 1; url=editar_usuario.php?log=val_usu");
   
}

if(isset($_POST['c_exc'])) // && $_GET['cod'] == 'exc')
{
    $idd = $_POST['c_exc'];
	$abc = mysqli_connect('localhost', 'root', NULL, 'tcc')
	or die ('Erro ao se conectar ao banco de dados');

	$excluir = "DELETE FROM db_use WHERE ID = '$idd'";

	$result = mysqli_query($abc, $excluir);

	if(!$result)
	{
		HEADER('Location:../pages/cadastro_user.html?log=erro');
	}
	mysqli_close($abc);
	echo "Usuario excluido com sucesso";
	unset($_GET['cod']);
	$_SESSION['autenticado'] = 'NAO';
	session_destroy();
	sleep(2);
	// header("Location:index.php");

}

?>
<br>
<!-- <A href="editar_usuario_e.php?sai=sair">Clique aqui para fazer Logout.</A>  -->
<!-- <?php
// if(isset($_GET['sai']) && $_GET['sai'] == 'sair')
// {
// 	$_SESSION['autenticado'] = 'NAO';
// 	echo "Usuário excluído";
// 	sleep(2);
// 	session_destroy();
// 	header('Location: index.php');
// }
?>
</body>
</html>



