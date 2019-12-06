<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
/* Selects the auction and its details based on the id within the url */
$page='auctions';
require "../config.php";
require '../headers/header.php';
   $auction= $pdo->query('SELECT * FROM Auction WHERE idAuction= '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;

echo '<div class="con">';

echo '<ul> <li>'.$auction['Auction_Name'] . '</li>'.

'<li>' .$auction['Date_Of_Auction']. '</li>'.
 '<li>'.$auction['Auction_Time']. '</li>'.
 '<li>'.$auction['Description']. '</li>' ;

echo '</ul>';
/* Selects all the relevent auction lots to the auction which is being selected */
echo
'</div>';
$carvings = $pdo->query('SELECT * FROM carvings WHERE Auction = "'.$auction['Auction_Name'].'" ');
$drawings = $pdo->query('SELECT * FROM Drawings WHERE Auction = "'.$auction['Auction_Name'].'" ');
$Paintings = $pdo->query('SELECT * FROM Paintings WHERE Auction = "'.$auction['Auction_Name'].'" ');
$Photographic_Images = $pdo->query('SELECT * FROM Photographic_Images WHERE Auction = "'.$auction['Auction_Name'].'" ');
$sculptures = $pdo->query('SELECT * FROM sculptures WHERE Auction = "'.$auction['Auction_Name'].'" ');


?>
<h1>Items in Auction</h1>
<h2>Carvings</h2>
<div class="con">
<div class="tableview">

<table>
<tr>
  <th>
    Row Number
  </th>
   <th>lotnumber</th>
   <th>Name of artist</th>
   <th>Year work was produced</th>
   <th>
    Estimated price
   </th>
      <th>Auction date</th>
      <th>Action</th>



</tr>

<?php
/* Displays all the records within the table */
  $i=1;
  foreach($carvings as $row){
  echo  '<tr id="wrapper">'.
  '<td><a>'.$i.'</a></td>'.
        '<td><a>'.$row['lotnumber'].$row['idcarvings'].'</a></td>'.
          '<td><a>'.$row['name_of_artist'] .'</a></td>'.
            '<td><a>'.$row['year_work_produced'] .'</a></td>'.
            '<td><a>'.$row['estimated_price'] .'</a></td>'.
            '<td><a>'.$row['auction_date'] .'</a></td>'.
              '<td><a href="viewcarvings.php?id='.$row['idcarvings'].'">View</a></td>.

  </tr>';
  $i++;
  }

 ?>
</table>
</div>
</div>
<h2>Drawings</h2>
<div class="con">
<div class="tableview">

<table>
<tr>
  <th>
    Row Number
  </th>
   <th>lotnumber</th>
   <th>Name of artist</th>
   <th>Year work was produced</th>
   <th>
    Estimated price
   </th>
      <th>Auction date</th>
      <th>Action</th>



</tr>

<?php

  $i=1;
  foreach($drawings as $row){
  echo  '<tr id="wrapper">'.
  '<td><a>'.$i.'</a></td>'.
        '<td><a>'.$row['lotnumber'] .$row['idDrawings'].'</a></td>'.
          '<td><a>'.$row['Name_of_artist'] .'</a></td>'.
            '<td><a>'.$row['Year_work_produced'] .'</a></td>'.
            '<td><a>'.$row['estimated_price'] .'</a></td>'.
            '<td><a>'.$row['auction_date'] .'</a></td>'.
              '<td><a href="viewdrawings.php?id='.$row['idDrawings'].'">View</a></td>.

  </tr>';
  $i++;
  }

 ?>
</table>


</div>
</div>
<h2>Paintings</h2>
<div class="con">
<div class="tableview">

<table>
<tr>
  <th>
    Row Number
  </th>
   <th>lotnumber</th>
   <th>Name of artist</th>
   <th>Year work was produced</th>
   <th>
    Estimated price
   </th>
      <th>Auction date</th>
      <th>Action</th>



</tr>

<?php

  $i=1;
  foreach($Paintings as $row){
  echo  '<tr id="wrapper">'.
  '<td><a>'.$i.'</a></td>'.
        '<td><a>'.$row['lotnumber'] .$row['idPaintings'].'</a></td>'.
          '<td><a>'.$row['Name_of_artist'] .'</a></td>'.
            '<td><a>'.$row['year_work_produced'] .'</a></td>'.
            '<td><a>'.$row['estimated_price'] .'</a></td>'.
            '<td><a>'.$row['auction_date'] .'</a></td>'.
              '<td><a href="viewpainting.php?id='.$row['idPaintings'].'">View</a></td>.

  </tr>';
  $i++;
  }

 ?>
</table>


</div>
</div>
<h2>Photographic_Images</h2>
<div class="con">
<div class="tableview">

<table>
<tr>
  <th>
    Row Number
  </th>
   <th>lotnumber</th>
   <th>Name of artist</th>
   <th>Year work was produced</th>
   <th>
    Estimated price
   </th>
      <th>Auction date</th>
      <th>Action</th>



</tr>

<?php

  $i=1;
  foreach($Photographic_Images as $row){
  echo  '<tr id="wrapper">'.
  '<td><a>'.$i.'</a></td>'.
        '<td><a>'.$row['lotnumber'] .$row['idPhotographic_Images'].'</a></td>'.
          '<td><a>'.$row['name_of_artist'] .'</a></td>'.
            '<td><a>'.$row['year_work_produced'] .'</a></td>'.
            '<td><a>'.$row['estimated_price'] .'</a></td>'.
            '<td><a>'.$row['auction_date'] .'</a></td>'.
              '<td><a href="viewphotos.php?id='.$row['idPhotographic_Images'].'">View</a></td>.

  </tr>';
  $i++;
  }

 ?>
</table>


</div>
</div>
<h2>Sculptures</h2>
<div class="con">
<div class="tableview">

<table>
<tr>
  <th>
    Row Number
  </th>
   <th>lotnumber</th>
   <th>Name of artist</th>
   <th>Year work was produced</th>
   <th>
    Estimated price
   </th>
      <th>Auction date</th>
      <th>Action</th>



</tr>

<?php

  $i=1;
  foreach($sculptures as $row){
  echo  '<tr id="wrapper">'.
  '<td><a>'.$i.'</a></td>'.
        '<td><a>'.$row['lotnumber'] .$row['idsculptures'].'</a></td>'.
          '<td><a>'.$row['name_of_artist'] .'</a></td>'.
            '<td><a>'.$row['year_of_work'] .'</a></td>'.
            '<td><a>'.$row['estimated_price'] .'</a></td>'.
            '<td><a>'.$row['auction_date'] .'</a></td>'.
              '<td><a href="viewsculpture.php?id='.$row['idsculptures'].'">View</a></td>.

  </tr>';
  $i++;
  }
}
else{
  header('location:../login.php');
}
 ?>
</table>


</div>
</div>
