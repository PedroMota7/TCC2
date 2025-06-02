<?php
// CONEXÃO COM O BANCO
$host = 'localhost';
$db   = 'fluxo_tech';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    exit('Erro na conexão com o banco: ' . $e->getMessage());
}


$sql = "
    SELECT p.nome, MAX(a.data_hora) AS ultimo_acesso
    FROM db_use p
    LEFT JOIN acessos a ON a.pessoa_id = p.id
    GROUP BY p.id
    ORDER BY ultimo_acesso DESC
";
$stmt = $pdo->query($sql);
$listaAcessos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Últimos Acessos</title>
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/suporte.css">
    <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">
    <style>
        /* body {
            background: linear-gradient(45deg, #dfdfdf 0%, #a8a8a8 50%, #7a7a7a 100%);
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            padding: 20px;
            text-align: center;
        } */
        table {
            margin: auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 700px;
            background-color: white;
        }
        th, td {
            border: 1px solid #999;
            padding: 10px;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="nesquerda">
                <a href="#"><img src="../img/LogoSite.png" alt="logo"></a>
            </div>
            
                <div class="ndireita">
                    <?php
                session_start(); 
                    if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === 'SIM') {
                        echo "<p>Logado</p>";
                    } else {
                        echo "<p>Você não está logado.</p>";
                    }
            ?>
            <button class="btn" onclick="voltar()">Voltar</button>
                </div>

            <script>
                function voltar() { window.history.back(); }
            </script>
        </nav>
    </header>
    <main>
        <h2>Últimos Acessos</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Último Acesso</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaAcessos as $acesso): ?>
                <tr>
                    <td><?= htmlspecialchars($acesso['nome']) ?></td>
                    <td>
                        <?= $acesso['ultimo_acesso'] ? date('d/m/Y H:i:s', strtotime($acesso['ultimo_acesso'])) : 'Nunca' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </main>
</body>
</html>
