<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Sanitizing</title>
</head>
<body>
  <main>
    <h1>Sanitizing</h1>
    <?php
      $originalText = '';
      $htmlEntities = '';
      $filterVar = '';
      $filterInput = '';
      if (isset($_GET['original-text'])) {
        $originalText = $_GET['original-text'];
        $htmlSpecialChars = htmlspecialchars($originalText);
        $htmlEntities1 = htmlentities($originalText);
        $htmlEntities2 = htmlentities($originalText, ENT_QUOTES);
        $filterVar = filter_var($originalText, FILTER_SANITIZE_SPECIAL_CHARS);
        $filterInput = filter_input(INPUT_GET, 'original-text', FILTER_SANITIZE_SPECIAL_CHARS);
      } 
    ?>
    <form>
      <label for="original-text">Text to Escape:</label>
      <input autofocus name="original-text" id="original-text" value="<?= $originalText ?>">
      <input id="htmlspecialchars()" value="<?= $htmlSpecialChars ?>">
      <input id="htmlentities()-1" value="<?= $htmlEntities1 ?>">
      <input id="htmlentities()-2" value="<?= $htmlEntities2 ?>">
      <input id="filter_var()" value="<?= $filterVar ?>">
      <input id="filter_input()" value="<?= $filterInput ?>">
      <button>Convert</button>
    </form>
  </main>
</body>
</html>