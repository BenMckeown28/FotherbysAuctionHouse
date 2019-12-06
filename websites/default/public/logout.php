<?php
session_start();
$_SESSION['loggedin'] == false;
header('location:login.php');
session_destroy();
die();
  ?>
