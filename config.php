<?php
  class db{
    private $host = "localhost";
    private $dbname = "clientes_db";
    private $user = "root";
    private $password = "";

    public function conexao(){
      try{
        $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $PDO;
      }catch(PDOException $e){
        throw new Exception("Erro na conexão com o banco de dados: " . $e->getMessage());
      }
    }
  }

  try {
    $obj = new db();
    $conexao = $obj->conexao();
  } catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
  }

?>