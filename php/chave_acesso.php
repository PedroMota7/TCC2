<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Início</title>
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">
</head>

<body>
    <header>
        <nav>
            <a href="#"><img src="../img/LogoSite.png" alt="logo"></a>
            <a href="../pages/chave_acesso.html"><button>Voltar</button></a>
            <!-- <a href="cadastro_adm.html">Administrador</a>
            <a href="Login.php"><button class="btn" type="submit">voltar</button></a> -->
        </nav>
    </header>


    <?php
    session_start();
    $chave_acesso = 'adm';

    if (isset($_POST['chave']) && $_POST['chave'] === $chave_acesso) {
        $_SESSION['autenticado'] = true;
        header('Location: ../pages/cadastro_adm.html');

        exit;
    } else {
        echo 'Chave incorreta, tente novamente!';
    }

    ?>



    <footer>
        <p> # Entre em contato. <br> Telefone: (61) 93333-2254 <br> E-mail: fluxotechsystems@gmail.com <br> Endereço
            Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> # Copyright @2024 FluxoTech. All rights
            reserved. </p>
        <img class="pe" src="../img/logocentropreta.png" alt="logocentropreta" height="150px">
    </footer>


</body>

</html>