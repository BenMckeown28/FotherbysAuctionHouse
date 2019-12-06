<!-- Removes the record from the database and all its commision bids which are related to it -->
<?php
session_start();
require '../config.php';

$id = $_GET['id'];

$painting=$pdo->query('SELECT * FROM Paintings WHERE idPaintings = "'.$id.'"');

foreach($painting as $row){

$lot=$row['lotnumber'].$row['idPaintings'];

$delete=$pdo->query('DELETE FROM commision_bids WHERE lotnumber = "'.$lot.'"');

}

$update=$pdo->query('DELETE FROM Paintings WHERE idPaintings = "'.$id.'"  ');




header("location:paintings.php");
?>
