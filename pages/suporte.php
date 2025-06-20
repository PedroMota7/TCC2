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
                function voltar() {
                    window.history.back();
                }
            </script>
        </nav>
    </header>
    <main>

        <div class="container">
            <div class="card-header">
                <h2>Entre em contato</h2>
            </div>
            <form action="../php/env_suporte.php" method="post">
                <label>Seu nome:</label><br>
                <input class="conteudo" type="text" name="nome" required /><br>

                <label>Seu email:</label><br>
                <input class="conteudo" type="email" name="email" required /><br>


                <label>Mensagem:</label><br>
                <textarea name="mensagem" rows="6" required></textarea><br>

                <button class="btn" type="submit">Enviar</button>
            </form>
        </div>
    </main>
</body>
<?php if (isset($_GET['Enviado_com_sucesso'])): ?>
    <div id="msgBox" style="
        position: fixed;
        top: 20%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #4CAF50;    /* Verde para sucesso */
        color: white;
        padding: 20px 40px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        font-family: Arial, sans-serif;
        font-size: 18px;
        text-align: center;
    ">
        Mensagem enviada com sucesso!
    </div>

    <script>
        setTimeout(function(){
            var msg = document.getElementById('msgBox');
            if(msg){
                msg.style.transition = "opacity 0.5s ease";
                msg.style.opacity = '0';
                setTimeout(function(){
                    msg.remove();
                }, 500);
            }
        }, 3000);
    </script>
<?php endif; ?>


<footer>
    <p> # Entre em contato. <br> Telefone: (61) 93333-2254 <br> E-mail: fluxotechsystems@gmail.com <br> Endereço
        Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> # Copyright @2024 FluxoTech. All rights
        reserved. </p>
    <img class="pe" src="../img/LogoSite.png" alt="LogoSite" height="34px">
</footer>

</html>