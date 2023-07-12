<?php

require_once("../php/ClienteModel.php");
require_once("../php/msg.php");
require_once("../php/globals.php");
require_once("../php/db.php");


class ClienteDao implements ClienteDAOInterface
{

  private $conn;
  private $url;
  private $message;

  public function __construct(PDO $conn, $url)
  {
    $this->conn = $conn;
    $this->url = $url;
    $this->message = new Message($url);
  }

  public function Const_cliente($cliente)
  {

    $usuario = new Cliente();

    $usuario->id = $cliente["id_clie"];
    $usuario->nome_clie = $cliente["nome_clie"];
    $usuario->login = $cliente["login"];
    $usuario->senha = $cliente["senha"];
    

    return $usuario;
  }

  


  public function authenticateUser($login, $senha)
  {

    $retorno = array();

    $query = "SELECT id_clie, nome_clie, login, senha
              FROM tb_cliente
              WHERE login = :login AND senha = :senha";

    $result = $this->conn->prepare($query);

    $result->bindParam(":login", $login);
    $result->bindParam(":senha", $senha);
    $result->execute();

    $user = $result->fetch(PDO::FETCH_ASSOC);

   


    if (!empty($user)) {

      $retorno['erro'] = false;
      $retorno['usuario'] = $user;

    } else {

      $retorno['erro'] = true;
    }

    return $retorno;
  }


  public function criar_clie(Cliente $cliente)
  {


    $novo = $this->conn->prepare("INSERT INTO tb_cliente (
        nome_clie, login, senha
      ) VALUES (
        :nome_clie, :login, :senha
      )");

    $novo->bindParam(":nome", $cliente->nome_clie);
    $novo->bindParam(":login", $cliente->login);
    $novo->bindParam(":senha", $cliente->senha);
    

    $novo->execute();

    $novoid =  $this->conn->lastInsertId();

    if ($novoid > 0) {
      //TER ATENÇÂO COMO DEIXAR ENTRAR DO LOGIN DIRETO PRA CONTA DELE ASSIM Q LOGAR.
      $this->message->setMessage("Cliente adicionado com sucesso!", "success", "CA");
    }
  }
//   public function deletar_clie(Cliente $id)
//   {


//     $novo = $this->conn->prepare("DELETE FROM tb_cliente WHERE codclie = :codclie");

//     $novo->bindParam(":codclie", $id);

//     $novo->execute();

//     // Mensagem de sucesso por remover filme
//     $this->message->setMessage("Cliente removido com sucesso!", "success", "arquivo.php");
//   }


  public function editar_cliente(Cliente $cliente)
  {
      


    $mudar = $this->conn->prepare("UPDATE tb_cliente SET
        nome_clie = :nome_clie,
        login = :login,
        senha = :senha,
        WHERE id_clie = :id_clie;       
      ");

    $mudar->bindParam(":nome_clie", $cliente->nome_clie);
    $mudar->bindParam(":login", $cliente->login);
    $mudar->bindParam(":senha", $cliente->senha);    

    $mudar->execute();

    // Mensagem de sucesso por editar o dados 
    $this->message->setMessage("Cliente atualizado com sucesso!", "success", "Page_editar");
  }
}
