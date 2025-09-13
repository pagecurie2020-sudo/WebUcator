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
    $favColors = ['blanchedalmond',
                  'lightsalmon',
                  'burlywood',
                  'lemonchiffon',
                  'hotpink',
                  'papayawhip'];
  ?>
  <table>
    <thead>
      <tr>
        <th>Color</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($favColors as $color) {
          echo "<tr style='background-color:$color'>
                  <td>$color</td>
                </tr>";
        }
      ?>
    </tbody>
  </table>
</main>
</body>
</html>