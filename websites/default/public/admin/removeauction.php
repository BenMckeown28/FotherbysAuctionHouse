<!-- Removes the auction from the database and sets all the items to become unassigned, items would then not be shown on the catalogue or pending/approved tables and instead will be placed within the unassigned table -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$auction=$pdo->query('SELECT * FROM Auction WHERE idAuction ="'.$id.'"');
foreach ($auction as $row){
$pending1=$pdo->query('UPDATE carvings SET Auction = "" AND status = "unassigned" WHERE Auction = "Test"');
$pending2=$pdo->query('UPDATE Drawings SET Auction = "" AND status = "unassigned" WHERE Auction = "'.$row['Auction_Name'].'"');
$pending3=$pdo->query('UPDATE Paintings SET Auction = "" AND status = "unassigned" WHERE Auction = "'.$row['Auction_Name'].'"');
$pending4=$pdo->query('UPDATE Photographic_Images SET Auction = "" AND status = "unassigned" WHERE Auction = "'.$row['Auction_Name'].'"');
$pending5=$pdo->query('UPDATE sculptures SET Auction = "" AND status = "unassigned" WHERE Auction = "'.$row['Auction_Name'].'"');
}

$update=$pdo->query('DELETE FROM Auction WHERE idAuction = "'.$id.'"  ');
header("location:auctions.php");
?>
