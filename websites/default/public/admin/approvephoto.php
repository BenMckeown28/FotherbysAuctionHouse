<!-- Updates the selected photo and sets the status to approved based of the id selected in the previous page -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$update=$pdo->query('UPDATE Photographic_Images SET status = "approved" WHERE idPhotographic_Images = "'.$id.'"  ');
header("location:photos.php");
?>
