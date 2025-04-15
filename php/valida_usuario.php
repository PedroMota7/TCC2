c

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$data = date('Y-m-d');
$TEL = $_POST['tel'];
 

$abc = mysqli_connect('localhost', 'root', '', 'tcc');

if (!$abc) {
    die('Erro ao se conectar ao banco de dados: ' . mysqli_connect_error());
}


$sql = "INSERT INTO db_use (ID, NOME, CPF, EMAIL, DATA_NASC, TELEFONE)
        VALUES (NULL, '$nome', '$cpf', '$email', '$data', '$TEL')";

$result2 = mysqli_query($abc, $sql);

if ($result2) {
    echo "Cadastro realizado com sucesso!";

} else {
    echo "Erro ao cadastrar: " . mysqli_error($abc);
}

mysqli_close($abc);
?>

