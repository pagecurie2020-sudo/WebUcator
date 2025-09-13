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
if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["dominant-hand"]) && !empty($_GET["last-name"])){


$lastName = $_GET["last-name"];
$answer = $_GET["dominant-hand"];

echo "<p>Hello $lastName!<br/> You are   $answer   handed </p>";

}else{

 echo "<p>YOu must fill out the form. Please try again <a href='greeting.html'>Try again</a></p>";
}
?>
</main>
</body>
</html>