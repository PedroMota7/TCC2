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
        $cmd = $this->pdo->prepare("SELECT * FROM db_user WHERE email = :e");
        $cmd->bindValue(":e", $email);
        $cmd->execute();
        
        if ($cmd->rowCount() > 0) {
            return false;
        } else {
            $cmd = $this->pdo->prepare("INSERT INTO db_user(nome, cpf, email, data_nasc, telefone) VALUES (:n, :c, :e, :d, :t)");
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":c", $cpf);
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":d", $data_nasc);
            $cmd->bindValue(":t", $telefone);
            $cmd->execute();
            return true;
        }
    }

    public function alterarUsuario($id_usu, $nome, $cpf, $email, $data_nasc,  $telefone)
{
	// colocamos acima o $id também, não para alterá-lo, mas para usá-lo no filtro.
	$cmd = $this->pdo->prepare("UPDATE db_user SET nome = :n, cpf = :c, email = :e, data_nasc = :d, telefone = :t WHERE id = :i");
	$cmd->bindValue(":n", $nome);
	$cmd->bindValue(":c", $cpf);
	$cmd->bindValue(":e", $email);
	$cmd->bindValue(":d", $data_nasc);
	$cmd->bindValue(":t", $telefone);
	$cmd->bindValue(":i", $id_usu);
	$cmd->execute();
	return;
}
public function pesquisar_Para_Alterar_Usuario($email) // para uso do login
{
	$cmd = $this->pdo->prepare("SELECT * FROM db_user WHERE nome = :e");
	$cmd->bindValue(":e",$email);
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
}
?>
