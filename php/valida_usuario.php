<?php

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$data = $_POST['data'];
$TEL = $_POST['tel'];
 

$abc = mysqli_connect('localhost', 'root', '', 'fluxo_tech');

if (!$abc) {
    die('Erro ao se conectar ao banco de dados: ' . mysqli_connect_error());
}


$sql = "INSERT INTO db_use (ID, NOME, CPF, EMAIL, DATA_NASC, TELEFONE)
        VALUES (NULL, '$nome', '$cpf', '$email', '$data', '$TEL')";

$result2 = mysqli_query($abc, $sql);

if ($result2) {
    sleep(1);
	header('location:usuarios.php');

} else {
    echo "Erro ao cadastrar: " . mysqli_error($abc);
}

mysqli_close($abc);
?>

