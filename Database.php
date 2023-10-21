<?php

  class Database extends PDO {
    private $connection;
    private $logQueries = false;

    public function __construct(db $config) {
      $config = $config->conexao();

      try {
          $this->connection = $config;
          $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          die("Erro na conexão com o banco de dados: " . $e->getMessage());
      }
    }

    public function enableQueryLogging(){
      $this->logQueries = true;
    }
    
    public function disableQueryLogging(){
      $this->logQueries = false;
    }
    
    private function logQuery($query){
      if($this->logQueries){
        $logFile = "query_log.txt";
        $timestamp = date("d/m/Y H:i:s");
        $logEntry ="[$timestamp] $query\n";
        file_put_contents($logFile, $logEntry, FILE_APPEND);
      }
    }

    public function executeQuery($query, $parameters = []) {
      $stmt = $this->connection->prepare($query);
      $stmt->execute($parameters);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $this->logQuery($query);
  
      return $result;
  }
    
    public function insertCliente($nome, $idade, $email) {
        $this->enableQueryLogging();
        $query = "INSERT INTO cliente (nome, idade, email) VALUES (:nome, :idade, :email)";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':idade', $idade);
        $stmt->bindValue(':email', $email);

        $this->logQuery($query);

        return $stmt->execute();
    }

    public function updateCliente($id, $nome, $idade, $email) {
        $this->enableQueryLogging();
        $query = "UPDATE cliente SET nome = :nome, idade = :idade, email = :email WHERE id = :id";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':idade', $idade);
        $stmt->bindValue(':email', $email);

        $this->logQuery($query);

        return $stmt->execute();
    }

    public function deleteCliente($id) {
        $this->enableQueryLogging();
        $query = "DELETE FROM cliente WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $id);

        $this->logQuery($query);

        return $stmt->execute();
    }

    public function getConnection() {
      return $this->connection;
    }
  }
?>
