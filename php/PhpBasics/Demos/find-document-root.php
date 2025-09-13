<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Locating document root</title>
</head>
<body>
<main>
  <p>
    <strong>Document Root:</strong>
    <?= $_SERVER['DOCUMENT_ROOT'] ?>
  </p>
  <p>
    <strong>Current File:</strong>
    <?= __FILE__ ?>
  </p>
  <p>
    <strong>Current Directory:</strong>
    <?= __DIR__ ?>
  </p>
</main>
</body>
</html>