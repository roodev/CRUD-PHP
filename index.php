<?php
  include 'config.php';
  include 'Database.php';

  $config = new db();
  $database = new Database($config);

  $database->enableQueryLogging();

  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $excluiu = $database->deleteCliente($id);

    if ($excluiu) {
      header("Location: index.php");
      exit();
    }
  }

  $query = "SELECT * FROM cliente";
  $clientes = $database->executeQuery($query);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <h1>Clientes</h1>
      <a href="cadastro.php" class="btn btn-primary mb-3">Cadastrar Cliente</a>
      <a href="query_log.php" class="btn btn-secondary mb-3">Registros</a>

      <table class="table">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Email</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody id="clientList">
          <?php foreach ($clientes as $cliente) : ?>
            <tr>
              <td><?php echo $cliente['nome']; ?></td>
              <td><?php echo $cliente['idade']; ?></td>
              <td><?php echo $cliente['email']; ?></td>
              <td>
                <a href="editar.php?id=<?php echo $cliente['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="excluir.php?id=<?php echo $cliente['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

</html>