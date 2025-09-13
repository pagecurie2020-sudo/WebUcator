<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Two-dimensional Arrays</title>
</head>
<body>
<main>
  <h1>Two-Dimensional Arrays</h1>
  <?php
  $rockBands = [
    ['Beatles',
          'Love Me Do',
          'Hey Jude',
          'Helter Skelter'],
    ['Rolling Stones',
          'Waiting on a Friend',
          'Angie',
          'Yesterday\'s Papers'],
   ['Eagles',
          'Life in the Fast Lane',
          'Hotel California',
          'Best of My Love']
  ];
  ?>
  <table>
    <thead>
      <tr>
        <th>Rock Band</th>
        <th>Song 1</th>
        <th>Song 2</th>
        <th>Song 3</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($rockBands as $rockBand) {
        // $rockBand contains an inner array
        echo '<tr>';
        foreach($rockBand as $item)   {
          echo "<td>$item</td>";
        }
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
</main>
</body>
</html>