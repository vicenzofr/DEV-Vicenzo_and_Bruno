<?php

require_once("db.php");
require_once("globals.php");
require_once("models/ClienteModel.php");
require_once("models/Message.php");
require_once("dao/ClienteDAO.php");

// Verificando o tipo do formulário
$type = filter_input(INPUT_POST, "type");

$message = new Message($BASE_URL);
$clienteDao = new ClienteDao($conn, $BASE_URL);



if ($type === "register") {

  $nome = filter_input(INPUT_POST, "nome");
  $cpf = filter_input(INPUT_POST, "cpf");
  $telefone = filter_input(INPUT_POST, "telefone");
  $email = filter_input(INPUT_POST, "email");
  $login = filter_input(INPUT_POST, "login");
  $senha = filter_input(INPUT_POST, "senha");
  $sexo = filter_input(INPUT_POST, "sexo");




  // Verificação de dados mínimos 
  if ($nome && $cpf && $telefone && $email && $login && $senha && $sexo) {

    // Verificar se as senhas batem
    // if ($senha === $senha) {

      // Verificar se o e-mail já está cadastrado no sistema
      if ($clienteDao->findByEmail($email) === false) {

        $cliente = new Cliente();

        // // Criação de token e senha
        // $userToken = $user->generateToken();
        // $finalPassword = $user->generatePassword($password);
        $cliente->nome = $nome;
        $cliente->cpf = $cpf;
        $cliente->telefone = $telefone;
        $cliente->email = $email;
        $cliente->login = $login;
        $cliente->senha = $senha;
        $cliente->sexo = $sexo;

        $auth = true;

        $clienteDao->criar_clie($cliente, $auth);
        $message->setMessage("Usuário cadastrado, seja bem vindo!.", "sucess", "Page_InicioLog.php");
      } else {

        // Enviar uma msg de erro, usuário já existe
        $message->setMessage("Usuário já cadastrado, tente outro e-mail.", "error", "back");
      }
    // } else {

    //   // Enviar uma msg de erro, de senhas não batem
    //   $message->setMessage("A senha não foi digitada.", "error", "back");
    // }
  } else {

    // Enviar uma msg de erro, de dados faltantes
    $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
  
  }
}elseif ($type === "update") {

  $id = filter_input(INPUT_POST, "id");
    $nome = filter_input(INPUT_POST, "nome");
    $telefone = filter_input(INPUT_POST, "telefone");
    $email = filter_input(INPUT_POST, "email");
    $login = filter_input(INPUT_POST, "login");
    $senha = filter_input(INPUT_POST, "senha");
    $sexo = filter_input(INPUT_POST, "sexo");
    
    // Verificação de dados mínimos 
    if ($nome && $telefone && $email && $login && $senha && $sexo) {
  
  
      
          $cliente = new Cliente();
          $cliente->id = $id;
          $cliente->nome = $nome;
          $cliente->telefone = $telefone;
          $cliente->email = $email;
          $cliente->login = $login;
          $cliente->senha = $senha;
          $cliente->sexo = $sexo;
  
          $auth = true;
  
          $clienteDao-> editar_cliente($cliente, $auth);
          $message->setMessage("Cliente editado.", "sucess", "Page_Login.php");
        
    }else
  
      //   // Enviar uma msg de erro, de senhas não batem
        $message->setMessage("Verifique os campos.", "error", "back");
      // }
    /// OUTRO EDITAR
    // Pegar info do usuário para substituir apenas o necessário
    // $auth = new ClienteDAO($conn, $BASE_URL);
  
    // $id = filter_input(INPUT_POST, "id");
    // $nome = filter_input(INPUT_POST, "nome");
    // // $cpf = filter_input(INPUT_POST, "cpf");
    // $telefone = filter_input(INPUT_POST, "telefone");
    // $email = filter_input(INPUT_POST, "email");
    // $login = filter_input(INPUT_POST, "login");
    // $senha = filter_input(INPUT_POST, "senha");
    // $sexo = filter_input(INPUT_POST, "sexo");
  
  
    // $cliente = new Cliente();

    //     // // Criação de token e senha
    //     // $userToken = $user->generateToken();
    //     // $finalPassword = $user->generatePassword($password);
    //     $cliente->id = $id;
    //     $cliente->nome = $nome;
    //     $cliente->telefone = $telefone;
    //     $cliente->email = $email;
    //     $cliente->login = $login;
    //     $cliente->senha = $senha;
    //     $cliente->sexo = $sexo;

    //     $auth = true;

    //     $clienteDao->editar_cliente($cliente);
        // $message->setMessage("Editado com sucesso", "success", "Page_editar.php");
} elseif ($type === "login") {

  $login = filter_input(INPUT_POST, "login");
  $password = filter_input(INPUT_POST, "senha2");

  $retorno = $clienteDao->authenticateUser($login, $password);

  // Tenta autenticar usuário
  if ($retorno['erro'] !==  true) {

    $_SESSION['usuario'] = $retorno['usuario'];
    $message->setMessage("Seja bem-vindo!", "success", "Page_InicioLog.php");

    // Redireciona o usuário, caso não conseguir autenticar
  }else{

    $message->setMessage("Usuário e/ou senha incorretos.", "error", "back");
  }
} else {
    $message->setMessage("Informações inválidas!", "error", "index.php");
}