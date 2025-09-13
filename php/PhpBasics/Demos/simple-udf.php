<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Simple User-defined Function</title>
</head>
<body>
<main>
<?php
function addNums($param1, $param2, $param3) {
  $sum = $param1 + $param2 + $param3;
  return $sum;
}

$total = addNums(1,3,5);

echo $total;
?>
</main>
</body>
</html>