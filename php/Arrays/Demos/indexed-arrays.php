<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Indexed Arrays</title>
</head>
<body>
<main>
  <h1>Indexed Arrays</h1>
  <?php
    $beatles = ['John', 'Paul', 'George', 'Ringo'];
    
    echo "<p>$beatles[2]</p>"; //outputs George
    
    $beatles[4] = 'Nat';
    echo "<p>$beatles[4]</p>"; //outputs Nat
    
    $beatles[] = 'Connie';
    echo "<p>$beatles[5]</p>"; //outputs Connie
  ?>
  <hr>
  <ol>
  <?php
    foreach ($beatles as $beatle) {
      echo "<li>$beatle</li>";
    }
  ?>
  </ol>
</main>
</body>
</html>