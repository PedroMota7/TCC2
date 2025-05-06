<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Usuário</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/user.css">
    <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">

</head>

<body>
    <header>
        <nav>
            <a href="#"><img src="../img/logocentropreta.png" alt="logo" height="30%" width="28%"></a>
            <a href="../pages/inicio.html">Início</a>
            <a href="../pages/cadastro_user.html">Cadastrar</a>
            <a href="../pages/suporte.html">Suporte</a>
            <a href="../php/valida_login_adm.php?bt=sair"><button type="submit" class="btn">Sair</button></a>
        </nav>
    </header>
    <table>
        <?php
        $abc = mysqli_connect('localhost', 'root', NULL, 'tcc')
            or die('Erro ao se conectar ao banco de dados');

        $consulta = "SELECT * FROM db_use";
        $result = mysqli_query($abc, $consulta);

        if (!$result) {
            die('Erro na consulta: ' . mysqli_error($abc));
        }

        while ($tbl = mysqli_fetch_array($result)) {
            $nome = $tbl['NOME'];
            $id = $tbl['ID'];
        ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nome; ?></td>

                <td><a href="editar_usuario.php?id=<?php echo $id; ?>"><button type="submit" class="btnuser1">Editar</button></a></td>
                <td> <button class="btnuser2" onclick="confirmaracao(<?php echo $id; ?>)">Excluir</button></td>
            </tr>
        <?php
        }
        mysqli_close($abc);
        ?>
    </table>

    <script>
        function confirmaracao(id) {
            const confirmar = confirm("Tem certeza que deseja excluir esse usuario?");
            if (confirmar) {

                window.location.href = "excluir_usuario.php?id=" + id;
            } else {

                window.location.href = "usuarios.php";

            }
        }
    </script>

    <footer>
        <p> # Entre em contato. <br> Telefone: (61) 93333-2254 <br> Endereço Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> # Copyright @2024 FluxoTech. All rights reserved. </p>
        <img class="pe" src="../img/logocentropreta.png" alt="logocentropreta" height="150px">
    </footer>
</body>

</html>