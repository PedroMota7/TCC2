<!DOCTYPE html>
<html>

<head>
    <title>editar_usuario</title>
    <meta charset="utf-8">
</head>

<body>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>CPF</td>
            <td>email</td>
            <td>data</td>
            <td>telefone</td>
            <td>Açao</td>
           
           
        </tr>

        <?php
        $abc = mysqli_connect('localhost', 'root', NULL, 'tcc')
        or die('Erro ao se conectar ao banco de dados');

        $consulta = "SELECT * FROM db_use";
        $result = mysqli_query($abc, $consulta);

        if (!$result) {
            die('Erro na consulta: ' . mysqli_error($abc));
        }

        while ($tbl = mysqli_fetch_array($result)) {
            $id   = $tbl['ID'];
            $nome = $tbl['NOME'];
            $cpf = $tbl['CPF'];
            $email = $tbl['EMAIL'];
            $data = $tbl['DATA_NASC'];
            $TEL = $tbl['TELEFONE'];
             
        ?>

            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nome; ?></td>
                <td><?php echo $cpf; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $data; ?></td>
                <td><?php echo $TEL; ?></td>
               <td><a href="editar_usuario.php?id=<?php echo $id; ?>"><button type="submit" class="btn">Editar</button></a></td>
            </tr>

        <?php
        }
        mysqli_close($abc);
        ?>

    </table>
</body>

</html>

