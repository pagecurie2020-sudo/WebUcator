<?php
  $pageTitle = 'Edit Poem';
  require 'includes/header.php';

  if (!isset($_REQUEST['poem-id'])) {
    header("Location: index.php");
  }

  $poemId = $_REQUEST['poem-id'];
  if (!isPoemAuthor($poemId)) {
    header("Location: index.php");
  }

  $errors = [];
  $f['category'] = $_POST['cat'] ?? 0;
  $f['title'] = trim($_POST['title'] ?? '');
  $f['poem'] = trim($_POST['poem'] ?? '');

  if (!empty($_POST['update'])) {

    // Validate Form Entries
    if (!$f['title']) {
      $errors[] = 'You must enter a poem title.';
    }
    if (!$f['poem'] || strlen($f['poem']) < 10) {
      $errors[] = 'Your poem must be at least 10 characters.';
    }

    if (!$errors) {
      $dateApproved = 'null'; // For now

      // Update poem
      $qUpdate = "UPDATE poems
        SET title = :title,
          poem = :poem,
          category_id = :category_id,
          date_approved = $dateApproved
        WHERE poem_id = :poem_id";

      try {
        $stmtUpdate = $db->prepare($qUpdate);
        $stmtUpdate->bindParam(':title', $f['title']);
        $stmtUpdate->bindParam(':poem', $f['poem']);
        $stmtUpdate->bindParam(':category_id', $f['category']);
        $stmtUpdate->bindParam(':poem_id', $poemId);
        $poemUpdated = $stmtUpdate->execute();
      } catch (PDOException $e) {
        $errors[] = 'Update failed. Please try again.';
        logError($e);
      }
    }
  }

  $qPoem = "SELECT p.poem_id, p.title, p.poem, 
    p.date_submitted, p.date_approved,
    c.category_id, u.username
    FROM poems p
      JOIN users u ON u.user_id = p.user_id
      JOIN categories c ON c.category_id = p.category_id
    WHERE p.poem_id = ?"; // Pass SQL Param

  $qCategories = "SELECT c.category_id, c.category
    FROM categories c
    LEFT JOIN poems p ON c.category_id = p.category_id
    GROUP BY c.category_id
    ORDER BY c.category";

  try {
    $stmtPoem = $db->prepare($qPoem);
    $stmtPoem->execute([$poemId]);
    $row = $stmtPoem->fetch();
    $title = $row['title'];
    $poemCatId = $row['category_id'];
    $poem = $row['poem'];
    $authorUserName = $row['username'];
    $dateSubmitted = $row['date_submitted'];
    $dateApproved = $row['date_approved'];
    $approvedChecked = $dateApproved ? ' checked' : '';
  } catch (PDOException $e) {
    logError($e, true);
  }

  try {
    $stmtCategories = $db->prepare($qCategories);
    $stmtCategories->execute();
  } catch (PDOException $e) {
    logError($e, true);
  }
?>
<main id="poem-edit">
  <h1>
    <?= $pageTitle ?>: 
    <a href="poem.php?poem-id=<?= $poemId ?>"><?= $title ?></a>
  </h1>
  <div id="submission-status">
    Submitted on <?= date('m/d/Y', strtotime($dateSubmitted)) ?>
    at <?= date('g:iA', strtotime($dateSubmitted)) ?>
    by <?= $authorUserName ?>
    <?php
      if (isPoemAuthor($poemId)) {
        echo "<a href='poem-delete.php?poem-id=$poemId'>Delete</a>";
      }
    ?>
  </div>
  <div id="approval-status">
  <?php
    if (isPoemAuthor($poemId)) {
      if ($dateApproved) {
        echo 'Approved: ' . date('m/d/Y', strtotime($dateApproved));
      } else {
        echo 'Pending Approval';
      }
    }
  ?>
  </div>
  <?php

    if (!empty($poemUpdated)) {
      echo '<p class="success">Poem updated.</p>';
      echo '<p>We will review your updated poem soon.</p>';
    }

    if ($errors) {
      echo '<h3>Please correct the following errors:</h3>
      <ol class="error">';
      foreach ($errors as $error) {
        echo "<li>$error</li>";
      }
      echo '</ol>';
    }
  ?>
  <form method="post" action="poem-edit.php" novalidate>
    <input type="hidden" name="poem-id" value="<?= $poemId?>">
    <label for="title">Title*:</label>
    <input name="title" id="title"
      value="<?= $title ?>" required>
    <label for="cat">Category:</label>
    <select name="cat" id="cat">
      <?php
        while ($row = $stmtCategories->fetch()) {
          $category = $row['category'];
          $rowCatId = $row['category_id'];
          $selected = $poemCatId === $rowCatId ? 'selected' : '';
          echo "<option value='$rowCatId'$selected>
            $category
          </option>";
        }
      ?>
    </select>
    <label for="poem">Poem*:</label>
    <textarea id="poem" name="poem"><?= $poem ?></textarea>
    <button name="update" value="1" class="wide">Update Poem</button>
  </form>
</main>
<?php
  require 'includes/footer.php';
?>