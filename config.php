<?php
  class db{
    private $host = "localhost";
    private $dbname = "clientes_db";
    private $user = "root";
    private $password = "";

    public function conexao(){
      try{
        $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->password);
        return $PDO;
      }catch(PDOException $e){
        return $e->getMessage();
      }
    }
  }
  $obj = new db();
  print_r($obj->conexao());
?>