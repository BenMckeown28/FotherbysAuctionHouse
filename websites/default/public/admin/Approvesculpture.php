<!-- Updates the selected sculpture and sets the status to approved based of the id selected in the previous page -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$update=$pdo->query('UPDATE sculptures SET status = "approved" WHERE idsculptures = "'.$id.'"  ');
header("location:sculptures.php");
?>
