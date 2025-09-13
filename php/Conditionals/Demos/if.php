<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>if-elseif-else</title>
</head>
<body>
<main>
<?php
$age = 21;
if ($age >= 21) {
  echo 'You can vote and drink!';
} elseif ($age >= 18) {
  echo 'You can vote, but can\'t drink.';
} else {
  echo 'You cannot vote or drink.';
}
?>
</main>
</body>
</html>