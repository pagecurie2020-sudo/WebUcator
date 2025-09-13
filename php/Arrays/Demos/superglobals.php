<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Superglobal Arrays</title>
</head>
<body>
<main>
  <h1>Superglobal Arrays</h1>
  <h2>$_COOKIE</h2>
  <ol>
    <?php
      foreach ($_COOKIE as $key => $item) {
        echo "<li><strong>$key:</strong> $item</li>";
      }
    ?>
  </ol>
  <hr>
  <h2>$_ENV</h2>
  <ol>
  <?php
      foreach ($_ENV as $key => $item) {
        echo "<li><strong>$key:</strong> $item</li>";
      }
    ?>
  </ol>
  <hr>
  <h2>$_FILES</h2>
  <ol>
    <?php
      foreach ($_FILES as $key => $item) {
        echo "<li><strong>$key:</strong> $item</li>";
      }
    ?>
  </ol>
  <hr>
  <h2>$_GET</h2>
  <ol>
    <?php
      foreach ($_GET as $key => $item) {
        echo "<li><strong>$key:</strong> $item</li>";
      }
    ?>
  </ol>
  <hr>
  <h2>$_POST</h2>
  <ol>
    <?php
      foreach ($_POST as $key => $item) {
        echo "<li><strong>$key:</strong> $item</li>";
      }
    ?>
  </ol>
  <hr>
  <h2>$_REQUEST</h2>
  <ol>
    <?php
      foreach ($_REQUEST as $key => $item) {
        echo "<li><strong>$key:</strong> $item</li>";
      }
    ?>
  </ol>
  <hr>
  <h2>$_SESSION</h2>
  <ol>
    <?php
      foreach ($_SESSION as $key => $item) {
        echo "<li><strong>$key:</strong> $item</li>";
      }
    ?>
  </ol>
  <hr>
  <h2>$_SERVER</h2>
  <ol>
    <?php
      foreach ($_SERVER as $key => $item) {
        echo "<li><strong>$key:</strong> $item</li>";
      }
    ?>
  </ol>
</main>
</body>
</html>