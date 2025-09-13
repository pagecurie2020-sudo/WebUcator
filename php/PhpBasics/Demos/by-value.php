<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>By Value</title>
</head>
<body>
<main>
<?php
  $a = 10;
  $b = 5;
  function incrNumBy($num,$incr)   {
    $num += $incr;
  }
  
  incrNumBy($a,$b);
  echo $a; //outputs 10 to the browser
?>
</main>
</body>
</html>