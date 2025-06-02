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

// CONSULTA: Nome + Último Acesso
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
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            text-align: center;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 700px;
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
</body>
</html>
