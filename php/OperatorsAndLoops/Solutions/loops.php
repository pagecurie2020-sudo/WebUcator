<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Loops</title>
</head>
<body>
<main>
<h2>while</h2>
<ul>
<?php
  $a=2;
  while ($a <= 100) {
    echo "<li>$a</li>";
    $a+=2;
  }
?>
</ul>

<h2>for</h2>
<ul>
<?php
  for ($a=1; $a <= 100; $a+=2) {
    echo "<li>$a</li>";
  }
?>
</ul>
</main>
</body>
</html>