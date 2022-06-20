<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;">Bem vindo - $nome</h1>
    <a href="index.php"><button id="btn">voltar</button></a>
    <style>
        button
        {
            background-color: #03658C;
            color: white;
            width: 100px;
            height: 20px;
            border-radius: 10px;
            margin-left: 930px;
        }
    </style>
</body>
</html>