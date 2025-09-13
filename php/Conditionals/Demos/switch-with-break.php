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
    echo 'Quantity is 1';
    break;
  case 2 :
    echo 'Quantity is 2';
    break;
  default :
    echo 'Quantity is not 1 or 2';
}
?>
</main>
</body>
</html>