<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Color Table</title>
<style>

  h1{
    text-align : center;
  }

  thead{
    color : black;
    text-align : left;
  }
  table{

    border-collapse : collapse;
    color:white;
    
  }
</style>
</head>
<body>
<main>
  <h1>Color Table</h1>
  <?php
    // Create an associative array that holds color hex codes
    $colors =[
      "green" => "#008800",
      "black" => "#521d1dff",
      "purple"=> "#4b0082",
      "grey" => "#dddddd",
      "yellow" => "#ddb113e0",
      "blue" => "#000080",
    ];
    // indexed by their color names, which can be found at
    // https://developer.mozilla.org/en-US/docs/Web/CSS/named-color
  ?>

  <table width="500px" cellpadding="5" border="1" align="center">
    <thead>
      <tr>
        <th>Color Name</th>
        <th>Hex Code</th>
      </tr>
    </thead>
    <tbody>
      <?php

        //Loop through the array outputting a table row with
        foreach($colors as $color => $col){
          echo "<tr style='background-color: $col'>";
              echo "<td>$color</td>";
              echo "<td>$col</td>";
          echo "</tr>";

        }
        //two columns for each element in the array
      ?>
    </tbody>
  </table>
</main>
</body>
</html>