<?php
  if (isset($_GET['greeting'])) {
    $greeting1 = $_GET['greeting'];
  } else {
    $greeting1 = 'Hello';
  }

  if (!empty($_GET['greeting'])) {
    $greeting2 = $_GET['greeting'];
  } else {
    $greeting2 = 'Hello';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>isset() vs !empty()</title>
</head>
<body>
<main>
  <h2>isset()</h2>
  <p><?= $greeting1 ?>, World!</p>
  <h2>!empty()</h2>
  <p><?= $greeting2 ?>, World!</p>
</main>
</body>
</html>