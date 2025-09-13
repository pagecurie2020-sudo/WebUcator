<?php
  $pageTitle = 'Admin Poems';
  $pathStart = '../';
  require '../includes/header.php';

  if ( !isAdmin() ) {
    // How did you get here?
    header("Location: ../index.php");
  }

  $offset = $_GET['offset'] ?? 0;
  
  $order = $_GET['order'] ?? 'date_approved';
  $orderAllowed = ['date_approved',
                  'date_submitted',
                  'title',
                  'category',
                  'username'];
  if ( !in_array($order, $orderAllowed) ) {
    $order = 'date_approved';
  }

  $dirAllowed = ['asc', 'desc'];
  $dir = $_GET['dir'] ?? 'desc';
  if ( !in_array($dir, $dirAllowed) ) {
    $dir = 'asc';
  }

  $selectedCatId = $_GET['cat'] ?? 0; // category_id
  $selectedUserId = $_GET['user'] ?? 0; // user_id

  $qPoems = "SELECT p.poem_id, p.title, p.date_submitted, 
    p.date_approved, c.category, u.username
  FROM poems p
    JOIN categories c ON c.category_id = p.category_id
    JOIN users u ON u.user_id = p.user_id";

  $params = [];
  $whereConditions = [];
  if ( $selectedCatId ) {
    $whereConditions[] = "c.category_id = ?";
    $params[] = $selectedCatId;
  }

  if ( $selectedUserId ) {
    $whereConditions[] = "u.user_id = ?";
    $params[] = $selectedUserId;
  }

  if ( $whereConditions ) {
    $where = implode(' AND ', $whereConditions);
    $qPoems .= ' WHERE ' . $where;
  }

  $qPoems .= " ORDER BY $order $dir 
    LIMIT $offset, " . POEM_ROWS_TO_SHOW;
  
  try {
    $stmtPoems = $db->prepare($qPoems);
    $stmtPoems->execute($params);
  } catch (PDOException $e) {
    logError($e->getMessage(), true); // Redirect to error page
  }

  $qPoemCount = "SELECT COUNT(p.poem_id) AS num
  FROM poems p
    JOIN categories c ON c.category_id = p.category_id
    JOIN users u ON u.user_id = p.user_id";

  if ( $whereConditions ) {
    $where = implode(' AND ', $whereConditions);
    $qPoemCount .= ' WHERE ' . $where;
  }
  
  try {
    $stmtPoemCount = $db->prepare($qPoemCount);
    $stmtPoemCount->execute($params);
    $poemCount = $stmtPoemCount->fetch()['num'];
  } catch (PDOException $e) {
    logError($e->getMessage(), true); // Redirect to error page
  }

  $qCategories = "SELECT c.category_id, c.category,
    COUNT(p.poem_id) AS num_poems
  FROM categories c
    LEFT JOIN poems p ON c.category_id = p.category_id
  GROUP BY c.category_id
  ORDER BY c.category";
  
  try {
    $stmtCats = $db->prepare($qCategories);
    $stmtCats->execute();
  } catch (PDOException $e) {
    logError($e->getMessage(), true); // Redirect to error page
  }

  $qUsers = "SELECT u.user_id, u.username, 
    COUNT(p.poem_id) AS num_poems
  FROM users u
    LEFT JOIN poems p ON u.user_id = p.user_id
  GROUP BY u.user_id
  ORDER BY u.username";
  
  try {
    $stmtUsers = $db->prepare($qUsers);
    $stmtUsers->execute();
  } catch (PDOException $e) {
    logError($e->getMessage(), true); // Redirect to error page
  }

  $dirNext = ($dir === 'asc') ? 'desc' : 'asc';
  $prevOffset = max($offset - POEM_ROWS_TO_SHOW, 0);
  $nextOffset = $offset + POEM_ROWS_TO_SHOW;

  $href = "poems.php?cat=$selectedCatId&user=$selectedUserId&";
  $poemSort = $href . "dir=$dirNext&";
  $prev = $href . "dir=$dir&order=$order&offset=$prevOffset";
  $next = $href . "dir=$dir&order=$order&offset=$nextOffset";
