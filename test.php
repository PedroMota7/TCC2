<?php
// Configurações do banco de dados
$host = "localhost";
$usuario = "root";
$senha = "sua_senha";
$banco = "nome_do_banco";

// Conexão com o banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica se a conexão deu certo
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM nome_da_tabela";
$resultado = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela do Banco de Dados</title>
</head>
<body>
    <h1>Tabela de Dados</h1>
    <table border="1">
        <tr>
            <!-- Ajuste os cabeçalhos de acordo com suas colunas -->
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <?php
        if ($resultado->num_rows > 0) {
            // Itera pelos resultados e cria linhas da tabela
            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha["id"] . "</td>";
                echo "<td>" . $linha["nome"] . "</td>";
                echo "<td>" . $linha["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum dado encontrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
$conn->close();
?>
