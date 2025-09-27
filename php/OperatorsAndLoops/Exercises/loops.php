<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Loops</title>
<style>
  ul{
    list-style-type:none;
  }
</style>
</head>

<body>
<main>
  <h2>Use while to print even numbers b/w 1-100</h2>
  <ul>
  <?php
    //Use a while loop to output all the even numbers
    //less than or equal to 100.
    $i = 2;
    $box = [];

    while($i <= 100){
 
      $color = ($i < 25) ? "red" : ($i  < 50 ? "blue" : "green");

      echo "<li style='color:$color'> $i </li>";

     // if($i % 2 === 0){


      //  $box [] = $i;
     // }


      $i += 2;
    }

  //  echo "Even numbers: " . implode(", " , $box);
  ?>
  </ul>

  <h2>for</h2>

<ul>
  <?php
 // $store = [];
  for ($i = 1; $i <= count(range(1,100)); $i+=2){

    $color = ($i <=50) ? "green" : "purple";

   // $store[] = $i;

   echo "<li style='color : $color'> $i </li>";
   
  }
    //Use a for loop to output all the odd numbers
    //less than or equal to 100.

 // echo implode(", ", $store);
  ?>
  </ul>
</main>
</body>
</html>