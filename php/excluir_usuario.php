<?php
// Conexão com o banco
$abc = mysqli_connect('localhost', 'root', NULL, 'fluxo_tech')
    or die('Erro ao conectar ao banco');

// Verifica se o ID foi passado
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $delete = "DELETE FROM db_use WHERE ID='$id'";
    if (mysqli_query($abc, $delete)) {
        sleep(1);
        header('location:usuarios.php');
    } else {
        echo "Erro ao excluir: " . mysqli_error($abc);
    }
} else {
    echo "ID não encontrado.";
}
