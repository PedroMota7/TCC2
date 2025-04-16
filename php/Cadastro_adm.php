
<?php

$nome_adm = $_POST['nome'];
$email_adm = $_POST['email'];
$cpf_adm = $_POST['cpf'];
$cnpj_emp = $_POST['cnpj'];
$senha_adm = $_POST['senha'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmarSenha'];
}

$abc = mysqli_connect('localhost', 'root', NULL, 'tcc');

if (!$abc) {
    die('Erro ao se conectar ao banco de dados: ' . mysqli_connect_error());
}


$sql = "INSERT INTO adm (ID, NOME, email, CPF, cnpj, senha)
        VALUES (NULL, '$nome_adm', '$email_adm', '$cpf_adm', '$cnpj_emp', '$senha_adm')";

$result2 = mysqli_query($abc, $sql);

if ($result2) {
  
    sleep(2);
	header('location:../pages/Login.html');
}
    
 else {
    echo "Erro ao cadastrar: " . mysqli_error($abc);
}



mysqli_close($abc);
?>
 