?>
<main id="admin-poems" class="admin">
  <h1><?= $pageTitle ?></h1>
  <?php require 'includes/nav.php'; ?>
  <table>
    <caption>Total Poems: <?= $poemCount ?></caption>
    <thead>
      <tr>
        <th>
          <a href="<?= $poemSort ?>order=title">
            Title</a>
        </th>
        <th>
          <a href="<?= $poemSort ?>order=category">
            Category</a>
        </th>
        <th>
          <a href="<?= $poemSort ?>order=username">
            Username</a>
        </th>
        <th>
          <a href="<?= $poemSort ?>order=date_submitted">
            Submitted</a>
        </th>
        <th>
          <a href="<?= $poemSort ?>order=date_approved">
            Approved</a>
        </th>
    </tr>
    </thead>
    <tbody>
      <?php 
        if ( !$poemCount ) {
          echo '<tr>
            <td colspan="5">No results</td>
          </tr>';
        } else {
          while ($row = $stmtPoems->fetch()) {
            $cls = 'normal';
            if ($row['date_approved']) {
              $cls = 'normal';
            } else {
              $cls = 'pending-approval';
            }
            $dateSubmitted = date('m/d/Y', 
              strtotime($row['date_submitted']));
            if ( $row['date_approved'] ) {
              $dateApproved = date('m/d/Y', 
                strtotime($row['date_approved']));
            } else {
              $dateApproved = 'N/A';
            }
            echo '<tr class="' . $cls . '">
              <td>
                <a href="../poem.php?poem-id=' . $row['poem_id'] . '">' .
                $row['title'] . '</a>
              </td>
              <td>' . $row['category'] . '</td>
              <td>' . $row['username'] . '</td>
              <td>' . $dateSubmitted . '</td>
              <td>' . $dateApproved . '</td>
            </tr>';
          }
        }
      ?>
    </tbody>
    <tfoot class="pagination">
      <tr>
        <?php 
          if ($offset == 0) { // No ===. $offset is sometimes a string
            echo "<td class='disabled'>Previous</td>";
          } else {
            echo "<td><a href='$prev'>Previous</a></td>";
          }
        ?>
        <td colspan="3"></td>
        <?php 
          if ($nextOffset >= $poemCount) {
            echo "<td class='disabled'>Next</td>";
          } else {
            echo "<td><a href='$next'>Next</a></td>";
          }
        ?>
      </tr>
    </tfoot>
  </table>
  <h2>Filtering</h2>
  <form method="get" action="poems.php">
    <input type="hidden" name="order" value="<?= $order ?>">
    <input type="hidden" name="dir" value="<?= $dir ?>">
    <input type="hidden" name="offset" value="0">
    <label for="cat">Category:</label>
    <select name="cat" id="cat">
      <option value="0">All</option>
      <?php
        while ($row = $stmtCats->fetch()) {
          $category = $row['category'];
          $numPoems = $row['num_poems'];
          $categoryId = $row['category_id'];
          $disabled = $numPoems ? '' : ' disabled';
          $selected = $categoryId === $selectedCatId ? 'selected' : '';
          echo "<option value='$categoryId' $disabled $selected>
            $category ($numPoems)
          </option>";
        }
      ?>
    </select>
    <label for="user">Author:</label>
    <select name="user" id="user">
      <option value="0">All</option>
      <?php
        while ($row = $stmtUsers->fetch()) {
          $username = $row['username'];
          $userId = $row['user_id'];
          $numPoems = $row['num_poems'];
          $disabled = $numPoems ? '' : ' disabled';
          $selected = $userId === $selectedUserId ? 'selected' : '';
          echo "<option value='$userId' $disabled $selected>
            $username ($numPoems)
          </option>";
        }
      ?>
    </select>
    <button name="filter" class="wide">Filter</button>
  </form>

</main>
<?php
  require '../includes/footer.php';
?>