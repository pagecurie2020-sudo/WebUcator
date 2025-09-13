<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>switch/case</title>
</head>
<body>
<main>
  <p>You have the following permissions:</p>
  <ol>
<?php
$role = 'Admin';
switch ($role) {
  case 'SuperAdmin' :
    echo '<li>Delete</li>';
  case 'Admin' :
    echo '<li>Update</li>';
  case 'Contributor' :
    echo '<li>Create</li>';
  default :
    echo '<li>Read</li>';
}
?>
  </ol>
</main>
</body>
</html>