


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <title>Login</title>
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">
</head>

<body>
    <header>
        <nav>
            <a href="#"><img src="../img/logocentropreta.png" alt="logo" height="30%" width="28%"></a>
            <a href="inicio.html">Início</a>
            <a href="suporte.html" class="suporte">Suporte</a>

        </nav>
    </header>
    <main>
        <div class="container">
            <form action="../php/valida_login_adm.php" method="post">
                <center>
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                </center>
                <div class="box-cad">
                    <label for="Email" class="form-label"></label>
                    <input class="conteudo" type="text" placeholder="Insira seu e-mail" class="form-control"
                        name="email" id="email" aria-describedby="emailAdm" required>
                </div>
                <div class="box-cad">
                    <label for="senha" class="form-label"></label>
                    <input class="conteudo" type="password" placeholder="Insira sua senha" class="form-control"
                        name="senha" id="senha" required><br>
                    <br>
                    <center>
                        <a href="cadastro_user.php"><button class="btn" type="submit">Entrar</button></a>
                        <br>
                        <a href="#" class="esqueci">Esqueci a senha</a>
                    </center>


            </form>
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