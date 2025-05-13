<!DOCTYPE html>
<html>

<head>

<title>editar_usuario</title>
<meta charset="utf-8">

</head>

<body>




	
<?php
		if(isset($_POST['c_id']))
		
			{
	

    require '../classses/classes.php'; // para executar a classe
    $u = new Usuario("fluxo_tech","localhost","root","");  // instanciando
				$dados = $u->pesquisar_Para_Alterar_Usuario($email);
		
			}
			$id_u = $_POST['c_id'];
			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$email = $_POST['email'];
			$data_nasc = $_POST['data_nasc'];
            $telefone = $_POST['telefone'];
			if($u->alterarUsuario($id_u, $nome, $cpf, $email, $data_nasc, $telefone))
  
			header("location: usuarios.php"); // recarregar a pagina e atualizar os dados no formulario
		
	
	
	?>
	



</body>
</html>

