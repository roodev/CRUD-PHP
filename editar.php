<?php
  include 'config.php';
  include 'Database.php';

  if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $config = new db();
      $database = new Database($config);
      $database->enableQueryLogging();

      $query = "SELECT * FROM cliente WHERE id = :id";
      $parameters = [':id' => $id];


      // var_dump($query);
      // var_dump($parameters);

      $cliente = $database->executeQuery($query, $parameters);

      if (!empty($cliente)) {
          $cliente = $cliente[0]; 
          $nome = $cliente['nome'];
          $idade = $cliente['idade'];
          $email = $cliente['email'];
      }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1>Editar Cliente</h1>
      <form action="cadastrar.php" method="post">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $nome; ?>">
        </div>
        <div class="form-group">
          <label for="idade">Idade:</label>
          <input type="number" class="form-control" id="idade" name="idade" required value="<?php echo $idade; ?>">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email" required value="<?php echo $email; ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
