<?php
class Conexao {
    protected $mysqli;
    protected $server = '127.0.0.1'; 
    protected $user = 'root'; 
    protected $pass = ''; 
    protected $dataBase = 'teste'; 

  public function Conectar(){
      $this->mysqli = new mysqli($this->server, $this->user, $this->pass, $this->dataBase);
      if ($this->mysqli->errno) {
         echo("Problema na conexao com banco de dados. Erro:" . $this->mysqli->connect_errno);
         exit();
      }
      
      $this->mysqli->set_charset('utf8');
  }
}

?>