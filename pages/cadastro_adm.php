<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Administrador</title>
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/cad_adm.css">
    <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">
</head>
<body>

<?php if (isset($_GET['erro'])): ?>
    <div class="msgBox">
        <?php
            if ($_GET['erro'] == 'email') echo "Email já cadastrado!";
            if ($_GET['erro'] == 'cpf') echo "CPF já cadastrado!";
        ?>
    </div>
    <script>
        setTimeout(function(){
            var msg = document.querySelector('.msgBox');
            if (msg) {
                msg.style.transition = "opacity 0.2s ease";
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
        <a href="../pages/inicio.html"><img src="../img/LogoSite.png" alt="logo"></a>
        <a href="../pages/inicio.html">Início</a>
        <a href="../pages/suporte.php" class="suporte">Suporte</a>
    </nav>
</header>

<main>
    <div class="container">
        <form id="cpfForm" action="../php/controle_cadastro_adm.php" method="post" onsubmit="return validarSenhas()">
            <div class="card-header">
                <h2>Cadastro de Adm</h2>
            </div>
            <div class="box-cad">
                <label for="Nome" class="form-label"></label>
                <input class="conteudo" type="text" placeholder="Insira seu nome" name="nome" id="Nome" aria-describedby="NomeAdm" required />
            </div>
            <div class="box-cad">
                <label for="Cpf" class="form-label"></label>
                <input class="conteudo" type="text" name="cpf" id="cpf" pattern="\d{3}\.\d{3}\.\d{3}\-\d{2}" maxlength="14" placeholder="Insira seu CPF" required />
            </div>
            <div class="box-cad">
                <label for="Email" class="form-label"></label>
                <input class="conteudo" type="email" placeholder="Insira seu Email" name="email" id="email" required />
            </div>
            <div class="box-cad">
                <label for="cnpj" class="form-label"></label>
                <input class="conteudo" type="text" name="cnpj" id="cnpj" maxlength="18" placeholder="Digite seu CNPJ" required />
            </div>
            <div class="box-cad">
                <label for="senha" class="form-label"></label>
                <input class="conteudo" type="password" placeholder="Crie uma senha" name="senha" id="senha" required />
            </div>
            <div class="box-cad">
                <label for="confirmarSenha" class="form-label"></label>
                <input class="conteudo" type="password" placeholder="Confirme a senha" id="confirmarSenha" name="confirmarSenha" required />
            </div>
            <br>
            <input class="btn" type="submit" value="Cadastrar" />
        </form>
    </div>
</main>

<script>
    function validarSenhas() {
        const senha = document.getElementById('senha').value;
        const confirmarSenha = document.getElementById('confirmarSenha').value;

        if (senha !== confirmarSenha) {
            alert('As senhas não coincidem. Por favor, tente novamente.');
            return false;
        }
        return true;
    }
</script>

<script>
    function validaCPF(cpf) {
        cpf = cpf.replace(/\D+/g, '');
        if (cpf.length !== 11) return false;

        let soma = 0;
        let resto;
        if (/^(\d)\1{10}$/.test(cpf)) return false;

        for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
        resto = (soma * 10) % 11;
        if ((resto === 10) || (resto === 11)) resto = 0;
        if (resto !== parseInt(cpf.substring(9, 10))) return false;

        soma = 0;
        for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
        resto = (soma * 10) % 11;
        if ((resto === 10) || (resto === 11)) resto = 0;
        if (resto !== parseInt(cpf.substring(10, 11))) return false;

        return true;
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('cpfForm').addEventListener('submit', function (e) {
            var cpf = document.getElementById('cpf').value;
            if (!validaCPF(cpf)) {
                e.preventDefault();
                alert('CPF inválido. Verifique o número digitado.');
                document.getElementById('cpf').focus();
            }
        });

        document.getElementById('cpf').addEventListener('input', function (e) {
            var value = e.target.value;
            var cpfPattern = value.replace(/\D/g, '')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1-$2')
                .replace(/(-\d{2})\d+?$/, '$1');
            e.target.value = cpfPattern;
        });
    });
</script>

<script>
    function validaCNPJ(cnpj) {
        cnpj = cnpj.replace(/[^\d]+/g, '');
        if (cnpj == '' || cnpj.length != 14 || /^(\d)\1{13}$/.test(cnpj))
            return false;

        let tamanho = cnpj.length - 2;
        let numeros = cnpj.substring(0, tamanho);
        let digitos = cnpj.substring(tamanho);
        let soma = 0;
        let pos = tamanho - 7;
        for (let i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2) pos = 9;
        }
        let resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
        if (resultado != digitos.charAt(0)) return false;

        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (let i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2) pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
        if (resultado != digitos.charAt(1)) return false;
        return true;
    }

    document.getElementById('cpfForm').addEventListener('submit', function (e) {
        var cnpj = document.getElementById('cnpj').value;
        if (!validaCNPJ(cnpj)) {
            e.preventDefault();
            alert('CNPJ inválido. Por favor, verifique o número digitado.');
            document.getElementById('cnpj').focus();
        }
    });

    document.getElementById('cnpj').addEventListener('input', function (e) {
        var value = e.target.value;
        var rawValue = value.replace(/\D/g, ''); // Remove tudo que não é número

        // Se tiver 15 dígitos e começar com '0', tenta retirar o '0'
        if (rawValue.length === 15 && rawValue.startsWith('0')) {
            var potentialCNPJ = rawValue.substring(1);
            if (validaCNPJ(potentialCNPJ)) rawValue = potentialCNPJ;
        }

        var cnpjPattern = rawValue
            .replace(/^(\d{2})(\d)/, '$1.$2')
            .replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3')
            .replace(/\.(\d{3})(\d)/, '.$1/$2')
            .replace(/(\d{4})(\d)/, '$1-$2')
            .replace(/(-\d{2})\d+?$/, '$1');
        e.target.value = cnpjPattern;
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
