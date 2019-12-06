<!-- Update the sculptures record which is selected and set the status to pending -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$update=$pdo->query('UPDATE sculptures SET status = "pending" WHERE idsculptures = "'.$id.'"  ');
header("location:sculptures.php");

?>
