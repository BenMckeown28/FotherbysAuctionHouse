
<!-- Removes the record from the database and all its commision bids which are related to it -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];


$painting=$pdo->query('SELECT * FROM Drawings WHERE idDrawings = "'.$id.'"');

foreach($painting as $row){

$lot=$row['lotnumber'].$row['idDrawings'];

$delete=$pdo->query('DELETE FROM commision_bids WHERE lotnumber = "'.$lot.'"');

}


$update=$pdo->query('DELETE FROM Drawings WHERE idDrawings = "'.$id.'"  ');
header("location:approveddrawings.php");
?>
