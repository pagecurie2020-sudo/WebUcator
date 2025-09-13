<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Color Table</title>
</head>
<body>
<main>
  <h1>Color Table</h1>
  <?php
    // Create an associative array that holds color hex codes
    // indexed by their color names, which can be found at
    // https://developer.mozilla.org/en-US/docs/Web/CSS/named-color
  ?>

  <table>
    <thead>
      <tr>
        <th>Color Name</th>
        <th>Hex Code</th>
      </tr>
    </thead>
    <tbody>
      <?php
        //Loop through the array outputting a table row with
        //two columns for each element in the array
      ?>
    </tbody>
  </table>
</main>
</body>
</html>