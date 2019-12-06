<?php
require "config.php";
require 'headers/publicheader.php';
   $auction= $pdo->query('SELECT * FROM Auction WHERE idAuction= '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;


/* Shows all items which are related to the auction which was selected */

$carvings = $pdo->query('SELECT * FROM carvings WHERE Auction = "'.$auction['Auction_Name'].'" AND status = "Approved" ');
$drawings = $pdo->query('SELECT * FROM Drawings WHERE Auction = "'.$auction['Auction_Name'].'" AND status = "Approved" ');
$Paintings = $pdo->query('SELECT * FROM Paintings WHERE Auction = "'.$auction['Auction_Name'].'" AND status = "Approved" ');
$Photographic_Images = $pdo->query('SELECT * FROM Photographic_Images WHERE Auction = "'.$auction['Auction_Name'].'" AND status = "Approved" ');
$sculptures = $pdo->query('SELECT * FROM sculptures WHERE Auction = "'.$auction['Auction_Name'].'" AND status = "Approved" ');


echo'<h2>'.$auction['Auction_Name'].'-'.$auction['Date_Of_Auction'].'-'.$auction['Auction_Time'].'</h2>';

/* Items are all displayed within a grid layout */
echo '<div class="grid">';

foreach ($carvings as $row){

echo '<div class="cell">';
  echo '<a href="auctionlotshowcar.php?id='.$row['idcarvings'].'">';
echo '<ul>';
echo '<li>Carvings</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].$row['idcarvings'].'</h3></li>';
echo '<li>Artist:'.' '.$row['name_of_artist'].'</li>';
echo '<li>Year Work Produced:'.' '.$row['year_work_produced'].'</li>';
echo '<li>Estimated Price: £'.' '.$row['estimated_price'].'</li>';
echo '</ul>';
echo '</a>';
echo '<ul>
<div class="placehold">
  Placeholder
</div>
</ul>';

echo '</div>';


}
foreach ($drawings as $row){
echo '<div class="cell2">';
  echo '<a href="auctionlotshowdraw.php?id='.$row['idDrawings'].'">';
echo '<ul>';
echo '<li>Drawings</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].$row['idDrawings'].'</h3></li>';
echo '<li>Artist:'.' '.$row['Name_of_artist'].'</li>';
echo '<li>Year Work Produced:'.' '.$row['Year_work_produced'].'</li>';
echo '<li>Estimated Price:  £'.' '.$row['estimated_price'].'</li>';
echo '</ul>';
echo '</a>';
echo '<ul>
<div class="placehold">
  Placeholder
</div>
</ul>';
echo '</div>';

}

foreach ($Paintings as $row){
echo '<div class="cell3">';
  echo '<a href="auctionlotshowpaint.php?id='.$row['idPaintings'].'">';
echo '<ul>';
echo '<li>Paintings</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].$row['idPaintings'].'</h3></li>';
echo '<li>Artist:'.' '.$row['Name_of_artist'].'</li>';
echo '<li>Year Work Produced:'.' '.$row['year_work_produced'].'</li>';
echo '<li>Estimated Price:  £'.' '.$row['estimated_price'].'</li>';
echo '</ul>';
echo '</a>';
echo '<ul>
<div class="placehold">
  Placeholder
</div>
</ul>';
echo '</div>';

}

foreach ($Photographic_Images as $row){
echo '<div class="cell4">';
  echo '<a href="auctionlotshowphoto.php?id='.$row['idPhotographic_Images'].'">';
echo '<ul>';
echo '<li>Photographic Images</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].$row['idPhotographic_Images'].'</h3></li>';
echo '<li>Artist:'.' '.$row['name_of_artist'].'</li>';
echo '<li>Year Work Produced:'.' '.$row['year_work_produced'].'</li>';
echo '<li>Estimated Price:  £'.' '.$row['estimated_price'].'</li>';
echo '</ul>';
echo '</a>';
echo '<ul>
<div class="placehold">
  Placeholder
</div>
</ul>';
echo '</div>';

}

foreach ($sculptures as $row){
echo '<div class="cell5">';
  echo '<a href="auctionlotshowsculp.php?id='.$row['idsculptures'].'">';
echo '<ul>';
echo '<li>Sculptures</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].$row['idsculptures'].'</h3></li>';
echo '<li>Artist:'.' '.$row['name_of_artist'].'</li>';
echo '<li>Year Work Produced:'.' '.$row['year_of_work'].'</li>';
echo '<li>Estimated Price:  £'.' '.$row['estimated_price'].'</li>';
echo '</ul>';
echo '</a>';
echo '<ul>
<div class="placehold">
  Placeholder
</div>
</ul>';
echo '</div>';

}




echo '</div>';

?>
