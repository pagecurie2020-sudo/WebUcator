<?php

$greeting = $_GET['greeting'];

print_r($greeting );

if(isset($greeting)){

 echo $greeting;

}else{
echo "thanks for converting the null coalescing to isset() <br> but your $greeting variable has not been set";

}
  //$greeting = $_GET['greeting'] ?? 'Hello';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../styles/normalize.css">
<link rel="stylesheet" href="../../styles/styles.css">
<title><?= $greeting ?>, World!</title>
</head>
<body>
<main>
<?php
  echo "<p>$greeting, World!</p>";
?>
</main>
</body>
</html>