<?php
  include('../config.php');
  session_start();
  session_unset($_SESSION['email']);
  session_unset($_SESSION["PHPSESSID"]);
  session_destroy();
  header('Location: index.php?msg=Successfully logged out!');
  exit();
?>
