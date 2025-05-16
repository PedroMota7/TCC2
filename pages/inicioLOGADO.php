<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Início</title>
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/inicio.css">
    <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">
</head>

<body>
    <header>
        <nav>
            <a href="../pages/inicioLOGADO.php"><img src="../img/LogoSite.png" alt="logo"></a>
            <a href="usuarios.php">Usuarios</a>
            <a href="../pages/suporte.php" class="suporte">Suporte</a>
            <?php
                session_start();

                    if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === 'SIM') {
                       echo "<p>Logado</p>";
                    } else {
                        echo "<p>Você não está logado.</p>";
                }
            ?>
            <a href="../php/encerrar.php"><button type="submit" class="btn">Sair</button></a>
        </nav>
    </header>
    <main>
        <div id="bloco">
            <article>
                <img src="../img/catraca.jpeg" alt="catraca">
            </article>
            <aside>
                <h1>FluxoTech?</h1>
                <p>
                    A FluxoTech é uma empresa que se destaca no mercado de sistemas de catracas. Transformando desafios
                    em oportunidades com soluções inteligentes. <br>
                    Com um compromisso sólido com excelência, eficácia e singularidade, a empresa implementa tecnologias
                    que aprimoram o gerenciamento de acesso, reforçando tanto a segurança quanto o desempenho dos seus
                    clientes.
                </p>
            </aside>
        </div>
    </main>

    <footer>
        <p> # Entre em contato. <br> Telefone: (61) 93333-2254 <br> E-mail: fluxotechsystems@gmail.com <br> Endereço
            Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> # Copyright @2024 FluxoTech. All rights
            reserved. </p>
        <img class="pe" src="../img/logocentropreta.png" alt="logocentropreta" height="150px">
    </footer>
</body>




</html>