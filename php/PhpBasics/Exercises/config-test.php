<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Config Test</title>
</head>
<body>
<main id="include-test">
<?php
  $file = 'config.php';
  if ($path = stream_resolve_include_path($file) ) {
    echo "<h1 class='success'>SUCCESS</h1>
      <p>Found <em>$file</em> at <em>$path</em>";
  } else {
    echo "<h1 class='error'>FAIL</h1>
      <p>Could not find <em>$file</em> in include folders.</p>";
  }
  echo "<p>Your current <code>include_path</code> is " .
    ini_get('include_path');
?>
</main>
</body>
</html>