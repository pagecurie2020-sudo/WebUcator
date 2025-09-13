<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>User-defined Function with Default Values</title>
</head>
<body>
<main>
<?php
  function addNums($param1=0, $param2=0, $param3=0) {
    $sum = $param1 + $param2 + $param3;
    return $sum;
  }

  $total = addNums(1,3);

  echo $total;
?>
</main>
</body>
</html>