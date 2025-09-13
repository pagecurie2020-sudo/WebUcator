
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>gettype()</title>
</head>
<body>
<main>
<?php
  $a = '1'; // $a is a string
  echo gettype($a);
  echo '<hr>';

  $a = (int) $a; // $a is now an integer
  echo gettype($a);
  echo '<hr>';
  
  $a = (bool) $a; // $a is now a boolean
  echo gettype($a);
?>
</main>
</body>
</html>