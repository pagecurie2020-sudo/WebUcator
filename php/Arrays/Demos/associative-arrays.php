<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Associative Arrays</title>
</head>
<body>
<main>
  <h1>Associative Arrays</h1>
  <?php
  $beatles = ['singer1' => 'John',
              'singer2' => 'Paul',
              'guitarist' => 'George',
              'drummer' => 'Ringo'];

  echo $beatles['drummer']; // outputs Ringo
  ?>
  <hr>
  <ol>
    <?php
    foreach ($beatles as $key => $beatle) {
      echo "<li><strong>$key:</strong> $beatle</li>";
    }
    ?>
  </ol>
</main>
</body>
</html>