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

$consulta =  "SELECT * FROM db_user WHERE NOME = '$lu'";

$result = mysqli_query($abc, $consulta);
if(!$result)
{
  HEADER('Location:../pages/cadastro_user?log=erro');
}
?>
  <TABLE border=1>
   <TR>
    
    <TD>Nome</TD>
    <TD>Data de nascimento</TD>
    <TD>CPF</TD>
    <TD>Usuário</TD>
	<TD>Senha</TD>
	
   </TR>
<?php
  while ($tbl = mysqli_fetch_array($result)) 
  {
    $id = $tbl["ID"];
	$nome  = $tbl["NOME"];
    $data_n   = $tbl["DATA_NASC"];
    $cpf   = $tbl["CPF"];
    $usuario = $tbl["CAMPO_USUARIO"];
    $senha = $tbl["CAMPO_SENHA"];
?>


	
    <FORM method="post" action="editar_usuario_f.php?cod=alt">

    <TR>

   	<INPUT type="hidden" name="c_id" value="<?php echo $id;?>">	
	<TD><INPUT type="text" name="c_nome" value="<?php echo $nome; ?>"> </TD>
    <TD><INPUT type="text" name="c_data" value="<?php echo $data_n; ?>"> </TD>
	<TD><INPUT type="text" name="c_cpf" value="<?php echo $cpf; ?>"> </TD>
	<TD><INPUT type="text" name="c_usuario" value="<?php echo $usuario; ?>"> </TD>
	<TD><INPUT type="password" name="c_senha" value="<?php echo $senha; ?>"> </TD>
	<TD><input type="submit" value="Alterar"></TD>
  	 
	</form>
	<TD>
	<form method="post" action="editar_usuario_f.php?cod=exc">
	<INPUT type="hidden" name="c_exc" value="<?php echo $id;?>">	
	<input type="submit" value="Excluir">
	</form>
	</TD>
    
	</TR>
	
	


	
<?php
    mysqli_close($abc);
  }
?>
  </TABLE>
  
 <form action="altera_imagem_f.php" method="post" enctype="multipart/form-data">

<label for="foto">Selecionar foto:</label>
  <input type="file" id="foto" name="foto"> <br /> <br />
<input type="submit" value="Enviar" name="submit" /> 

<?php

avanca:
if(isset($_POST['c_nome'])) // && $_GET['cod'] == 'alt') 
{
	$val0 = $_POST['c_id'];
	$val1 = $_POST['c_nome'];
	$val2 = $_POST['c_data'];
	$val3 = $_POST['c_cpf'];
	$val4 = $_POST['c_usuario'];
	$val5 = $_POST['c_senha'];

	$abc = mysqli_connect('localhost', 'root', NULL, 'db_login')
	or die ('Erro ao se conectar ao banco de dados');
	
	$editar = "UPDATE tb_usuario SET NOME = '$val1', DATA_NASC = '$val2', CPF = '$val3', 
	CAMPO_USUARIO = '$val4', CAMPO_SENHA = '$val5'  WHERE ID = '$val0'";

	$result = mysqli_query($abc, $editar);

	if(!$result)
	{
		HEADER('Location:login_f.php?log=erro');
	}
   mysqli_close($abc);
   echo "Alteração feita com sucesso";
   
 /* o log recebendo val_usu abaixo, é para não sair da pagina quando
  for testar acima. */
   header("Refresh: 1; url=editar_usuario_f.php?log=val_usu");
   
}

if(isset($_POST['c_exc'])) // && $_GET['cod'] == 'exc')
{
    $idd = $_POST['c_exc'];
	$abc = mysqli_connect('localhost', 'root', NULL, 'db_login')
	or die ('Erro ao se conectar ao banco de dados');

	$excluir = "DELETE FROM tb_usuario WHERE ID = '$idd'";

	$result = mysqli_query($abc, $excluir);

	if(!$result)
	{
		HEADER('Location:login_f.php?log=erro');
	}
	mysqli_close($abc);
	echo "Usuario excluido com sucesso";
	unset($_GET['cod']);
	$_SESSION['autenticado'] = 'NAO';
	session_destroy();
	sleep(2);
	header("Location:index.php");

}

?>
<br> <br>
<A href="editar_usuario_e.php?sai=sair">Clique aqui para fazer Logout.</A> 
<?php
if(isset($_GET['sai']) && $_GET['sai'] == 'sair')
{
	$_SESSION['autenticado'] = 'NAO';
	echo "Usuário excluído";
	sleep(2);
	session_destroy();
	header('Location: index.php');
}
?>
</body>
</html>



