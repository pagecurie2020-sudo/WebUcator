<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Local Variables</title>
</head>
<body>
<main>
<?php
  $a = 10;

  function incrNumBy($incr) {
    return $a + $incr;
  }
  $c = incrNumBy(5); 
  echo '<hr>';
  echo $c; // outputs 5 to the browser
?>
</main>
</body>
</html>