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

    $colors = ["fuchsia", "silver", "gray", "maroon", "red", "lime"];


  





    // A list of color names can be found at
    // https://developer.mozilla.org/en-US/docs/Web/CSS/named-color
  ?>
  <table width="500" align="center" border="1" cellpadding="10" cellspacing="5">
    <thead>
      <tr>
        <th>Color</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      foreach($colors as  $color){

        echo "<tr style='background : $color'><td align='center'><strong>$color</strong></td><tr>";



      }
        // Output a table row for each color.  The background
        // color of the row should be the same as the listed color.
      ?>
    </tbody>
  </table>
</main>
</body>
</html>