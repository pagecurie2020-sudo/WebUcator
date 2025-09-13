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
    $favColors = [
      'blanchedalmond' => '#ffebcd',
      'lightsalmon' => '#ffa07a',
      'burlywood' => '#deb887',
      'lemonchiffon' => '#fffacd',
      'hotpink' => '#ff69b4',
      'papayawhip' => '#ffefd5'
    ];
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
        foreach ($favColors as $key => $item) {
          echo "<tr style='background-color:$key'>
                  <td>$key</td>
                  <td>$item</td>
                </tr>";
        }
      ?>
    </tbody>
  </table>
</main>
</body>
</html>