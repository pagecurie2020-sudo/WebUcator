<?php
  ini_set('display_errors', '1');

  // Used to populate birth-month and hire-month fields
  $months = [
    'January', 'February', 'March', 'April', 'May', 'June', 'July',
    'August', 'September', 'October', 'November', 'December'
  ];

  // Used to populate courtesy-title field
  $courtesyTitles = [ 'Dr.', 'Mr.', 'Mrs.', 'Ms.' ];
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
  <form method="post" action="add-employee.php" novalidate>
    <label for="first-name">First Name:</label>
    <input name="first-name" id="first-name">
    <label for="last-name">Last Name:</label>
    <input name="last-name" id="last-name">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <fieldset>
      <legend>Password:</legend>
      <input type="password" placeholder="Password"
            name="password-1" id="password-1">
      <input type="password" placeholder="Repeat Password"
            name="password-2" id="password-2">
    </fieldset>
    <label for="title">Title:</label>
    <input name="title" id="title">
    <fieldset>
      <legend>Title of Courtesy:</legend>
      <?php
        foreach ($courtesyTitles as $cTitle) {
          echo "<label>
          <input type='radio' name='courtesy-title' value='$cTitle'>
          $cTitle</label>";
        }
      ?>
    </fieldset>
    <fieldset>
      <legend>Birth date:</legend>
      <select name="birth-month" id="birth-month">
        <option value="0">--Select Month--</option>
        <?php
          for ($i=1; $i<=12; $i++) {
            echo "<option value='$i'>" . $months[$i-1] . "</option>";
          }
        ?>
      </select>
      <input name="birth-day" type="number" min="1" max="31"
        placeholder="day">
      <input name="birth-year" type="number" placeholder="year">
    </fieldset>
    <fieldset>
      <legend>Hire date:</legend>
      <select name="hire-month">
        <option value="0">--Select Month--</option>
        <?php
          for ($i=1; $i<=12; $i++) {
            echo "<option value='$i'>" . $months[$i-1] . "</option>";
          }
        ?>
      </select>
      <input name="hire-day" type="number" min="1" max="31"
        placeholder="day">
      <input name="hire-year" type="number" placeholder="year">
    </fieldset>
    <label for="cell-phone">Cell Phone:</label>
    <input type="tel" name="cell-phone" id="cell-phone">
    <label for="notes">Notes:</label>
    <textarea name="notes" id="notes"></textarea>
    <button name="add-employee" class="wide">Add Employee</button>
  </form>
</main>
</body>
</html>