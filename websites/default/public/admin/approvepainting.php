<!-- Updates the selected painting and sets the status to approved based of the id selected in the previous page -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$update=$pdo->query('UPDATE Paintings SET status = "approved" WHERE idPaintings = "'.$id.'"  ');
header("location:paintings.php");
?>
