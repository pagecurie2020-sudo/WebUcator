<?php
  $pathStart = '/Webucator/final-site/';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Assistant">
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" crossorigin="anonymous"
  href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
  integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU">
<link rel="stylesheet" href="<?= $pathStart ?>styles/normalize.css">
<link rel="stylesheet" href="<?= $pathStart ?>styles/styles.css">
<script src="scripts/scripts.js"></script>
<title>Page Not Found | The Poet Tree Club</title>
</head>
<body>
  <header>
    <nav id="main-nav">
      <!-- Bar icon for mobile menu -->
      <div id="mobile-menu-icon">
        <i class="fa fa-bars"></i>
      </div>
      <ul>
        <li><a href="<?= $pathStart ?>index.php">Home</a></li>
        <li><a href="<?= $pathStart ?>poems.php">Poems</a></li>
        <li><a href="<?= $pathStart ?>poem-submit.php">Submit Poem</a></li>
        <li><a href="<?= $pathStart ?>my-account.php">My Account</a></li>
        <li><a href="<?= $pathStart ?>contact.php">Contact us</a></li>
      </ul>
    </nav>
    <h1><a href="<?= $pathStart ?>index.php">The Poet Tree Club</a></h1>
    <h2>Set your poems free...</h2>
  </header>
  <main id="page-not-found">
    <h1>Page Not Found</h1>
    <article class="poem">
      I'm afraid you have wandered<br>
      Off of the tour<br>
      If there was once a page here<br>
      It's not here anymore
    </article>
  </main>
  <footer>
    <p>
      <span>Copyright &copy; <?= date('Y')?> The Poet Tree Club.</span>
      <a href="<?= $pathStart ?>logout.php">Log out</a>
      <a href="<?= $pathStart ?>admin/index.php">Admin</a>
      <a href="<?= $pathStart ?>about-us.php">About us</a>
    </p>
  </footer>
</body>
</html>
