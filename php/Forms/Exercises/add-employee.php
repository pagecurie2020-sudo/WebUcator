<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

  // Used to populate birth-month and hire-month fields
  $months = [
    'January', 'February', 'March', 'April', 'May', 'June', 'July',
    'August', 'September', 'October', 'November', 'December'
  ];

  // Used to populate courtesy-title field
  $courtesyTitles = [ 'Dr.', 'Mr.', 'Mrs.', 'Ms.' ];

  $f = [];
  
          
  //retrieving and cleaning all named inputs
      $f["first-name"] = trim( $_POST["first-name"] ?? "");
      $f["last-name"] = trim($_POST["last-name"] ?? null);
       $f["email"] = trim($_POST["email"] ?? null);
      $f["password-1"] = trim( $_POST["password-1"] ?? "");
      $f["password-2"] = trim($_POST["password-2"] ?? null);
      $f["title"] = trim( $_POST["title"] ?? "");
      $f["courtesy-title"] = trim($_POST["courtesy-title"] ?? null);
       $f["cell-phone"] = trim($_POST["cell-phone"] ?? null);
       $f["birth-month"] = trim( $_POST["birth-month"] ?? "");    
      $f["birth-day"] = trim($_POST["birth-day"] ?? null);
       $f["birth-year"] = trim($_POST["birth-year"] ?? null);
       $f["hire-month"] = trim($_POST["hire-month"] ?? null);
       $f["hire-day"] = trim($_POST["hire-day"] ?? null);
      $f["hire-year"] = trim($_POST["hire-year"] ?? null);
       $f["notes"] = trim($_POST["notes"] ?? null);
//retrieving all birth date parts and validating to ensure they are integers
      $f["birth-month"]  = filter_input(INPUT_POST,"birth-month", FILTER_VALIDATE_INT );
      $f["birth-day"] = filter_input(INPUT_POST,"birth-day", FILTER_VALIDATE_INT );
      $f["birth-year"]  = filter_input(INPUT_POST,"birth-year", FILTER_VALIDATE_INT);  
      
//saving the errors
    $errors = [];
      
      if(!$f["first-name"]){
       $errors[]  = "First Name is required"; 
      }
      if(!$f["last-name"]){
       $errors[]  = "Last Name is required"; 
      }
      
      
      if(!$f["email"] ){
        $errors[] ="Email is required";
        }
       elseif(!filter_var($f["email"], FILTER_VALIDATE_EMAIL)){

          $errors[] ="Email is not valid";

       }

       if(!$f["password-1"] ){
        $errors[] ="Password is required";
       }
       elseif(strlen($f["password-1"]) <8 ){
         $errors[] ="Password must be at least 8 characters.";
       }
       elseif( $f["password-1"] !==  $f["password-2"]){
        $errors[] = "Passwords do not match";
       }

      if(!$f["title"]){
        $errors[] = "Your job title is required";
      }

      if(!$f["courtesy-title"]){
        $errors[] = "Your courtesy title is required";
      }
      if(! $f["cell-phone"]){
       $errors[] = "Your cell phone number is required"; 
      }

      if(!$f["birth-month"] || !$f["birth-day"] || !$f["birth-year"] ){
        $errors[]  =" A full birth date is required";

      }elseif(!checkdate($f["birth-month"],$f["birth-day"],$f["birth-year"] )){
        $errors[] ="Enter a valid BIRTH month,date or year";
      }

      if(!$f["hire-month"] || !$f["hire-day"] || !$f["hire-year"] ){
         $errors[] = "A full hire date is required";
      }elseif(!checkdate($f["hire-month"],$f["hire-day"], $f["hire-year"]  )){
        $errors[] ="Enter a HIRE valid month,date or year";
      }

    
      if(strlen($f["notes"]) > 100){

        $errors[] = "Notes cannot be longer than 100 characters";

      }
      
      
//form submission and displaying errors or valid data

