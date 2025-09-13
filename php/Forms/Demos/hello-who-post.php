<?php
  $firstName = $_POST['first-name'];
  $greeting = $_POST['greeting'];
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title><?= $greeting . ', ' . $firstName ?>!</title>
</head>
<body>
<main>
<?php
  echo "<p>$greeting, $firstName!</p>";
?>
</main>
</body>
</html>