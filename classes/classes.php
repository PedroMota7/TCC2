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