if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["add-employee"])){


  if($errors){
        echo "<ul>";

        foreach($errors as $e){
          echo "<li>$e</li>";
        }

        echo "</ul>";
      }
    


}
        
    

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Add Employee</title>
</head>
<body>
<main>
  <h1>Add Employee</h1>
  <?php

   if(!$errors){
   $fullName =  $_POST["first-name"] ." ".$_POST["last-name"];
   $title = $_POST["title"];
   $cellPhone = $_POST["cell-phone"];
   $notes = $_POST["notes"];
   $birthDate = mktime(0,0,0,  $f["birth-month"],  $f["birth-day"],  $f["birth-year"]);
   $sbirthDate  = date("F d, Y", $birthDate);
  $hiredate  = mktime(0,0,0, $f["hire-month"],$f["hire-day"], $f["hire-year"] );
  $shiredate  = date("F d, Y", $hiredate );
  

?>
 
  <h3>Form Data</h3>
  
  <ul>
    <li><b>Name:</b> <?php echo $fullName   ?></li>
     <li><b>Title:</b> <?php echo $title    ?></li>
      <li><b>Cell Phone:</b> <?php echo $cellPhone    ?></li>
     <li><b>Notes:</b> <?php echo $notes    ?></li>
     <li><b>Born:</b> <?php echo $sbirthDate   ?></li>
     <li><b>Start Date:</b> <?php echo  $shiredate   ?></li>
     

  </ul>

  <?php
   }
   if($errors || !isset($_POST["add-employee"])){
   ?>

  
  <form method="post" action="add-employee.php" novalidate>
    <label for="first-name">First Name:</label>
    <input name="first-name" id="first-name" value="<?= htmlspecialchars($f['first-name']) ?>">
    <label for="last-name">Last Name:</label>
    <input name="last-name" id="last-name" value="<?= htmlspecialchars($f['last-name']) ?>">
    <label for="email">Email:</label>
    <input type="email" name="email"  value="<?= htmlspecialchars($f['email']) ?>">
    <fieldset>
      <legend>Password:</legend>
      <input type="password" placeholder="Password" value="<?= htmlspecialchars($f['password-1']) ?>"
            name="password-1" id="password-1">
      <input type="password" placeholder="Repeat Password" value="<?= htmlspecialchars($f['password-2']) ?>"
            name="password-2" id="password-2">
    </fieldset>
    <label for="title">Title:</label>
    <input name="title" id="title" value="<?= htmlspecialchars($f['title']) ?>">
    <fieldset>
      <legend>Title of Courtesy:</legend>
      <?php
        foreach ($courtesyTitles as $cTitle) {
          $checked = ($f['courtesy-title'] == $cTitle ) ? 'checked' : '';
          echo "<label>
          <input type='radio' name='courtesy-title' value='$cTitle' $checked >
          $cTitle</label>";

        
        }
      ?>
    </fieldset>
    <fieldset>
      <legend>Birth date:</legend>
      <select name="birth-month" id="birth-month" >
        <option value="0">--Select Month--</option>
        <?php
          for ($i=1; $i<=12; $i++) {
            $selected = ( $f['birth-month'] == $i ) ? 'selected' : '';
            echo "<option value='$i' $selected>" . $months[$i-1] . "</option>";
          }
        ?>
      </select>
    


      <input name="birth-day" type="number" min="1" max="31"  value="<?= $f['birth-day'] ?>"
        placeholder="day">
      <input name="birth-year" type="number" value="<?= $f['birth-day'] ?>" placeholder="year">
    </fieldset>
    <fieldset>
      <legend>Hire date:</legend>
      <select name="hire-month">
        <option value="">--Select Month--</option>
        <?php
        
          for ($i=1; $i<=12; $i++) {
            $selected = ($f['hire-month'] == $i) ? 'selected' : '';
            echo "<option value='$i' $selected>" . $months[$i-1] . "</option>";
          }
        ?>
      </select>
      <input name="hire-day" type="number" min="1" max="31" value="<?= $f['hire-day'] ?>"
        placeholder="day">
      <input name="hire-year" type="number" value="<?= $f['hire-year'] ?>" placeholder="year">
    </fieldset>
    <label for="cell-phone">Cell Phone:</label>
    <input type="tel" name="cell-phone" id="cell-phone" value="<?= htmlspecialchars($f['cell-phone']) ?>">
    <label for="notes">Notes:</label>
    <textarea name="notes" id="notes" ><?= htmlspecialchars($f['notes']) ?></textarea>
    <button name="add-employee" class="wide">Add Employee</button>
  </form>
  <?php

        }
    ?>
</main>
</body>
</html>