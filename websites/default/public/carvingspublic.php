<?php
require 'config.php';
require 'headers/publicheader.php';
/* selects all the records from carvings where the status is set to approved */
$sculptures = $pdo->query('SELECT * FROM carvings WHERE status = "Approved" ');
echo '<h2>Carvings</h2>';
echo '<div class="grid">';

foreach ($sculptures as $row){

echo '<div class="cell">';
  echo '<a href="auctionlotshowcar.php?id='.$row['idcarvings'].'">';
echo '<ul>';
echo '<li>Carvings</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].$row['idcarvings'].'</h3></li>';
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
