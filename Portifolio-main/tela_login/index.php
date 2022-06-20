<?php
    require_once 'usuarios.php'; //require_once importa a tela usuarios
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="corpo-form">
        <h1>ENTRAR</h1>
        <form method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="ACESSAR">
            <a href="cadastrar.php">Ainda não possui cadastro? <strong>Cadastre-se</strong> </a>
        </form>
    </div>
    <div class="container-negocinho">
        <div class="swapping-squares-spinner":style="spinner">
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
        </div>
    </div>

<?php
    if(isset($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if(!empty($email) && !empty($senha))
        {
            $usuario->conectar("tela_login57", "localhost", "root", "");
            if($usuario->msgErro == "")
            {
                if($usuario->logar($email, $senha))
                {
                    header("location: home.php");
                }
                else
                {
                    ?>
                        <div id="msg-sucesso">
                            Os campos não correspomdem!!
                        </div>
                    <?php
                }
            }
            else 
            {
                ?>
                    <div id="msg-sucesso">
                        <?php echo "oi ".$usuario->msgErro ?>
                    </div>
                <?php
            }
        }
        else
        {
            ?>
                <div id="msg-sucesso">
                    Preencha todos os campos!!
                </div>
            <?php
        }
    }
?>
</body>
</html>