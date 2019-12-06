<!-- Update the paintings record which is selected and set the status to pending -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$update=$pdo->query('UPDATE Paintings SET status = "pending" WHERE idPaintings = "'.$id.'"  ');
header("location:Paintings.php");

?>
