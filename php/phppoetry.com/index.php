<?php
  require 'includes/header.php';
  
  $query = "SELECT p.poem_id, p.title, p.date_approved, 
  c.category, u.username
          FROM poems p
          JOIN categories c ON c.category_id = p.category_id
          JOIN users u ON u.user_id = p.user_id
          WHERE p.date_approved IS NOT NULL
          ORDER BY p.date_approved DESC
          LIMIT 0, 3";
          
  try {
    $stmt = $db->prepare($query);
    $stmt->execute();
  } catch (PDOException $e) {
    logError($e, true);
  }
?>
<main>
  <h1>Latest Poems</h1>
  <table>
    <thead>
      <tr>
        <th>Poem</th>
        <th>Category</th>
        <th>Author</th>
        <th>Published</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($row = $stmt->fetch()) { 
          $approved = strtotime($row['date_approved']);
          $published = date('m/d/Y', $approved);
      ?>
        <tr>
          <td>
            <a href="poem.php?poem-id=<?= $row['poem_id'] ?>">
              <?= $row['title'] ?>
            </a>
          </td>
          <td><?= $row['category'] ?></td>
          <td><?= $row['username'] ?></td>
          <td><?= $published ?></td>
        </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4"><a href="poems.php">More Poems</a></td>
      </tr>
    </tfoot>
  </table>
</main>
<?php
  require 'includes/footer.php';
?>