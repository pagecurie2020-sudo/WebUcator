<?php
  $pageTitle = 'Admin Users';
  $pathStart = '../';
  require '../includes/header.php';

  if ( !isAdmin() ) {
    // How did you get here?
    header("Location: ../index.php");
  }

  $offset = $_GET['offset'] ?? 0;
  
  $order = $_GET['order'] ?? 'date_registered';
  $orderAllowed = ['date_registered',
                  'first_name',
                  'last_name',
                  'username',
                  'num_poems'];
  if ( !in_array($order, $orderAllowed) ) {
    $order = 'date_registered';
  }

  $dirAllowed = ['asc', 'desc'];
  $dir = $_GET['dir'] ?? 'desc';
  if ( !in_array($dir, $dirAllowed) ) {
    $dir = 'asc';
  }

  $qUsers = "SELECT u.user_id, u.username, u.first_name, u.last_name,
    u.email, u.date_registered, u.registration_confirmed,
    COUNT(p.poem_id) AS num_poems
  FROM users u
    LEFT JOIN poems p ON u.user_id = p.user_id
  GROUP BY u.user_id, u.username, u.first_name, u.last_name,
    u.email, u.date_registered, u.registration_confirmed
  ORDER BY $order $dir 
  LIMIT $offset, " . POEM_ROWS_TO_SHOW; 
  
  try {
    $stmtUsers = $db->prepare($qUsers);
    $stmtUsers->execute();
    $userCount = $stmtUsers->rowCount();
  } catch (PDOException $e) {
    logError($e->getMessage(), true); // Redirect to error page
  }

  $qUserCount = "SELECT COUNT(*) AS num
    FROM users";
  
  try {
    $stmtUserCount = $db->prepare($qUserCount);
    $stmtUserCount->execute();
    $userCount = $stmtUserCount->fetch()['num'];
  } catch (PDOException $e) {
    logError($e->getMessage(), true); // Redirect to error page
  }

  $dirNext = ($dir === 'asc') ? 'desc' : 'asc';
  $userSort = "users.php?dir=$dirNext&offset=0&";
  
  $prevOffset = max($offset - POEM_ROWS_TO_SHOW, 0);
  $prev = "users.php?dir=$dir&order=$order&offset=" . $prevOffset;
  
  $nextOffset = $offset + POEM_ROWS_TO_SHOW;
  $next = "users.php?dir=$dir&order=$order&offset=" . $nextOffset;
?>
<main id="admin-users" class="admin">
  <h1><?= $pageTitle ?></h1>
  <?php require 'includes/nav.php'; ?>
  <table>
    <caption>Total Users: <?= $userCount ?></caption>
    <thead>
      <tr>
        <th>
          <a href="<?= $userSort ?>order=last_name,first_name">
            Name</a>
        </th>
        <th>
          <a href="<?= $userSort ?>order=username">
            Username</a>
        </th>
        <th>
          <a href="<?= $userSort ?>order=num_poems">
            Poems</a>
        </th>
        <th>
          <a href="<?= $userSort ?>order=date_registered">
            Registered</a>
        </th>
    </tr>
    </thead>
    <tbody>
      <?php 
        if ( !$userCount ) {
          echo '<tr>
            <td colspan="4">No results</td>
          </tr>';
        } else {
          while ($row = $stmtUsers->fetch()) {
            $cls = 'normal';
            if ($row['registration_confirmed']) {
              $cls = 'confirmed';
            } else {
              $cls = 'unconfirmed';
            }
            $dateRegistered = date('m/d/Y', 
              strtotime($row['date_registered']));
            echo '<tr class="' . $cls . '">
              <td>
                <a href="user.php?user-id=' . $row['user_id'] . '">' .
                $row['first_name'] . ' ' . $row['last_name'] . '</a>
              </td>
              <td>' . $row['username'] . '</td>
              <td>' . $row['num_poems'] . '</td>
              <td>' . $dateRegistered . '</td>
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
        <td colspan="2"></td>
        <?php 
          if ($nextOffset >= $userCount) {
            echo "<td class='disabled'>Next</td>";
          } else {
            echo "<td><a href='$next'>Next</a></td>";
          }
        ?>
      </tr>
    </tfoot>
  </table>

</main>
<?php
  require '../includes/footer.php';
?>