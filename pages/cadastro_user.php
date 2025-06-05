<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro Usuário</title>
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/cad_user.css">
    <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">
</head>
<body>
    <header>
        <nav>
            <a href="InicioLOGADO.php"><img src="../img/logoSite.png" alt="logo"></a>
            <a href="inicioLOGADO.php">Início</a>
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
            <a href="../php/encerrar.php?bt=sair"><button type="submit" class="btn">Sair</button></a>  
        </nav>
    </header>

    <main>
        <div class="container">
            <form id="formCadastro" action="../php/controle_cadastro_user.php" method="post">
                <div class="box-cad">
                    <h1>Cadastro de Usuário</h1><br>
                    <input class="conteudo" type="text" placeholder="Insira o nome" name="nome" id="Nome" required/>
                </div>
                <div class="box-cad">
                    <input class="conteudo" type="text" name="cpf" placeholder="Digite seu CPF" id="cpf" maxlength="14" required/>
                </div>
                <div class="box-cad">
                    <input class="conteudo" type="email" placeholder="Insira o Email" name="email" id="email" required/>
                </div>
                <div class="box-cad">
                    <label for="date" class="form-label">Data de Nascimento</label>
                    <input class="conteudo" type="date" name="data_nasc" id="data" required/>
                </div>
                <div class="box-cad">
                    <input class="conteudo" type="tel" name="telefone" placeholder="Insira o telefone" id="telefone" maxlength="15" required/>
                </div>
                <br>
                <button class="btn" type="submit">Cadastrar</button>
            </form>
        </div>
    </main>

    <footer>
        <p>
            # Entre em contato. <br> 
            Telefone: (61) 93333-2254 <br> 
            E-mail: fluxotechsystems@gmail.com <br> 
            Endereço: Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> 
            # Copyright @2024 FluxoTech. All rights reserved.
        </p>
        <img class="pe" src="../img/LogoSite.png" alt="LogoSite" height="34px">
    </footer>
    <script src="../js/validacao_usuario.js"></script>
</body>
</html>
