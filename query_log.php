<!DOCTYPE html>
<html>

<head>
  <title>Queries</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
  <div class="container">
    <h1>Histórico de Queries</h1>
    <?php
    $logFile = 'query_log.txt';

    if (file_exists($logFile)) {
      $logContents = file_get_contents($logFile);
      echo '<div class="table-container">';
      echo '<table class="table table-bordered">';
      echo '<tr><td><pre>' . htmlspecialchars($logContents) . '</pre></td></tr>';
      echo '</table>';
      echo '</div>';
    } else {
      echo 'O arquivo de log não foi encontrado.';
    }
    ?>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<style>
  .table-container {
    max-height: 500px;
    overflow: auto;
  }

  .btn {
    margin-top: 8px;
  }
</style>