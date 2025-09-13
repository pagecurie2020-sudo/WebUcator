<?php
  $pageTitle = 'Delete Poem';
  require 'includes/header.php';

  if (!isset($_REQUEST['poem-id'])) {
    header("Location: index.php");
  }

  $poemId = $_REQUEST['poem-id'];
  if (!isPoemAuthor($poemId)) {
    header("Location: index.php");
  }

  $confirmDelete = isset($_POST['poem-id']);
  $errors = [];

  if ($confirmDelete) {
    $qDelete = 'DELETE FROM poems WHERE poem_id = ?';
    try {
      $stmt = $db->prepare($qDelete);
      $stmt->execute( [$poemId] );
      $deleteResult = 1;
    } catch (PDOException $e) {
      logError($e);
      $deleteResult = 0;
    }
  } else {
    $qSelect = 'SELECT title FROM poems WHERE poem_id = ?';
    try {
      $stmt = $db->prepare($qSelect);
      $stmt->execute( [$poemId] );
      $row = $stmt->fetch();
      $poemTitle = $row['title'];
    } catch (PDOException $e) {
      logError( $e->getMessage(), true);
    }
  }
?>
<main id="poem-delete" class="narrow">
  <h1><?= $pageTitle ?></h1>

  <?php

    if (!empty($deleteResult)) {
      $deleteResultMsg = nl2br(POEM_DELETE_SUCCESS);
      $cls = 'success';
    } elseif (isset($deleteResult)) {
      logError("Failed to delete poem id $poemId using: $qDelete");
      $deleteResultMsg = nl2br(POEM_DELETE_FAIL);
      $cls = 'error';
    }

    if (isset($deleteResultMsg)) {
      // Output delete result
  ?>
    <article class="poem <?= $cls ?>">
      <?= $deleteResultMsg ?>
    </article>
  <?php
    } else {
      // Output delete form
  ?>
    <form method="post" action="poem-delete.php">
      <p>Are you sure you want to delete <em><?= $poemTitle ?></em>?</p>
      <button name="poem-id" value="<?=$poemId?>" class="wide">
        Confirm Delete
      </button>
    </form>
  <?php
    }
  ?>
</main>
<?php
  require 'includes/footer.php';
?>