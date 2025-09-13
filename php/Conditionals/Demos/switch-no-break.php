<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>switch/case</title>
</head>
<body>
<main>
<?php
$quantity = 1;
switch ($quantity) {
  case 1 :
    echo '<p>Quantity is 1.</p>';
  case 2 :
    echo '<p>Quantity is 2.</p>';
  default :
    echo '<p>Quantity is not 1 or 2.</p>';
}
?>
</main>
</body>
</html>