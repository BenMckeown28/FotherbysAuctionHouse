<!-- Update the photos record which is selected and set the status to pending -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$update=$pdo->query('UPDATE Photographic_Images SET status = "pending" WHERE idPhotographic_Images = "'.$id.'"  ');
header("location:photos.php");

?>
