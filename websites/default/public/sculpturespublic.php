<?php
require 'config.php';
require 'headers/publicheader.php';

/*Shows items from sculptures where the stauts is set to approved*/
$sculptures = $pdo->query('SELECT * FROM sculptures WHERE status = "Approved" ');
echo '<h2>Sculptures</h2>
';
echo '<div class="grid">';
foreach ($sculptures as $row){
echo '<div class="cell5">';
  echo '<a href="auctionlotshowsculp.php?id='.$row['idsculptures'].'">';
echo '<ul>';
echo '<li>Sculptures</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].$row['idsculptures'].'</h3></li>';
echo '<li>Artist:'.' '.$row['name_of_artist'].'</li>';
echo '<li>Year Work Produced:'.' '.$row['year_of_work'].'</li>';
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
