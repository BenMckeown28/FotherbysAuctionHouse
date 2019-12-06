<?php
require 'config.php';
require 'headers/publicheader.php';
/* Selects all the records from photos where the status is approved*/
$sculptures = $pdo->query('SELECT * FROM Photographic_Images WHERE status = "Approved" ');
echo '<h2>Photos</h2>';
echo '<div class="grid">';
foreach ($sculptures as $row){
echo '<div class="cell4">';
  echo '<a href="auctionlotshowphoto.php?id='.$row['idPhotographic_Images'].'">';
echo '<ul>';
echo '<li>Photographic Images</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].$row['idPhotographic_Images'].'</h3></li>';
echo '<li>Artist:'.' '.$row['name_of_artist'].'</li>';
echo '<li>Year Work Produced:'.' '.$row['year_work_produced'].'</li>';
echo '<li>Estimated Price:'.' '.$row['estimated_price'].'</li>';
echo '<li>Auction: '.' '.$row['Auction'].'</li>';
echo '</ul>';
echo '</a>';
echo '<ul>
<div class="placehold">
  Placeholder
</div>
</ul>';
echo '</div>';

}

?>
</div>
