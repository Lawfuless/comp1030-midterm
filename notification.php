<?php

  require_once('./_config.php');

  /*
    OBJECTIVE:
      1: Check the session for a 'notification' key and if there's a value:
        a: If there's a value display the message.
        b: If there isn't, redirect back to the home page (index.php).
      2: Include the header and footer around the jumbotron. Careful on this one
      as it could cause issues with session. Order of operations is important here.
  */

  session_start();

  // Redirect a user if there is no notification
  if (empty($_SESSION['notification'])) {
    header("Location: ".BASE_PATH."/index.php");
    exit;
  }

  include_once('_partials/_header.php');
?>

<div class="jumbotron alert alert-info">
  <h2><?= $_SESSION['notification'] ?></h2>
</div>

<?php
  include_once('_partials/_footer.php');

  // Clear the notification
  unset($_SESSION['notification']);

?>