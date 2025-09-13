<?php
  $pathStart = '../';
  $pageTitle = 'Admin: Edit User';
  require '../includes/header.php';

  if ( !isAdmin() ) {
    // How did you get here?
    header("Location: ../index.php");
  }

  $errors = [];
  $userId = $_REQUEST['user-id'];

  if ( !empty($_POST['update']) ) {
    // Trim Form Entries
    $trimmedPOST = array_map('trim', $_POST);

    // Sanitize Form Entries
    $firstName = filter_var($trimmedPOST['first-name'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($trimmedPOST['last-name'], FILTER_SANITIZE_STRING);
    $email = filter_var($trimmedPOST['email'], FILTER_SANITIZE_EMAIL);
    $username = filter_var($trimmedPOST['username'], FILTER_SANITIZE_STRING);
    $userId = filter_var($trimmedPOST['user-id'],
      FILTER_SANITIZE_NUMBER_INT);
    $isAdmin = isset($_POST['is-admin']) ? 1 : 0;
    $delProfilePic = isset($_POST['del-prof-pic']) ? 1 : 0;

    // Validate Form Entries
    if ( !$firstName ) {
      $errors[] = 'You must enter a first name.';
    }
    if ( !$lastName ) {
      $errors[] = 'You must enter a last name.';
    }
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
      $errors[] = 'You must enter a valid email.';
    }
    if ( !$username || strlen($username) < 8 ) {
      $errors[] = 'The username must be at least 8 characters.';
    }

    // Check if username exists if changing username
    $usernameCheck = "SELECT user_id
      FROM users
      WHERE username = ? AND user_id != ?";

    try {
      $stmt = $db->prepare($usernameCheck);
      $stmt->execute( [$username, $userId] );
    } catch (PDOException $e) {
      logError($e->getMessage());
      $errors[] = nl2br(POEM_GENERIC_ERROR);
    }

    if ( $stmt->rowCount() ) {
      $errors[] = 'That username is already taken.<br>
        Please try a different one.';
    }

    // Check if email exists
    $emailCheck = "SELECT user_id
      FROM users
      WHERE email = ? AND user_id != ?";

    try {
      $stmt = $db->prepare($emailCheck);
      $stmt->execute( [$email, $userId] );
    } catch (PDOException $e) {
      logError($e->getMessage());
      $errors[] = nl2br(POEM_GENERIC_ERROR);
    }

    if ( $stmt->rowCount() ) {
      $errors[] = 'Another account uses that email address.';
    }

    // Check if uploading profile picture
    $pic = $_FILES['profile-pic'] ?? null;
    if ($pic['error'] === UPLOAD_ERR_NO_FILE) {
      // File intentionally not uploaded
      $pic = null;
    }
    if (!$errors) {
      if ( !$delProfilePic && $pic ) {
        // Try to upload pic
        if ( !$picFileName = uploadProfilePic( $pic ) ) {
          $errors[] = 'Could not upload profile picture. It must
            be a jpg or png and cannot be larger than 3 MB.';
        }
      }

      if (!$errors) {
        // Update user
        $qUpdate = "UPDATE users
          SET first_name  = ?,
              last_name   = ?,
              email       = ?,
              username    = ?,
              is_admin    = ?";
        
        $params = [$firstName, $lastName, $email, $username, $isAdmin];

        if ( !empty($picFileName) ) {
          $qUpdate .= ", profile_pic = ?";
          $params[] = $picFileName;
        } elseif ( $delProfilePic ) {
          $qUpdate .= ", profile_pic = ?";
          $params[] = null;
        }
        $qUpdate .= " WHERE user_id = ?";
        $params[] = $userId;

        try {
          $stmtUpdate = $db->prepare( $qUpdate );
          $stmtUpdate->execute( $params );
          if ( $stmtUpdate->execute() ) {
            $accountUpdated = true;
          } else {
            $errors[] = 'Registration failed. Please try again.';
            logError($stmtUpdate->errorInfo()); 
          }
        } catch (PDOException $e) {
          $errors[] = 'Update failed. Please try again.';
          logError($e->getMessage());
        }

      }
    }
  }
  $selUser = "SELECT first_name, last_name, email, 
    username, profile_pic, is_admin
    FROM users
    WHERE user_id = ?";

  try {
    $stmt = $db->prepare($selUser);
    $stmt->execute( [$userId] );
    $row = $stmt->fetch();
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];
    $email = $row['email'];
    $username = $row['username'];
    $isAdminChecked = $row['is_admin'] ? ' checked' : '';
    $pathToProfilePic = POEM_PROFILE_PIC_DIR . $row['profile_pic'];
    $pathToProfilePicFS = POEM_PROFILE_PIC_DIR_FILE_SYSTEM . $row['profile_pic'];
    if ( !empty($delProfilePic) && is_file($pathToProfilePicFS) ) {
      if ( !unlink($pathToProfilePicFS) ) {
        $errors[] = 'Could not delete profile picture.';
      }
    }
  } catch (PDOException $e) {
    $errors[] = nl2br(POEM_GENERIC_ERROR);
    logError($e->getMessage());
  }
?>
<main class="narrow">
  <h1><?= $pageTitle ?></h1>
  <?php
    if ( $errors ) {
      echo '<h3>Please correct the following errors:</h3>
      <ol class="error">';
      foreach ($errors as $error) {
        echo "<li>$error</li>";
      }
      echo '</ol>';
    }

    if ( !empty($accountUpdated) ) {
      echo '<h3 class="success">The account has been updated</h3>';
    }
  ?>
  <!-- novalidate set so that PHP validation can be tested -->
  <form method="post" action="user.php" novalidate
    enctype="multipart/form-data">
    <input type="hidden" name="user-id" value="<?= $userId ?>">
    <label for="first-name">First Name*:</label>
    <input name="first-name" id="first-name" 
      value="<?= $firstName ?>" required>
    <label for="last-name">Last Name*:</label>
    <input name="last-name" id="last-name" 
      value="<?= $lastName ?>" required> 
    <label for="email">Email*:</label>
    <input type="email" name="email" id="email" 
      value="<?= $email ?>" required> 
    <label for="username">Username*:</label>
    <input name="username" id="username" 
      value="<?= $username ?>" required minlength="8"> 
    <label for="profile-pic">Profile Picture:</label>
    <?php if (is_file($pathToProfilePicFS)) { ?>
      <img src="<?=$pathToProfilePic?>" alt="Profile Picture">
      <input type="checkbox" name="del-prof-pic" id="del-prof-pic">
      <label for="del-prof-pic" class="inline">
        Delete Profile Picture</label>
    <?php } ?>
    <p><em>For best results, choose a 200px by 200px image.</em></p>
    <input type="file" name="profile-pic" id="profile-pic"
      accept=".jpg, .jpeg, .png">
    <input type="checkbox" name="is-admin" id="is-admin"
        <?= $isAdminChecked?>>
      <label for="is-admin" class="inline">Is Administrator</label>
    <button name="update" value="1">Update</button>
  </form>
</main>
<?php
  require '../includes/footer.php';
?>