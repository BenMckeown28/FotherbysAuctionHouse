<?php
require 'config.php';
require 'headers/publicheader.php';

/* Selects all the data from the drawings table where the status is set to approved*/

$sculptures = $pdo->query('SELECT * FROM Drawings WHERE status = "Approved" ');
echo '<h2>Drawings</h2>


';
echo '<div class="grid">';
foreach ($sculptures as $row){
echo '<div class="cell2">';
  echo '<a href="auctionlotshowdraw.php?id='.$row['idDrawings'].'">';
echo '<ul>';
echo '<li>Drawings</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].$row['idDrawings'].'</h3></li>';
echo '<li>Artist:'.' '.$row['Name_of_artist'].'</li>';
echo '<li>Year Work Produced:'.' '.$row['Year_work_produced'].'</li>';
echo '<li>Estimated Price: £'.' '.$row['estimated_price'].'</li>';
echo '<li>Auction:'.' '.$row['Auction'].'</li>';
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
