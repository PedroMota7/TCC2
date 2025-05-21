<?php
class usuario
{
    private $pdo;

    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $user, $senha);
        }
        catch (PDOException $e) {
            echo "Erro com o banco de dados: ".$e->getMessage();
            exit();
        }
        catch (Exception $e) {
            echo "Erro genérico :".$e->getMessage();
        }
    }

    public function cadastrarUsuario($nome, $cpf, $email, $data_nasc, $telefone)
    {
        // Vendo se já está cadastrado
        $cmd = $this->pdo->prepare("SELECT * FROM db_use WHERE email = :e");
        $cmd->bindValue(":e", $email);
        $cmd->execute();
        
        if ($cmd->rowCount() > 0) {
            return false;
        } else {
            $cmd = $this->pdo->prepare("INSERT INTO db_use(nome, cpf, email, data_nasc, telefone) VALUES (:n, :c, :e, :d, :t)");
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":c", $cpf);
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":d", $data_nasc);
            $cmd->bindValue(":t", $telefone);
            $cmd->execute();
            return true;
        }
    }
    public function excluirUsuario($id_ex)
    {
        $cmd = $this->pdo->prepare("DELETE FROM db_use WHERE id = :id");
        $cmd->bindValue(":id",$id_ex);
        $cmd->execute();
        return true;
    }
    public function alterarUsuario($id_usuario, $nome, $cpf, $email, $data_nasc,  $telefone)
{

	$cmd = $this->pdo->prepare("UPDATE db_use SET nome = :n, cpf = :c, email = :e, data_nasc = :d, telefone = :t WHERE id = :i");
	$cmd->bindValue(":n", $nome);
	$cmd->bindValue(":c", $cpf);
	$cmd->bindValue(":e", $email);
	$cmd->bindValue(":d", $data_nasc);
	$cmd->bindValue(":t", $telefone);
	$cmd->bindValue(":i", $id_usuario);
	$cmd->execute();
	return;
}
public function pesquisar_Para_Alterar_Usuario($id_usuario) // para uso do login
{
	$cmd = $this->pdo->prepare("SELECT * FROM db_use WHERE id = :i");
	$cmd->bindValue(":i",$id_usuario);
	$cmd->execute();
	$res = $cmd->fetch(PDO::FETCH_ASSOC);
	return $res;
}

}

class Administrador
{
    private $pdo;

    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $user, $senha);
        }
        catch (PDOException $e) {
            echo "Erro com banco de dados: ".$e->getMessage();
            exit();
        }
        catch (Exception $e) {
            echo "Erro genérico: ".$e->getMessage();
        }
        
    }

    public function cadastrarAdministrador($nome, $email, $cpf, $cnpj, $senha)
    {
        // Vendo se já está cadastrado
        $cmd = $this->pdo->prepare("SELECT * FROM adm WHERE email = :e");
        $cmd->bindValue(":e", $email);
        $cmd->execute();
        
        if ($cmd->rowCount() > 0) {
            return false;
        } else {
            $cmd = $this->pdo->prepare("INSERT INTO adm(nome, email, cpf, cnpj, senha) VALUES (:n, :e, :c, :cn, :s)");
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":c", $cpf);
            $cmd->bindValue(":cn", $cnpj);
            $cmd->bindValue(":s", $senha);
            $cmd->execute();
            return true;
        }
    }
    public function pesquisarAdministradorLogin($email, $senha) 
{
    // Busca o registro
    $cmd = $this->pdo->prepare("SELECT * FROM adm WHERE email = :e");
    $cmd->bindValue(":e", $email);
    $cmd->execute();

    if ($cmd->rowCount() !== 1) {
        return false;
    }

    $dados  = $cmd->fetch(PDO::FETCH_ASSOC);
    $stored = $dados['senha'];

    //Se for hash válido, use password_verify
    if (password_verify($senha, $stored)) {
        return true;
    }

    // Se NÃO começar com $2y$, trate como senha em texto puro
    if (substr($stored, 0, 4) !== '$2y$' && $senha === $stored) {
        // 3a) Gere o novo hash
        $newHash = password_hash($senha, PASSWORD_DEFAULT);

        // 3b) Atualizando  o banco para trocar a senha em texto pelo hash
        $upd = $this->pdo->prepare("UPDATE adm SET senha = :h WHERE email = :e");
        $upd->bindValue(":h", $newHash);
        $upd->bindValue(":e", $email);
        $upd->execute();

        return true;
    }

    // Qualquer outro caso, falha no login
    return false;
}

}
?>
