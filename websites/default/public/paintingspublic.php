<?php
require 'config.php';
require 'headers/publicheader.php';


/* Selects all the records from paintings where the status is approved*/

$sculptures = $pdo->query('SELECT * FROM Paintings WHERE status = "Approved" ');
echo '<h2>Paintings</h2>
';
echo '<div class="grid">';
foreach ($sculptures as $row){
echo '<div class="cell3">';
  echo '<a href="auctionlotshowpaint.php?id='.$row['idPaintings'].'">';
echo '<ul>';
echo '<li>Paintings</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].$row['idPaintings'].'</h3></li>';
echo '<li>Artist:'.' '.$row['Name_of_artist'].'</li>';
echo '<li>Year Work Produced:'.' '.$row['year_work_produced'].'</li>';
echo '<li>Estimated Price: £'.' '.$row['estimated_price'].'</li>';
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
