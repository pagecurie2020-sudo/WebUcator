<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Greeting Page</title>
</head>
<body>
<main>
<?php

if($_SERVER["REQUEST_METHOD"]==="GET" && !empty($_GET["dominant-hand"] ) && !empty($_GET["last-name"])){


$name = $_GET["last-name"];
$hand = $_GET["dominant-hand"];


switch($hand){

case "right":
echo "<p>$name, you are $hand handed. </p>";
break;

case "left":
echo "<p>$name, you are $hand  handed.</p>";
break;



}



}else{

  echo "<p>You did not type a name and/or select a choice</p>";

}

?>
</main>
</body>
</html>