<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logocentro.png" type="image/x-icon">
  <link rel="stylesheet" href="../style/registrar_acesso.css">
  <title>Registrar Acesso</title>
</head>

<body>
  <center>
    <div id="caixa">
      <?php
      // configurações do banco
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
        exit('<h2>Erro na conexão com o banco:</h2> ' . $e->getMessage());
      }

      // valida QR
      if (!isset($_GET['qr'])) {
        exit('<h2>QR Code inválido!</h2>');
      }
      $dataQr = trim($_GET['qr']);

      // busca usuário
      $stmt = $pdo->prepare("SELECT * FROM db_use WHERE qr_code = :data");
      $stmt->execute(['data' => $dataQr]);
      $usuario = $stmt->fetch();

      if (!$usuario) {
        echo '<h2>QR Code inválido!</h2>';
        echo '<button type="button" onclick="window.location.href=\'leitor.html\'">Voltar</button>';
        exit;
      }

      // conta acessos hoje
      $stmt = $pdo->prepare("
        SELECT COUNT(*) 
          FROM acessos 
         WHERE pessoa_id = :pessoa_id 
           AND DATE(data_hora) = CURDATE()
      ");
      $stmt->execute(['pessoa_id' => $usuario['ID']]);
      $acessosHoje = $stmt->fetchColumn();

      if ($acessosHoje > 0) {
        // já registrou hoje 
        echo '<h2>Já foi registrado o acesso de hoje.</h2>';
        echo '<button type="button" onclick="window.location.href=\'leitor.html\'">Voltar</button>';
        exit;
      }

      // insere novo acesso 
      $stmt = $pdo->prepare("
        INSERT INTO acessos (pessoa_id, data_hora)
        VALUES (:pessoa_id, NOW())
      ");
      $stmt->execute(['pessoa_id' => $usuario['ID']]);

     
      echo '<h2>Acesso registrado com sucesso!</h2>';
      echo '<p>Usuário: ' . htmlspecialchars($usuario['NOME']) . '</p>';
      echo '<p>Horário: ' . date('d/m/Y H:i:s') . '</p>';
      ?>

      <button class="btn" onclick="voltar()">Voltar</button>
      <script>
        function voltar() {
          window.history.back();
        }
      </script>
    </div>
  </center>
</body>

</html>
