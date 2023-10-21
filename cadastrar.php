<?php
  include 'config.php';
  include 'Database.php';

  $config = new db();
  $database = new Database($config);
  $database->enableQueryLogging();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome']) && isset($_POST['idade']) && isset($_POST['email'])) {
      $config = new db();
      $database = new Database($config);

      $nome = $_POST['nome'];
      $idade = $_POST['idade'];
      $email = $_POST['email'];

      if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $atualizado = $database->updateCliente($id, $nome, $idade, $email);

        if ($atualizado) {
          header("Location: index.php");
          exit();
        } else {
          echo "Erro ao atualizar cliente. Por favor, tente novamente.";
        }
      } else {
        $inserido = $database->insertCliente($nome, $idade, $email);

        if ($inserido) {
          header("Location: index.php");
          exit();
        } else {
          echo "Erro ao criar cliente. Por favor, tente novamente.";
        }
      }
    } else {
      echo "Por favor, preencha todos os campos do formulário.";
    }
  }
?>
