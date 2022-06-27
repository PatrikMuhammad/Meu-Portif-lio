<?php
//Variaveis
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');


//campo E-mail

$arquivo = "
    <p><b>Nome: </b>$nome</p>
    <p><b>Email: </b>$email</p>
    <p><b>Mensagem: </b>$mensagem</p>
    <p>Este e-mail foi enviado em <b>$data_envio</b>$hora_envio</b></p>
"

//Destinatario do email
$destino = '991294627p@gmail.com';
$assunto = 'Contato através do Site';

//Esse sempre deverá existir para garantir a exibição correta dos caracteres
$headers = "MIME-Version: 1.0\n";
$headers = "Content-type: text/html; charset=iso-8859-1\n";
$headers = "From: $nome <$email>";

//Enviar
mail($destino, $assunto, $arquivo, $headers);

echo "<meta http-equiv='refresh' content='10;URLMeu-Portif-lio-main\Portifolio-main\index.html'>"; 

?>