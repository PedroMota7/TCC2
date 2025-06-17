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

<?php if (isset($_GET['ja_cadastrado_email'])): ?>
    <div id="msgBox" style="
        position: fixed;
        top: 20%;           /* caixa mais pra cima */
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #555555;
        color: white;
        padding: 20px 40px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        font-family: Arial, sans-serif;
        font-size: 18px;
        text-align: center;
    ">
         Email Já cadastrado!
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

<?php if (isset($_GET['ja_cadastrado_cpf'])): ?>
    <div id="msgBox" style="
        position: fixed;
        top: 15%;               
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #555555;
        color: white;
        padding: 20px 40px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        font-family: Arial, sans-serif;
        font-size: 18px;
        text-align: center;
    ">
       CPF Já cadastrado!
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

    <script>
        function validaCPF(cpf) {
            cpf = cpf.replace(/\D+/g, '');
            if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) return false;

            let soma = 0;
            for (let i = 0; i < 9; i++) soma += parseInt(cpf.charAt(i)) * (10 - i);
            let resto = (soma * 10) % 11;
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf.charAt(9))) return false;

            soma = 0;
            for (let i = 0; i < 10; i++) soma += parseInt(cpf.charAt(i)) * (11 - i);
            resto = (soma * 10) % 11;
            if (resto === 10 || resto === 11) resto = 0;
            return resto === parseInt(cpf.charAt(10));
        }

        function telefoneEhValido(numero) {
            const tel = numero.replace(/\D/g, '');
            const regexCelular = /^[1-9]{2}9[0-9]{8}$/;      // Ex: (61) 91234-5678
            const regexFixo    = /^[1-9]{2}[2-5][0-9]{7}$/;  // Ex: (11) 2345-6789
            return regexCelular.test(tel) || regexFixo.test(tel);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('formCadastro');
            const cpfInput = document.getElementById('cpf');
            const telefoneInput = document.getElementById('telefone');

            // Máscara do CPF
            cpfInput.addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, '');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                e.target.value = value;
            });

            // Máscara do telefone
            telefoneInput.addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 11) value = value.slice(0, 11);
                if (value.length > 6) {
                    value = value.replace(/^(\d{2})(\d{5})(\d{0,4})/, "($1) $2-$3");
                } else if (value.length > 2) {
                    value = value.replace(/^(\d{2})(\d{0,5})/, "($1) $2");
                } else {
                    value = value.replace(/^(\d{0,2})/, "($1");
                }
                e.target.value = value;
            });

            // Validação no submit
            form.addEventListener('submit', function (e) {
                const cpf = cpfInput.value;
                const telefone = telefoneInput.value;

                if (!validaCPF(cpf)) {
                    e.preventDefault();
                    alert('CPF inválido. Verifique o número digitado.');
                    cpfInput.focus();
                    return;
                }

                if (!telefoneEhValido(telefone)) {
                    e.preventDefault();
                    alert('Telefone inválido. Exemplo válido: (61) 91234-5678 ou (11) 2345-6789');
                    telefoneInput.focus();
                    return;
                }
            });
        });
    </script>

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
</body>
</html>
