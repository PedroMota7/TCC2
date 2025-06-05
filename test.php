<?php
// Ativa a exibição de erros para facilitar a depuração (ajuste em produção)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexão com o banco de dados utilizando PDO
try {
    // Conectando ao banco 'fluxo_tech' com charset utf8
    $conn = new PDO('mysql:host=localhost;dbname=fluxo_tech;charset=utf8', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Verifica se o termo de pesquisa foi enviado via GET (por exemplo, search.php?query=João)
if (isset($_GET['query'])) {
    $busca = $_GET['query'];

    // Prepara a consulta SQL, usando o placeholder para evitar SQL injection.
    // Aqui estamos consultando a tabela 'db_use' e filtrando pelo campo 'nome'
    $stmt = $conn->prepare("SELECT * FROM db_use WHERE NOME LIKE :busca");
    
    // Executa a consulta, usando os curingas (%) para buscar por qualquer ocorrência do termo
    $stmt->execute([':busca' => '%' . $busca . '%']);
    
    // Obtém todos os resultados como um array associativo
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($resultados) {
        echo "<h2>Resultados da pesquisa:</h2>";
        echo "<ul>";
        foreach ($resultados as $row) {
            // Utiliza htmlspecialchars para prevenir problemas com caracteres especiais (XSS)
            echo "<li>" . htmlspecialchars($row['nome']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum resultado encontrado para \"" . htmlspecialchars($busca) . "\".";
    }
} else {
    echo "Por favor, insira um termo de pesquisa.";
}
?>
