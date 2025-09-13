<?php
  $greeting = 'Hello, World!';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title><?php echo $greeting; ?></title>
</head>
<body>
<main>
  <p>
<?php
  echo $greeting;
?>
  </p>
</main>
</body>
</html>