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
            <a href="../pages/inicio.html"><img src="../img/logocentropreta.png" alt="logo" height="30%" width="28%"></a>
            <a href="../pages/inicio.html">Início</a>
            <a href="../pages/suporte.html" class="suporte">Suporte</a>
            <a href="../php/valida_login_adm.php?bt=sair"><button type="submit" class="btn">Sair</button></a>
        </nav>
        <?php

        require '../classes/classes.php'; // para executar a classe
        $u = new Usuario("fluxo_tech","localhost","root","");  // instanciando
        if($dados = $u->pesquisar_Para_Alterar_Usuario($email))
        {
            //print_r($dados);
            $id_usuario = $dados['ID'];
            $nome = $dados['NOME'];
            $cpf = $dados['CPF'];
            $email = $dados['EMAIL'];
            $data_nasc = $dados['DATA_NASC'];
            $telefone = $dados['TELEFONE'];

        }
        else
        {
            header('location: usuarios.php');
        }
        
        ?>
    </header>

    <main>
        <div class="container">
            <form action="salvar_usuario.php" method="POST">
                <h2>Editar Usuário</h2>
                <input type="hidden" name="id" value="<?php echo $dados['ID']; ?>">
                
                Nome:<input class="conteudo" type="text" name="nome" value="<?php echo $dados['NOME']; ?>">
                
                CPF:<input class="conteudo" type="text" name="cpf" value="<?php echo $dados['CPF']; ?>">
    
                Email: <input class="conteudo" type="email" name="email" value="<?php echo $dados['EMAIL']; ?>">
               
                Data de Nascimento: <input class="conteudo" type="date" name="data" value="<?php echo $dados['DATA_NASC']; ?>">
                
                Telefone: <input class="conteudo" type="text" name="telefone" value="<?php echo $dados['TELEFONE']; ?>">
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
