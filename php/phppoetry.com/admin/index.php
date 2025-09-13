<?php
  $pageTitle = 'Admin Home';
  $pathStart = '../';
  require '../includes/header.php';

  if ( !isAdmin() ) {
    // How did you get here?
    header("Location: ../index.php");
  }
?>
<main id="admin-home" class="admin narrow">
  <h1><?= $pageTitle ?></h1>
  <?php require 'includes/nav.php'; ?>
  
  <article class="poem">
    Being an admin<br>
    Isn't for nothin'<br>
    You can update and delete<br>
    With the click of a button<br><br>
    So, be careful!
  </article>
</main>
<?php
  require '../includes/footer.php';
?>