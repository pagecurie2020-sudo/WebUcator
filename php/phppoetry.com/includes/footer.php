<footer>
  <span>Copyright &copy; 2024 The Poet Tree Club.</span>
  <nav>
    <?php
      if ($currentUserId) {
        echo '<a href="logout.php">Log out</a>';
      }
      if ( isAdmin() ) {
        echo '<a href="' . $pathStart . 'admin/index.php">Admin</a>';
      }
    ?>
    <a href="<?= $pathStart ?>about-us.php">About us</a>
  </nav>
</footer>
</body>
</html>