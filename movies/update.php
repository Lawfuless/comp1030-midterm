<?php

  require_once('../_config.php');

    /*
    OBJECTIVE:
      1: Connect to the database and update the values from the passed form
      data (you must include the _connect.php and use the connect function).
      2: Set a session variable called 'notification' with a success message (if the update was successful)
      or an error message (if it failed).
      3: Redirect to notification.php.
  */
  require_once('_utilities/_connect.php');
  $conn = connect();
  var_dump($_POST);
  $sql = "UPDATE movies SET
            title = '{$_POST['title']}',
            genre = '{$_POST['genre']}',
            rating = '{$_POST['rating']}'
          WHERE id = {$_POST['id']}";
  echo $sql;
  $res = mysqli_query($conn, $sql);
  session_start();

  if ($res) {
    $_SESSION['notification'] = "The movie was updated successfully.";
  } else {
    $_SESSION['notification'] = "There was an error updating the movie: " . mysqli_error($conn);
  }
  header("Location: ../notification.php");
  die;

?>