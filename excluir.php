<?php

	include 'config.php';
  include 'Database.php';

  if (isset($_GET['id'])) {
  	$id = $_GET['id'];
  }

  $config = new db();
  $database = new Database($config);
	$database->enableQueryLogging();


  if (isset($_GET['id'])) {
  	$id = $_GET['id'];
    $excluiu = $database->deleteCliente($id);

    if ($excluiu) {
	    header("Location: index.php");
      exit();
    } else {
      echo "Erro ao excluir o cliente.";
    }
  }
?>
