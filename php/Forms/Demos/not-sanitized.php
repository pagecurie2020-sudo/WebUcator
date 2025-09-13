<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Not Sanitized</title>
</head>
<body>
  <main>
    <h1>Not Sanitized</h1>
    <?php
      $q = $_GET['q'] ?? '';
      if ($q) {
        echo "<p>You searched for <strong>$q</strong>.</p>";
      }
    ?>
    <form>
      <label for="q">Search:</label>
      <input name="q" id="q" value="<?= $q ?>">
      <button class="wide">SEARCH</button>
    </form>
  </main>
</body>
</html>