<?php

  class Cliente {

    public $id;
    public $nome_clie;
    public $login;
    public $senha;
  }

  interface ClienteDAOInterface {

    public function Const_cliente($cliente);
    public function criar_clie(Cliente $cliente);
    public function editar_cliente(Cliente $cliente);
    public function authenticateUser($login, $senha);

  }