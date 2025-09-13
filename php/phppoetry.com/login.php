<?php
  $pageTitle = 'Login';
  require 'includes/header.php';
  logout(); // In case a different user has logged in

  $dbPassPhrase = '';
  $username = trim($_POST['username'] ?? '');
  $passPhrase = $_POST['pass-phrase'] ?? '';

  if ($username && $passPhrase) {
    
    $qLogin = "SELECT pass_phrase, registration_confirmed, user_id
      FROM users
      WHERE username = ?";

    try {
      $stmt = $db->prepare($qLogin);
      $stmt->execute([$username]);
      
      if (!$row = $stmt->fetch()) {
        // username doesn't exist
        $loginFailed = true;
        $failureMessage = nl2br(POEM_LOGIN_FAILED);
      } elseif ( !$row['registration_confirmed']) {
        // user never confirmed registration
        $loginFailed = true;
        $failureMessage = nl2br(POEM_REGISTRATION_UNCONFIRMED);
      } elseif (password_verify($passPhrase, $row['pass_phrase'])) {
        // log user in and redirect to home page
        $_SESSION['user-id'] = $row['user_id'];

        if (!empty($_POST['remember-me'])) {
          // Set cookie for 30 days
          $interval = 30 * 24 * 60; // 30 days
          $token = generateToken();
          $qInsert = "INSERT INTO tokens
          (token, user_id, token_expires)
          VALUES ( '$token', ?, DATE_ADD(now(),
                    INTERVAL $interval MINUTE) )";

          try {
            $stmtInsert = $db->prepare($qInsert);
            $stmtInsert->execute( [$_SESSION['user-id']] );

            $expiration = time() + 60 * $interval;
            if (!setcookie('token', $token, $expiration)) {
              // Could not set cookie on browser. Fail silently.
              logError("Could not set cookie for $username.");
            }
          } catch (PDOException $e) {
            // Could not insert cookie token. Fail silently.
            logError($e); 
          }
        }
        header("Location: index.php");
      } else {
        // bad password
        $loginFailed = true;
        $failureMessage = nl2br(POEM_LOGIN_FAILED);
      }
    } catch (PDOException $e) {
      logError($e);
      $loginFailed = true;
      $failureMessage = nl2br(POEM_GENERIC_ERROR);
    }
  }
?>
<main class="narrow">
  <h1><?= $pageTitle ?></h1>
  <?php
    if (isset($loginFailed)) {
      echo "<article class='poem error'>$failureMessage</article>";
    }

    if (isset($_GET['just-registered'])) {
      echo '<article class="poem success">' .
          nl2br(POEM_REGISTRATION_SUCCESS) .
        '</article>';
    } elseif (isset($_GET['no-access'])) {
      echo '<article class="poem success">' .
          nl2br(POEM_ACCESS_DENIED) .
        '</article>';
    } else {
      echo '<p>Need an account? 
        <a href="register.php">Register</a></p>';
    }
  ?>
  <!-- novalidate set so that PHP validation can be tested -->
  <form method="post" action="login.php" novalidate>
    <label for="username">Username:</label>
    <input name="username" id="username" required
      value="<?= $username ?>"> 
    <label for="pass-phrase">Pass Phrase:</label>
    <input type="password" name="pass-phrase" id="pass-phrase"
      required>
    <input type="checkbox" name="remember-me" id="remember-me">
    <label for="remember-me" class="inline">Remember me</label>
    <button>Login</button>
  </form>
  <p class="clear">
    <a href="pass-phrase-reset.php">Forgot your pass phrase?</a>
  </p>
</main>
<?php
  require 'includes/footer.php';
?>