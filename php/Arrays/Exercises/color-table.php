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
    // Create an array that holds your favorite colors.
    // A list of color names can be found at
    // https://developer.mozilla.org/en-US/docs/Web/CSS/named-color
  ?>
  <table>
    <thead>
      <tr>
        <th>Color</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Output a table row for each color.  The background
        // color of the row should be the same as the listed color.
      ?>
    </tbody>
  </table>
</main>
</body>
</html>