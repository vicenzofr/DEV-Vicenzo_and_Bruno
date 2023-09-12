<?php 
$Nome = addslashes($_POST['nome']);
$Email = addslashes($_POST['email']);
$Cel = addslashes($_POST['cel']);
$Msg = addslashes($_POST['msg']);

$Para = "brunodeassuncao03@hotmail.com";
$Assunto = "Contato Do projeto Portifólio - Bruno";

$Corpo = "Nome: ".$Nome."\n"."Email: "
.$Email."\n"."Telefone: ".$Cel. "\n"."Mensagem: ".$Msg;

$Cabeca = "From: brunodeassuncao.2003@gmail.com".
"\n"."Reply-to: ".$Email."\n"."X=Mailer:PHP/".phpversion();

if(mail($Para, $Assunto, $Corpo,$Cabeca)){
    echo("Email Enviado com Sucesso!");
}else{
    echo("Houve um Erro ao Enviar o email!");
}
//Está dando Erro ao enviar! 
?>