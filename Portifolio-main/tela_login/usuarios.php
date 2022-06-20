<?php

class Usuario
{   
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try
        {
            $pdo = new PDO("mysql:dbname=".$nome, $usuario, $senha);
        }catch(PDOException $e){
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;
        //verificar se o email já existe

        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();

        if($sql->rowCount()>0)
        {
            return false; //email já cadastrado
        }
        else
        {
            //caso o email não esteja cadastrado
            $sql = $pdo->prepare("INSERT INTO usuarios(nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);//bildValue serve para apelidar a variavel e trocar seu nome, para mini segurança
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));//funcao para criptografar a senha 
            $sql->execute();
            return true;//se deu td certo ta cadastrado
        }
    }

    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se o email e senha estao corretos, se ss...
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCount()>0)
        {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true;
        }
        else
        {
            return false;
        }
    }
}


?>