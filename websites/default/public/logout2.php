<?php
session_start();
$_SESSION['loggedin2'] == false;
header('location:index.php');
session_destroy();
die();
  ?>
