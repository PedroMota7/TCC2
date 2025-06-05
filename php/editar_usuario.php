<?php
session_start();

require '../classes/classes.php';
$u = new Usuario("fluxo_tech", "localhost", "root", "");

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id_usuario = $_POST['id'];

    $dados = $u->pesquisar_Para_Alterar_Usuario($id_usuario);

    if (!$dados) {
        echo "<p>ID não encontrado</p>";
        exit;
    }
} 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar Usuário</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/editar_user.css">
    
</head>
<body>

<header>
    <nav>
        <a href="../pages/inicio.html"><img src="../img/logoSite.png" alt="logo"></a>
        <a href="../pages/inicioLOGADO.php">Início</a>
        <a href="../pages/suporte.html" class="suporte">Suporte</a>
        <a href="encerrar.php"><button type="submit" class="btn">Sair</button></a>
    </nav>
</header>

<main>
    <div class="container">
         <form id="formCadastro" action="../php/editar_usario.php" method="post">
        <form action="controle_editar.php" method="POST">
            <h2>Editar Usuário</h2>
            <input type="hidden" name="id" value="<?php echo ($dados['ID']); ?>">

            Nome:
            <input class="conteudo" type="text" name="nome" value="<?php echo ($dados['NOME']); ?>">

            CPF:
            <input class="conteudo" type="text" name="cpf" value="<?php echo ($dados['CPF']); ?>">

            Email:
            <input class="conteudo" type="email" name="email" value="<?php echo ($dados['EMAIL']); ?>">

            Data de Nascimento:
            <input class="conteudo" type="date" name="data_nasc" value="<?php echo ($dados['DATA_NASC']); ?>">

            Telefone:
            <input class="conteudo" type="text" name="telefone" value="<?php echo ($dados['TELEFONE']); ?>">

            <br>
            <input class="btn" type="submit" value="Salvar Alterações">
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
    <p> # Entre em contato. <br> Telefone: (61) 93333-2254 <br>E-mail: fluxotechsystems@gmail.com<br> Endereço Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> # Copyright @2024 FluxoTech. All rights reserved. </p>
    <img class="pe" src="../img/LogoSite.png" alt="logocentropreta" height="150px">
</footer>

</body>
</html>
