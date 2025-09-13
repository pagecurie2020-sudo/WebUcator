<?php
  $beatle = $_GET['beatle'];
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Hello, <?= $beatle ?>!</title>
</head>
<body>
<main>
<?php
  echo "<p>Hello, $beatle!</p>";
?>
</main>
</body>
</html>