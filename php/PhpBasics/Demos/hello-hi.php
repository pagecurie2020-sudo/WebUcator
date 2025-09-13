<?php
  // Assign the passed variable to a variable with
  // a more convenient name.
  $greeting = $_GET['greeting'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title><?= $greeting ?>, World!</title>
</head>
<body>
<main>
<?php
  echo "<p>$greeting, World!</p>";
?>
</main>
</body>
</html>