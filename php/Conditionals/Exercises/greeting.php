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

ERROR_REPORTING(E_ALL);
ini_set("display_errors", 1);

if($_SERVER["REQUEST_METHOD"] ==="GET" && empty($_GET["last-name"]) || empty($_GET["dominant-hand"])){

    echo '<h1>An Error occured</h1>
    
        <p>
        You either did not type your name or <br/>
         you did no tell us your hand type.<br/>
        Please type your name and choose right or left handed. 
        
        </p>
    
        ';

}else{


    $name = $_GET["last-name"]; 
    $choice = $_GET["dominant-hand"];


   echo "<h1>  $name, you are $choice handed.</h1>";



}






?>
</main>
</body>
</html>