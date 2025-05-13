<?php
$abc = mysqli_connect('localhost', 'root', '', 'fluxo_tech') or die('Erro na conexão');

$id      = $_POST['id'];
$nome    = $_POST['nome'];
$cpf     = $_POST['cpf'];
$email   = $_POST['email'];
$data    = $_POST['data'];
$tel     = $_POST['telefone'];

$sql = "UPDATE db_use SET 
            NOME = '$nome',
            CPF = '$cpf',
            EMAIL = '$email',
            DATA_NASC = '$data',
            TELEFONE = '$tel'
        WHERE ID = $id";

if (mysqli_query($abc, $sql)) {
    sleep(1);
    header('location:usuarios.php');
} else {
    echo "Erro ao atualizar: " . mysqli_error($anc);
}

mysqli_close($abc);
