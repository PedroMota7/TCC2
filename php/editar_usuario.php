<?php
session_start();

require '../classes/classes.php';
$u = new Usuario("fluxo_tech", "localhost", "root", "");

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id_usuario = $_POST['id'];

    $dados = $u->pesquisar_Para_Alterar_Usuario($id_usuario);

    if (!$dados) {
        echo "<p>ID não encontrado</p>";
        exit;
    }
} 
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
        <a href="../pages/inicio.html"><img src="../img/logoSite.png" alt="logo"></a>
        <a href="../pages/inicio.html">Início</a>
        <a href="../pages/suporte.html" class="suporte">Suporte</a>
        <a href="encerrar.php"><button type="submit" class="btn">Sair</button></a>
    </nav>
</header>

<main>
    <div class="container">
        <form action="controle_editar.php" method="POST">
            <h2>Editar Usuário</h2>
            <input type="hidden" name="id" value="<?php echo ($dados['ID']); ?>">

            Nome:
            <input class="conteudo" type="text" name="nome" value="<?php echo ($dados['NOME']); ?>">

            CPF:
            <input class="conteudo" type="text" name="cpf" value="<?php echo ($dados['CPF']); ?>">

            Email:
            <input class="conteudo" type="email" name="email" value="<?php echo ($dados['EMAIL']); ?>">

            Data de Nascimento:
            <input class="conteudo" type="date" name="data_nasc" value="<?php echo ($dados['DATA_NASC']); ?>">

            Telefone:
            <input class="conteudo" type="text" name="telefone" value="<?php echo ($dados['TELEFONE']); ?>">

            <br>
            <input class="btn" type="submit" value="Salvar Alterações">
        </form>
    </div>
</main>

<footer>
    <p> # Entre em contato. <br> Telefone: (61) 93333-2254 <br>E-mail: fluxotechsystems@gmail.com<br> Endereço Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> # Copyright @2024 FluxoTech. All rights reserved. </p>
    <img class="pe" src="../img/logocentropreta.png" alt="logocentropreta" height="150px">
</footer>

</body>
</html>
