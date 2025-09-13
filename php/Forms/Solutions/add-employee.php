<?php
  ini_set('display_errors', '1');

  // Used to populate birth-month and hire-month fields
  $months = [
    'January', 'February', 'March', 'April', 'May', 'June', 'July',
    'August', 'September', 'October', 'November', 'December'
  ];

  // Used to populate courtesy-title field
  $courtesyTitles = [ 'Dr.', 'Mr.', 'Mrs.', 'Ms.' ];

  $f = [];

  // Trim and Assign Form Entries
  $f['first-name'] = trim($_POST['first-name'] ?? '');
  $f['last-name'] = trim($_POST['last-name'] ?? '');
  $f['email'] = trim($_POST['email'] ?? '');
  $f['title'] = trim($_POST['title'] ?? '');
  $f['courtesy-title'] = trim($_POST['courtesy-title'] ?? '');
  $f['birth-month'] = filter_input(INPUT_POST, 'birth-month',
    FILTER_VALIDATE_INT);
  $f['birth-day'] = filter_input(INPUT_POST, 'birth-day',
    FILTER_VALIDATE_INT);
  $f['birth-year'] = filter_input(INPUT_POST, 'birth-year',
    FILTER_VALIDATE_INT);
  $f['hire-month'] = filter_input(INPUT_POST, 'hire-month',
    FILTER_VALIDATE_INT);
  $f['hire-day'] = filter_input(INPUT_POST, 'hire-day',
    FILTER_VALIDATE_INT);
  $f['hire-year'] = filter_input(INPUT_POST, 'hire-year',
    FILTER_VALIDATE_INT);
  $f['cell-phone'] = trim($_POST['cell-phone'] ?? '');
  $f['notes'] = trim($_POST['notes'] ?? '');

  if (isset($_POST['add-employee'])) {
    $errors = [];

    if (!$f['email']) {
      $errors[] = 'Email is required.';
    } elseif (!filter_var($f['email'], FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Email is not valid.';
    }
  
    if (!$_POST['password-1']) {
      $errors[] = 'Password is required.';
    } elseif (strlen($_POST['password-1']) < 8) {
      $errors[] = 'Password must be at least 8 characters.';
    } elseif ($_POST['password-1'] !== $_POST['password-2']) {
      $errors[] = 'Passwords do not match.';
    }

    if (!$f['first-name']) {
      $errors[] = 'First name is required.';
    }

    if (!$f['last-name']) {
      $errors[] = 'Last name is required.';
    }

    if (!$f['title']) {
      $errors[] = 'Title is required.';
    }

    if (!$f['courtesy-title']) {
      $errors[] = 'Title of Courtesy is required.';
    }

    if (!$f['birth-day'] || !$f['birth-month'] || !$f['birth-year']) {
      $errors[] = 'A full birth date is required.';
    } elseif ( !checkdate($f['birth-month'],
                          $f['birth-day'],
                          $f['birth-year']) ) {
      $errors[] = 'The birth date must be a valid date.';
    }

    if (!$f['hire-day'] || !$f['hire-month'] || !$f['hire-year']) {
      $errors[] = 'A full hire date is required.';
    } elseif ( !checkdate($f['hire-month'],
                          $f['hire-day'],
                          $f['hire-year']) ) {
      $errors[] = 'The hire date must be a valid date.';
    }

    if (!$f['cell-phone']) {
      $errors[] = 'Cell phone is required.';
    }
  
    if (strlen($f['notes']) > 100) {
      $errors[] = 'Notes cannot be longer than 100 characters.';
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
    if (!empty($errors)) {
      // Show form errors
      echo '<h3>Please correct the following errors:</h3>
      <ol class="error">';
      foreach ($errors as $error) {
        echo "<li>$error</li>";
      }
      echo '</ol>';
    } elseif (isset($_POST['add-employee'])) {
      // We'd normally insert the data into a database here,
      // but we will just show the form data.
      echo '<h3>Form Data</h3>';
      echo '<ol>';
      echo '<li><strong>Name:</strong> ' . $f['courtesy-title'] .
            ' ' . $f['first-name'] . ' ' . $f['last-name'] . '</li>';
      echo '<li><strong>Title:</strong> ' . $f['title']. '</li>';
      echo '<li><strong>Cell phone:</strong> ' . 
            $f['cell-phone'] . '</li>';
      echo '<li><strong>Notes:</strong> ' . $f['notes']. '</li>';
      
      $birthDate = mktime(0, 0, 0, $f['birth-month'],
                          $f['birth-day'], $f['birth-year']);
      $sBirthDate = date("F j, Y", $birthDate); 
      echo "<li><strong>Born:</strong> $sBirthDate.</li>";

      $hireDate = mktime(0, 0, 0, $f['hire-month'], 
                        $f['hire-day'], $f['hire-year']);
      $sHireDate = date("F j, Y", $hireDate); 
      echo "<li><strong>Start Date:</strong> $sHireDate.</li>";
      echo '</ol>';
    }

    if (!empty($errors) || !isset($_POST['add-employee'])) {
      // Show form
  ?>
  <form method="post" action="add-employee.php" novalidate>
    <label for="first-name">First Name:</label>
    <input name="first-name" id="first-name" 
      value="<?= $f['first-name'] ?>">
    <label for="last-name">Last Name:</label>
    <input name="last-name" id="last-name" 
      value="<?= $f['last-name'] ?>">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" 
      value="<?= $f['email'] ?>">
    <fieldset>
      <legend>Password:</legend>
      <input type="password" placeholder="Password"
            name="password-1" id="password-1">
      <input type="password" placeholder="Repeat Password"
            name="password-2" id="password-2">
    </fieldset>
    <label for="title">Title:</label>
    <input name="title" id="title" value="<?= $f['title'] ?>">
    <fieldset>
      <legend>Title of Courtesy:</legend>
      <?php
        foreach ($courtesyTitles as $cTitle) {
          echo "<label>
          <input type='radio' name='courtesy-title' value='$cTitle'";
          if ($cTitle === $f['courtesy-title']) {
            echo ' checked';
          }
          echo ">$cTitle</label>";
        }
      ?>
    </fieldset>
    <fieldset>
      <legend>Birth date:</legend>
      <select name="birth-month" id="birth-month">
        <option value="0">--Select Month--</option>
        <?php
          for ($i=1; $i<=12; $i++) {
            echo "<option value='$i'";
            if ( $f['birth-month'] === $i) {
              echo " selected";
            }
            echo ">" . $months[$i-1] . "</option>";
          }
        ?>
      </select>
      <input name="birth-day" type="number" min="1" max="31"
        placeholder="day" value="<?= $f['birth-day'] ?>">
      <input name="birth-year" type="number"
        placeholder="year" value="<?= $f['birth-year'] ?>">
    </fieldset>
    <fieldset>
      <legend>Hire date:</legend>
      <select name="hire-month">
        <option value="0">--Select Month--</option>
        <?php
          for ($i=1; $i<=12; $i++) {
            echo "<option value='$i'";
            if ( $f['hire-month'] === $i) {
              echo " selected";
            }
            echo ">" . $months[$i-1] . "</option>";
          }
        ?>
      </select>
      <input name="hire-day" type="number" min="1" max="31"
        placeholder="day" value="<?= $f['hire-day'] ?>">
      <input name="hire-year" type="number"
        placeholder="year" value="<?= $f['hire-year'] ?>">
    </fieldset>
    <label for="cell-phone">Cell Phone:</label>
    <input type="tel" name="cell-phone" id="cell-phone"
        value="<?= $f['cell-phone'] ?>">
    <label for="notes">Notes:</label>
    <textarea name="notes" id="notes"><?= $f['notes'] ?></textarea>
    <button name="add-employee" class="wide">Add Employee</button>
  </form>
  <?php
    }
  ?>
</main>
</body>
</html>