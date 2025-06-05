<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title> Cadastro Usuário</title>
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
            <form id="formCadastro" action="../php/controle_cadastro_user.php" method="post"></form>
                <div class="box-cad">
                    <h1>Cadastro de Usuário</h1>
                    <br>
                    <label for="Nome" class="form-label"></label>
                    <input class="conteudo" type="text" placeholder="Insira o nome" class="form-control" name="nome" id="Nome"
                        aria-describedby="NomeAdm" required/>
                </div>
                <div class="box-cad">
                    <label for="Cpf" class="form-label"></label>
                    <input class="conteudo" type="text" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="Digite seu CPF" id="cpf" required/>

                </div>
                <div class="box-cad">
                    <label for="Email" class="form-label"></label>
                    <input class="conteudo" type="email" placeholder="Insira o Email" class="form-control" name="email" id="email" required/>
                </div>
                <div class="box-cad">
                    <label for="date" class="form-label">Data de Nascimento</label>
                    <input class="conteudo" type="date" placeholder="" class="form-control" name="data_nasc"
                    id="data" required/>
                </div>
                <div class="box-cad">
                    <label for="tel" class="form-label"></label>
                    <input class="conteudo" type="tel" name="telefone" 
                           pattern="\(\d{2}\)\s\d{4,5}-\d{4}" 
                           placeholder="Insira o telefone" 
                           class="form-control" id="telefone" 
                           maxlength="15" required/>
                </div>
                <br>
                <button class="btn" type="submit">Cadastrar</button>
            </form>
        </div>
    </main>
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
            function validaTelefone(tel){
                tel = tel.replace(/\D/g, '');
                return tel.length === 10 || tel.length === 11;
            }

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('formCadastro').addEventListener('submit', function (e) {
    var cpf = document.getElementById('cpf').value;
    var telefone = document.getElementById('telefone').value;
    if (!validaCPF(cpf)) {
        e.preventDefault();
        alert('CPF inválido. Verifique o número digitado.');
        document.getElementById('cpf').focus();
        return;
    }
});
    if (!validaTelefone(telefone)){
        e.preventDefault();
        alert('Telefone inválido. Insira um número válido.');
        document.getElementById('telefone').focus();
        return;
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

            const telefoneInput = document.getElementById("telefone");

            telefoneInput.addEventListener("input", function(event){
                let value = event.target.value.replace(/\D/g, "");

                if (value.length > 11){
                    value = value.slice(0, 11);
                }

                if (value.length > 6){
                    value = value.replace(/^(\d{2})(\d{5})(\d{0,4}).*/, "($1) $2-$3");
                } else if (value.length > 2) {
                    value = value.replace(/^(\d{2})(\d{0,5})/, "($1) $2");
                } else {
                    value = value.replace(/^(\d{0,2})/, "($1");
                }
                event.target.value = value;
            });
    </script>
      
    <footer>
        <p> # Entre em contato. <br> Telefone: (61) 93333-2254 <br> E-mail: fluxotechsystems@gmail.com <br> Endereço
            Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> # Copyright @2024 FluxoTech. All rights
            reserved. </p>
        <img class="pe" src="../img/LogoSite.png" alt="LogoSite" height="34px">
    </footer>

</body>
</html>