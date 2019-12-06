<?php
require 'config.php';
require 'headers/publicheader.php';
echo '<h2>Auctions</h2>';


/* Auctions will only be shown on the catalogue where the date is above the systems date which the user is running it from */

$auctions=$pdo->query('SELECT * FROM Auction WHERE Date_Of_Auction > sysdate() ');

foreach ($auctions as $row){
  echo '<a href="auctionshow.php?id='.$row['idAuction'].'">';
echo '<div class="auctions">';
echo '<div class="auctionsshow">';
echo '<li><h3>'.$row['Auction_Name'].'</h3></li> <br />';
echo '<li>'.$row['Description'].'</li><br />';
echo '<li>Date of Auction:'.$row['Date_Of_Auction'].'</li><br />';
echo '<li>Auction Time:'.$row['Auction_Time'].'</li><br />';
echo '</div>';
echo '</a>';
echo '</div>';
}




?>
</div>
