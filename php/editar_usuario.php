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
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/editaruser.css">
</head>
<body>
    <header>
        <nav>
            <a href="#"><img src="../img/logocentropreta.png" alt="logo" height="30%" width="28%"></a>
            <a href="../index.html">Início</a>
            <a href="../pages/suporte.html">Suporte</a>
            <a href="../php/valida_login_adm.php?bt=sair"><button type="submit" class="btn"><img src="../img/logout.svg" alt=""></button></a>
        </nav>
    </header>
    <main>
        <div class="container">
            <form action="salvar_usuario.php" method="POST">
                <h2>Editar Usuário</h2>
                <input type="hidden" name="id" value="<?php echo $usuario['ID']; ?>">
                
                Nome:<input class="conteudo" type="text" name="nome" value="<?php echo $usuario['NOME']; ?>">
                
                CPF:<input class="conteudo" type="text" name="cpf" value="<?php echo $usuario['CPF']; ?>">
    
                Email: <input class="conteudo" type="email" name="email" value="<?php echo $usuario['EMAIL']; ?>">
               
                Data de Nascimento: <input class="conteudo" type="date" name="data" value="<?php echo $usuario['DATA_NASC']; ?>">
                
                Telefone: <input class="conteudo" type="text" name="telefone" value="<?php echo $usuario['TELEFONE']; ?>">
                <br>
                <input class="btn" type="submit" value="Salvar Alterações">
            </form>
        </div>
    </main>

    <footer>
        <p> # Entre em contato. <br> Telefone: (61) 93333-2254 <br> Endereço Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> # Copyright @2024 FluxoTech. All rights reserved. </p>
        <img class="pe" src="../img/logocentropreta.png" alt="logocentropreta" height="150px">
    </footer>

</body>
</html>