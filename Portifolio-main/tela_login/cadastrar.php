<?php
    require_once 'usuarios.php';
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastar</title>
</head>
<body>
    <div id="corpo-form-card">
        <h1>CADASTRAR</h1>
        <form method="post">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="40">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="10">
            <input type="email" name="email" placeholder="Email" maxlength="50">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="CADASTRAR">
        </form>
    </div>

    <?php
        if(isset($_POST['nome']))
        {
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confirmarSenha = addslashes($_POST['confSenha']);
            
            //verificar se todos os campos estão preenchidos
            if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
            {
                $usuario->conectar("tela_login57", "localhost", "root", "");
                if($usuario->msgErro =="")//tudo ok...Conectamos
                {
                    if($senha == $confirmarSenha)
                    {
                        if($usuario->cadastrar($nome, $telefone, $email, $senha))
                        {
                        echo "<script language:'javascript'>window.alert('cadastrado com sucesso!');window.location.href='index.php';</script>";
                            ?>
                            <?php
                        }
                        else
                        {
                        echo "<script language:'javascript'>window.alert('Ops esse email ja está cadastrado!!');window.location.href='index.php';</script>";
                            ?>
                            <?php
                        }
                    }
                    else
                    {
                    echo "<script language:'javascript'>window.alert('Ops as senhas não correspondem!!');window.location.href='index.php';</script>";
                        ?>
                            <div id="msg-sucesso">
                                as senhas nao correspondem
                            </div>

                        <?php
                    }
                }
            }
            else
            {
                ?>
                <div id="msg-sucesso">
                    <?php echo "Erro:".$usuario->msgErro ?>
                </div>
                <?php
            }
        
        }


    ?>
</body>
</html>