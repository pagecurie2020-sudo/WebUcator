<?php
  if (!isset($_GET['token'])) {
    // How did you get here?
    header("Location: index.php");
  }

  $pageTitle = 'Registration Confirmation';
  require 'includes/header.php';
  logout(); // In case a different user has logged in

  $token = $_GET['token'];
?>

<?php
  $qUpdate = "UPDATE users
  SET registration_confirmed = 1
  WHERE user_id = (SELECT user_id
    FROM tokens
    WHERE token = ?
    AND token_expires > now() );";

  try {
    $stmtUpdate = $db->prepare($qUpdate);
    $stmtUpdate->execute( [$token] );

    if ($stmtUpdate->rowCount()) {
      // Redirect user to login page
      header("Location: login.php?just-registered=1");
    } else {
      logError("No rows were updated. Token might be invalid or expired.");
    }
  } catch (PDOException $e) {
    logError($e);
  }
?>
<!-- Won't get here unless something went wrong -->
<main class="narrow">
  <h1><?= $pageTitle ?></h1>
  <article class='poem error'>
    <?= nl2br(POEM_INVALID_TOKEN_REGISTRATION) ?>
  </article>
</main>
<?php
  require 'includes/footer.php';
?>
