<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Suporte</title>
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/suporte.css">
</head>
<body>
    <header>
        <nav> 
            <div class="nesquerda">
                <a href="#"><img src="../img/LogoSite.png" alt="logo"></a>
            </div>
            
                <div class="ndireita">
                    <?php
                session_start(); 
                    if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === 'SIM') {
                        echo "<p>Logado</p>";
                    } else {
                        echo "<p>Você não está logado.</p>";
                    }
            ?>
            <button class="btn" onclick="voltar()">Voltar</button>
                </div>

            <script>
                function voltar() { window.history.back(); }
            </script>
        </nav>
    </header>
    <main>
        <div class="container">
    <form action="../php/env_suporte.php" method="post">
        <label>Seu nome:</label><br>
        <input type="text" name="nome" required /><br><br>

        <label>Seu email:</label><br>
        <input type="email" name="email" required /><br><br>


        <label>Mensagem:</label><br>
        <textarea name="mensagem" rows="6" required></textarea><br><br>

        <button type="submit">Enviar</button>
        </div>
    </main>
</body>


<footer>
    <p> # Entre em contato. <br> Telefone: (61) 93333-2254 <br> E-mail: fluxotechsystems@gmail.com <br> Endereço
        Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> # Copyright @2024 FluxoTech. All rights
        reserved. </p>
        <img class="pe" src="../img/LogoSite.png" alt="LogoSite" height="34px">
</footer>
</html>

