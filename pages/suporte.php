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
            <form action="">
                <h2>Fale Conosco</h2>
                <label for="email" class="form-label"></label>
                <input class="conteudo" type="text" placeholder="Insira seu e-mail" class="form-control" id="email" aria-describedby="emailAdm" required>
                <br>
                <label for="caixa">Qual sua dúvida?</label>
                <textarea class="conteudo" name="caixa2" id="caixa" rows="10" cols="30" placeholder="Faça sua pergunta"></textarea><br>
                <input type="submit" value="Enviar" class="btn">
            </form>
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

