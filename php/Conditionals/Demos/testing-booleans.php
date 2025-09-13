<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Testing booleans</title>
</head>
<body>
<main>
  <p>When converted to strings (for echoing)
      true becomes '1' and false becomes ''.
      As a result, false values don't show up at all.</p>
  <?= true // Outputs 1 ?><br>
  <?= boolval('1') // Outputs 1 ?><br>
  <?= false // Outputs nothing ?><br>
  <?= boolval('0') // Outputs nothing ?><br>

  <p>To make sure you see the result, 
      pass the value to <code>var_dump()</code>.</p>
  <?= var_dump(true) // Outputs bool(true) ?><br>
  <?= var_dump(boolval('1')) // Outputs bool(true) ?><br>
  <?= var_dump(false) // Outputs bool(false) ?><br>
  <?= var_dump(boolval('0')) // Outputs bool(false) ?><br>
</main>
</body>
</html>