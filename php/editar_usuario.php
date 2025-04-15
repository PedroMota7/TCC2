<?php
$abc = mysqli_connect('localhost', 'root', '', 'tcc') 
or die('Erro na conexão');

if (!isset($_GET['id'])) {
    die('ID não encontrado.');
}

$id = $_GET['id'];
$sql = "SELECT * FROM db_use WHERE ID = $id";
$res = mysqli_query($abc, $sql);

if (mysqli_num_rows($res) == 0) {
    die('Usuário não encontrado.');
}

$usuario = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Editar Usuário</h2>
    <form action="salvar_usuario.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['ID']; ?>">

        Nome: <input type="text" name="nome" value="<?php echo $usuario['NOME']; ?>"><br><br>
        CPF: <input type="text" name="cpf" value="<?php echo $usuario['CPF']; ?>"><br><br>
        Email: <input type="email" name="email" value="<?php echo $usuario['EMAIL']; ?>"><br><br>
        Data de Nascimento: <input type="date" name="data" value="<?php echo $usuario['DATA_NASC']; ?>"><br><br>
        Telefone: <input type="text" name="telefone" value="<?php echo $usuario['TELEFONE']; ?>"><br><br>

        <input type="submit" value="Salvar Alterações">
    </form>
</body>