<?php
  require_once('config.php');

  $db = new db();

  $connection = $db->conexao();

  if ($connection instanceof PDO) {
      echo "Conexão bem-sucedida com o banco de dados!";
  } else {
      echo "Erro de conexão: " . $connection;
  }
?>