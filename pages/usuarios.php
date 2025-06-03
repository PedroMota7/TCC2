<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Usuários</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/user.css">
    <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">

</head>

<body>
    <header>
        <nav>
            <a href="../pages/inicioLOGADO.php"><img src="../img/logoSite.png" alt="logo"></a>
            <a href="../pages/inicioLOGADO.php">Início</a>
            <a href="cadastro_user.php">Cadastrar</a>
            <a href="../php/Acessos.php">Acessos</a>
            <a href="suporte.php" class="suporte">Suporte</a>
            <?php
            session_start();

            if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === 'SIM') {
                echo "<p>Logado</p>";
            } else {
                echo "<p>Você não está logado.</p>";
            }
            ?>
            <a href="../php/encerrar.php"><button type="submit" class="btn">Sair</button></a>
        </nav>
    </header>
    <main>
        <script>
            function confirmarAcao(id_ex) {
                const confirmar = confirm("Tem certeza que deseja excluir esse usuário?");
                if (confirmar) {
                    fetch("../php/controle_excluir.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: "id_ex=" + id_ex
                        })
                        .then(response => {

                            window.location.href = "../pages/usuarios.php";
                        });
                } else {
                    window.location.href = "usuarios.php";
                }
            }
        </script>
        <h2>Usuários</h2>
        <table>
            <th>ID</th>
            <th>Nomes</th>
            <th class="acos">Ações</th>

            <?php
            $abc = mysqli_connect('localhost', 'root', NULL, 'fluxo_tech')
                or die('Erro ao se conectar ao banco de dados');

            $consulta = "SELECT * FROM db_use";
            $result = mysqli_query($abc, $consulta);

            if (!$result) {
                die('Erro na consulta: ' . mysqli_error($abc));
            }

            while ($tbl = mysqli_fetch_array($result)) {
                $nome = $tbl['NOME'];
                $id_usuario = $tbl['ID'];
            ?>

                <tr>
                    <td><?php echo $id_usuario; ?></td>
                    <td><?php echo $nome; ?></td>

                    <td class="acoes">
                        <form action="../php/editar_usuario.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $id_usuario; ?>">
                            <button type="submit" class="btnuser1">Editar</button>
                        </form>

                        <form action="../php/controle_excluir.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id_ex" value="<?php echo $id_usuario; ?>">

                            <button type="button" class="btnuser2" onclick="confirmarAcao(<?php echo $id_usuario; ?>)">Excluir</button>
                        </form>


                    </td>
                </tr>
            <?php
            }
            mysqli_close($abc);
            ?>
        </table>
    </main>
    
    <footer>
        <p> # Entre em contato. <br> Telefone: (61) 93333-2254 <br> E-mail: fluxotechsystems@gmail.com <br> Endereço
            Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> # Copyright @2024 FluxoTech. All rights
            reserved. </p>
        <img class="pe" src="../img/LogoSite.png" alt="LogoSite" height="34px">
    </footer>
</body>

</html>