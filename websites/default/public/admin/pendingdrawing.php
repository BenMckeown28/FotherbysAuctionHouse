<!-- Update the drawings record which is selected and set the status to pending -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$update=$pdo->query('UPDATE Drawings SET status = "pending" WHERE idDrawings = "'.$id.'"  ');
header("location:Drawings.php");

?>
