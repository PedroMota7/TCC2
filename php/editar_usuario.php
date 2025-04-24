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
<html lang="pt-br">

<head>
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/edit_user.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <meta charset="utf-8">
</head>

<body>
    <header>
        <nav>
            <a href="../pages/inicio.html">Início</a>
            <a href="../pages/suporte.html">Suporte</a>
            <a href="../php/valida_login_adm.php?bt=sair"><button type="submit" class="btn">Sair</button></a>
        </nav>
    </header>
    <main>
        <div class="container">
            <form action="salvar_usuario.php" method="POST">
                <h2>Editar Usuário</h2>
                <input type="hidden" name="id" value="<?php echo $usuario['ID']; ?>">

                Nome: <input type="text" name="nome" value="<?php echo $usuario['NOME']; ?>"><br><br>
                CPF: <input type="text" name="cpf" value="<?php echo $usuario['CPF']; ?>"><br><br>
                Email: <input type="email" name="email" value="<?php echo $usuario['EMAIL']; ?>"><br><br>
                Data de Nascimento: <input type="date" name="data" value="<?php echo $usuario['DATA_NASC']; ?>"><br><br>
                Telefone: <input type="text" name="telefone" value="<?php echo $usuario['TELEFONE']; ?>"><br><br>
                <input type="submit" value="Salvar Alterações">
            </form>
        </div>
    </main>
</body>

</html>