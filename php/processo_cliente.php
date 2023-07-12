<?php

require_once("../php/db.php");
require_once("../php/globals.php");
require_once("../php/ClienteModel.php");
require_once("../php/msg.php");
require_once("../php/ClienteDAO.php");

// Verificando o tipo do formulário
$type = filter_input(INPUT_POST, "type");

$message = new Message($BASE_URL);
$clienteDao = new ClienteDao($conn, $BASE_URL);



if ($type === "register") {

  $nome = filter_input(INPUT_POST, "nome_clie");
  $login = filter_input(INPUT_POST, "login");
  $senha = filter_input(INPUT_POST, "senha");
 




  // Verificação de dados mínimos 
  if ($nome && $login && $senha) {

    // Verificar se as senhas batem
    // if ($senha === $senha) {

      // Verificar se o e-mail já está cadastrado no sistema
      

        $cliente = new Cliente();

        $cliente->nome_clie = $nome;
        $cliente->login = $login;
        $cliente->senha = $senha;
     
        $auth = true;

        $clienteDao->criar_clie($cliente, $auth);
        $message->setMessage("Usuário cadastrado, seja bem vindo!.", "sucess", "catalogo.html");
       
    // } else {

    //   // Enviar uma msg de erro, de senhas não batem
    //   $message->setMessage("A senha não foi digitada.", "error", "back");
    // }
  } else {

    // Enviar uma msg de erro, de dados faltantes
    $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
  
  }
} elseif ($type === "login") {

  $login = filter_input(INPUT_POST, "login");
  $password = filter_input(INPUT_POST, "senha");


   
  $retorno = $clienteDao->authenticateUser($login, $password);

  // Tenta autenticar usuário
  if ($retorno['erro'] !==  true) {

    $_SESSION['usuario'] = $retorno['usuario'];
    $message->setMessage("Seja bem-vindo!", "success", "catalogo.html");

    // Redireciona o usuário, caso não conseguir autenticar
  }else{

    $message->setMessage("Usuário e/ou senha incorretos.", "error", "");
  }
} else {
    $message->setMessage("Informações inválidas!", "error", "area_login.html");
}