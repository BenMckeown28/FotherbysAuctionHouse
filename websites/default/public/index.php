<?php
require 'config.php';
require 'headers/publicheader.php';
echo '<h1> Top Live auction lots (Based on Estimated prices)</h1>';
/*Displays all the records from the tables where it selects all the records with the highest estimated price*/
$sculptures = $pdo->query('SELECT * FROM sculptures ORDER BY estimated_price DESC LIMIT 3');
echo '<h2>Sculptures</h2>

<div class="recommended">

';

foreach ($sculptures as $row){
  echo '<ul>';
  echo '<a href="auctionlotshowsculp.php?id='.$row['idsculptures'].'">';
echo '<div class="lot">';
echo '<li><h3>Lot number:'.$row['lotnumber'].$row['idsculptures'].'</h3></li> <br />';
echo '<li>Name of artist:'." ".$row['name_of_artist'].'</li><br />';
echo '<li>Year of work produced:'." ".$row['year_of_work'].'</li><br />';
echo '<li>Auction:'." ".$row['Auction'].'</li><br />';
echo '<li>Estimated Price:'." £".$row['estimated_price'].'</li><br />';
echo '</div>';
echo '</a>';
echo '</ul>
';
}
echo '</div>';
$paintings = $pdo->query('SELECT * FROM Paintings ORDER BY estimated_price DESC LIMIT 3 ');
echo '<h2>Paintings</h2>
<div class="recommended">';
foreach ($paintings as $row){
  echo '<ul>';
  echo '<a href="auctionlotshowpaint.php?id='.$row['idPaintings'].'">';
echo '<div class="lot">';
echo '<li><h3>Lot number:'." ".$row['lotnumber'].$row['idPaintings'].'</h3></li> <br />';
echo '<li>Name of artist:'." ".$row['Name_of_artist'].'</li><br />';
echo '<li>Year of work produced:'." ".$row['year_work_produced'].'</li><br />';
echo '<li>Auction:'." ".$row['Auction'].'</li><br />';
echo '<li>Estimated Price:'." £".$row['estimated_price'].'</li><br />';
echo '</div>';
echo '</a>';
echo '</ul>';

}
echo '</div>';
$photos = $pdo->query('SELECT * FROM Photographic_Images ORDER BY estimated_price DESC LIMIT 3 ');
echo '<h2>Photographic Images</h2>
<div class="recommended">';
foreach ($photos as $row){
  echo '<ul>';
  echo '<a href="auctionlotshowphoto.php?id='.$row['idPhotographic_Images'].'">';
  echo '<div class="lot">';
echo '<li><h3>Lot number:'." ".$row['lotnumber'].$row['idPhotographic_Images'].'</h3></li> <br />';
echo '<li>Name of artist:'." ".$row['name_of_artist'].'</li><br />';
echo '<li>Year of work produced:'." ".$row['year_work_produced'].'</li><br />';
echo '<li>Auction:'." ".$row['Auction'].'</li><br />';
echo '<li>Estimated Price:'." £".$row['estimated_price'].'</li><br />';
echo '</div>';
echo '</a>';
echo '</ul>';

}
echo '</div>';
$drawings= $pdo->query('SELECT * FROM Drawings ORDER BY estimated_price DESC LIMIT 3 ');
echo '<h2>Drawings</h2>
<div class="recommended">';
foreach ($drawings as $row){
  echo '<ul>';
  echo '<a href="auctionlotshowdraw.php?id='.$row['idDrawings'].'">';
echo '<div class="lot">';
echo '<li><h3>Lot number:'." ".$row['lotnumber'].$row['idDrawings'].'</h3></li> <br />';
echo '<li>Name of artist:'." ".$row['Name_of_artist'].'</li><br />';
echo '<li>Year of work produced:'." ".$row['Year_work_produced'].'</li><br />';
echo '<li>Auction:'." ".$row['Auction'].'</li><br />';
echo '<li>Estimated Price:'." £".$row['estimated_price'].'</li><br />';
echo '</div>';
echo '</a>';
echo '</ul>';

}
echo '</div>';
$carvings = $pdo->query('SELECT * FROM carvings ORDER BY estimated_price DESC LIMIT 3 ');
echo '<h2>Carvings</h2>
<div class="recommended">';
foreach ($carvings as $row){
  echo '<ul>';
    echo '<a href="auctionlotshowcar.php?id='.$row['idcarvings'].'">';
echo '<div class="lot">';
echo '<li><h3>Lot number:'." ".$row['lotnumber'].$row['idcarvings'].'</h3> </li><br />';
echo '<li><Name of artist:'." ".$row['name_of_artist'].'</li><br />';
echo '<li>Year of work produced:'." ".$row['year_work_produced'].'/li><br />';
echo '<li>Auction:'." ".$row['Auction'].'</li><br />';
echo '<li>Estimated Price: '." £".$row['estimated_price'].'</li><br />';
echo '</div>';
echo '</a>';
echo '</ul>';

}
echo '</div>';

?>
</div>
