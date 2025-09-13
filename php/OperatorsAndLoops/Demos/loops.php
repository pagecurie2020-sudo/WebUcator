<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Loops Demo</title>
</head>
<body>
<main>
  <h2>while</h2>
  <?php
    $a=1;
    while ($a < 6) {
      echo $a;
      $a++;
    }
  ?>
  <h2>do...while</h2>
  <?php
    $a=1;
    do {
      echo $a;
      $a++;
    }
    while ($a < 6);
  ?>
  <h2>for</h2>
  <?php
    for ($a=1; $a < 6; $a++) {
      echo $a;
    }
  ?>
    <h2>break</h2>
    <?php
      for ($a=1; $a < 6; $a++) {
        echo $a;
        if ($a > 3) {
          break;
        }
      }
    ?>
    <h2>continue</h2>
    <?php
      for ($a=1; $a < 6; $a++) {
        if ($a === 3) 	{
          continue;
        }
        echo $a;
      }
    ?>
  </main>
</body>
</html>