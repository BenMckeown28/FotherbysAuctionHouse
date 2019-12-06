<?php
require "config.php";
require 'headers/publicheader.php';


$category = $_GET['category'];
$date = $_GET['date'];
$min = $_GET['min'];
$max = $_GET['max'];

/*Selects the relevent records  with the fields which have been selected within the filter*/

if($min == "" OR  $max == ""){
  echo'<h3>Displaying results for items in'." ". $category." ".'on the auction(s) date :'." ". $date.'</h3>';
  $carvings = $pdo->query('SELECT * FROM carvings WHERE category = "'.$category.'" AND status = "approved" AND auction_date = "'.$date.'"');
  $drawings = $pdo->query('SELECT * FROM Drawings WHERE category = "'.$category.'" AND status = "approved" AND auction_date = "'.$date.'" ');
  $Paintings = $pdo->query('SELECT * FROM Paintings WHERE category = "'.$category.'" AND status = "approved" AND auction_date = "'.$date.'" ');
  $Photographic_Images = $pdo->query('SELECT * FROM Photographic_Images WHERE category = "'.$category.'" AND status = "approved" AND auction_date = "'.$date.'" ');
  $sculptures = $pdo->query('SELECT * FROM sculptures WHERE category = "'.$category.'" AND status = "approved" AND auction_date = "'.$date.'" ');
}
else{
  echo'<h3>Displaying results for items in'." ". $category." ".'on the auction(s) date :'." ". $date." ".'With a value between £'." ".$min." ".'and £'." ".$max.'</h3>';
$carvings = $pdo->query('SELECT * FROM carvings WHERE category = "'.$category.'" AND status = "approved" AND auction_date = "'.$date.'" AND estimated_price BETWEEN  "'.$min.'" AND "'.$max.'" ');
$drawings = $pdo->query('SELECT * FROM Drawings WHERE category = "'.$category.'" AND status = "approved" AND auction_date = "'.$date.'" AND estimated_price BETWEEN  "'.$min.'" AND "'.$max.'" ');
$Paintings = $pdo->query('SELECT * FROM Paintings WHERE category = "'.$category.'" AND status = "approved" AND auction_date = "'.$date.'" AND estimated_price BETWEEN  "'.$min.'" AND "'.$max.'" ');
$Photographic_Images = $pdo->query('SELECT * FROM Photographic_Images WHERE category = "'.$category.'" AND status = "approved" AND auction_date = "'.$date.'" AND estimated_price BETWEEN  "'.$min.'" AND "'.$max.'" ');
$sculptures = $pdo->query('SELECT * FROM sculptures WHERE category = "'.$category.'" AND status = "approved" AND auction_date = "'.$date.'" AND estimated_price BETWEEN  "'.$min.'" AND "'.$max.'" ');
}






/*Shows the records within a grid style method*/

echo '<div class="grid">';

foreach ($carvings as $row){

echo '<div class="cell">';
  echo '<a href="auctionlotshowcar.php?id='.$row['idcarvings'].'">';
echo '<ul>';
echo '<li>Carvings</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].$row['idcarvings'].'</h3></li>';
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
foreach ($drawings as $row){
echo '<div class="cell2">';
  echo '<a href="auctionlotshowdraw.php?id='.$row['idDrawings'].'">';
echo '<ul>';
echo '<li>Drawings</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].'</h3></li>';
echo '<li>Artist:'.' '.$row['Name_of_artist'].'</li>';
echo '<li>Year Work Produced:'.' '.$row['Year_work_produced'].'</li>';
echo '<li>Estimated Price:   £'.' '.$row['estimated_price'].'</li>';
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
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].'</h3></li>';
echo '<li>Artist:'.' '.$row['Name_of_artist'].'</li>';
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

foreach ($Photographic_Images as $row){
echo '<div class="cell4">';
  echo '<a href="auctionlotshowphoto.php?id='.$row['idPhotographic_Images'].'">';
echo '<ul>';
echo '<li>Photographic Images</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].'</h3></li>';
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

foreach ($sculptures as $row){
echo '<div class="cell5">';
  echo '<a href="auctionlotshowsculp.php?id='.$row['idsculptures'].'">';
echo '<ul>';
echo '<li>Sculptures</li>';
echo '<li><h3>Lot Number:'.' '.$row['lotnumber'].'</h3></li>';
echo '<li>Artist:'.' '.$row['name_of_artist'].'</li>';
echo '<li>Year Work Produced:'.' '.$row['year_of_work'].'</li>';
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




echo '</div>';

?>
