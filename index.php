<?php
  include 'config.php';
  include 'Database.php';

  $config = new db();
  $database = new Database($config);

  $database->enableQueryLogging();

  $database->insertCliente("Rodrigo Mantovani Fessore", 37, "rodrigo.fessore@email.com");
  $database->insertCliente("Bruce Wayne", 37, "bruce.wayne@email.com");
  $database->deleteCliente(2);
?>