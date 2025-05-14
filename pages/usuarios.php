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
            <a href="inicio.html"><img src="../img/logocentropreta.png" alt="logo" height="30%" width="28%"></a>
            <a href="inicio.html">Início</a>
            <a href="cadastro_user.php">Cadastrar</a>
            <a href="suporte.php" class="suporte">Suporte</a>
            <?php
session_start();  // Inicia a sessão

// Verifica se o usuário está autenticado
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === 'SIM') {
    echo "<p>Logado {$_SESSION['email']}!</p>";  // Exibe o e-mail do usuário
} else {
    echo "<p>Você não está logado.</p>";  // 
}
?>
            <a href="encerrar.php"><button type="submit" class="btn">Sair</button></a>
        </nav>
    </header>
    <table>
        <td>ID</td> 
        <td>NOMES</td> 
        
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

                <td><form action="../php/editar_usuario.php" method="POST" style="display:inline;">
    <input type="hidden" name="id" value="<?php echo $id_usuario; ?>">
    <button type="submit" class="btnuser1">Editar</button>
</form></td>
                <td> <form action="../php/controle_excluir.php" method="POST" style="display:inline;">
    <input type="hidden" name="id_ex" value="<?php echo $id_usuario; ?>">
    <button type="submit" class="btnuser2">Excluir</button>
</form></td>
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

                window.location.href = "../php/excluir_usuario.php?id=" + id;
            } else {

                window.location.href = "usuarios.php";

            }
        }
    </script>

    <footer>
        <p> # Entre em contato. <br> Telefone: (61) 93333-2254 <br>E-mail: fluxotechsystems@gmail.com<br> Endereço Quadra 123A Rua Inês - Vale do Paraíso, DF CEP 76923-000 <br> # Copyright @2024 FluxoTech. All rights reserved. </p>
        <img class="pe" src="../img/logocentropreta.png" alt="logocentropreta" height="150px">
    </footer>
</body>

</html>