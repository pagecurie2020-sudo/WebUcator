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


//using this code and if (...empty()....), we will use switch(). Dont forget to put and test error_reporting()

ERROR_REPORTING(E_ALL);
ini_set("display_errors", 1);

if($_SERVER["REQUEST_METHOD"]==="GET"  && empty($_GET["last-name"]  )  || empty($_GET["dominant-hand"])){


    echo '

    <h4> Error has occured.</h4>
    <p>

    You must type your last name <br/>
    Or you must select your hand type(right/left).
    
    
    </p>';
    
    

} else{


    $name = $_GET["last-name"];
    $handType = $_GET["dominant-hand"];


    switch($handType){

    case "right":
        echo "<p>$name, you are $handType handed </p>";
        break;

    case "left":
        echo "<p>$name, you are $handType handed </p>";
        break;

        

    }




}






?>
</main>
</body>
</html>