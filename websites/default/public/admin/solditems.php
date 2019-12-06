<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='sold';
require '../headers/header.php';
 ?>
<h2>Sold Items</h2>

<div class="con">
<div class="tableview2">

<table id="tableid" width="100%">
  <tr>
    <th>
      Row Number
    </th>
     <th>lotnumber</th>
     <th>Name of artist</th>
     <th>Year work was produced</th>
   <th>Subject classification</th>
      <th>Estimated price</th>
            <th>Category</th>
            <th>
              Auction
            </th>
            <th>
              Commision Price
            </th>
            <th>
              Sold For
            </th>
            <th>
              Commission (10%)
            </th>
                  <th>Action</th>



<?php
require '../config.php';

$carvings = $pdo->query('SELECT * FROM carvings WHERE status = "sold"');
$i=1;
foreach($carvings as $row){

$com=$row['sold_for'] - $row['commision_price'];

echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$row['lotnumber'].$row['idcarvings'].'</a></td>'.
      '<td><a>'. $row['name_of_artist'].'</a></td>'.
      '<td><a>'.$row['year_work_produced'] .'</a></td>'.
      '<td><a>'.$row['subject_classification'] .'</a></td>'.
      '<td><a>£'.$row['estimated_price'] .'</a></td>'.
      '<td><a> Carvings </a></td>'.
        '<td><a>'.$row['Auction'] .'</a></td>'.
          '<td><a>£'.$row['commision_price'] .'</a></td>'.
            '<td><a>£'.$row['sold_for'] .'</a></td>'.
            '<td><a>£'.$com.'</a></td>'.

        '<ul>'.

        '<li><td><a href="viewcarvings.php?id='.$row['idcarvings'].'">View</a></td>
          </li>'.
          '</ul>
</tr>';
$i++;
}

$drawings = $pdo->query('SELECT * FROM Drawings WHERE status = "sold"');

foreach($drawings as $rows){
  $com=$rows['sold_for'] - $rows['commision_price'];
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$rows['lotnumber'].$rows['idDrawings'].'</a></td>'.
      '<td><a>'. $rows['Name_of_artist'].'</a></td>'.
      '<td><a>'.$rows['Year_work_produced'] .'</a></td>'.
      '<td><a>'.$rows['subject_classification'] .'</a></td>'.
      '<td><a>'.$rows['estimated_price'] .'</a></td>'.
        '<td><a> Drawings </a></td>'.
      '<td><a>'.$rows['Auction'] .'</a></td>'.
        '<td><a>£'.$rows['commision_price'] .'</a></td>'.
          '<td><a>£'.$rows['sold_for'] .'</a></td>'.
'<td><a>£'.$com.'</a></td>'.
        '<ul>'.

        '<li><td><a href="viewdrawings.php?id='.$rows['idDrawings'].'">View</a></td>
          </li>'.
          '</ul>
</tr>';
$i++;
}
$paintings = $pdo->query('SELECT * FROM Paintings WHERE status = "sold"');

foreach($paintings as $rows){
    $com=$rows['sold_for'] - $rows['commision_price'];
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$rows['lotnumber'] .$rows['idPaintings'].'</a></td>'.
      '<td><a>'. $rows['Name_of_artist'].'</a></td>'.
      '<td><a>'.$rows['year_work_produced'] .'</a></td>'.
      '<td><a>'.$rows['subject_classification'] .'</a></td>'.
      '<td><a>'.$rows['estimated_price'] .'</a></td>'.
      '<td><a> Paintings </a></td>'.
      '<td><a>'.$rows['Auction'] .'</a></td>'.
        '<td><a>£'.$rows['commision_price'] .'</a></td>'.
          '<td><a>£'.$rows['sold_for'] .'</a></td>'.
          '<td><a>£'.$com.'</a></td>'.
          '<ul>'.

          '<li><td><a href="viewpainting.php?id='.$rows['idPaintings'].'">View</a></td>
            </li>'.
            '</ul>
        </tr>';
$i++;
}
$photos = $pdo->query('SELECT * FROM Photographic_Images WHERE status = "sold"');

foreach($photos as $rows){
    $com=$rows['sold_for'] - $rows['commision_price'];
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$rows['lotnumber'] .$rows['idPhotographic_Images'].'</a></td>'.
      '<td><a>'. $rows['name_of_artist'].'</a></td>'.
      '<td><a>'.$rows['year_work_produced'] .'</a></td>'.
      '<td><a>'.$rows['subject_classification'] .'</a></td>'.
      '<td><a>'.$rows['estimated_price'] .'</a></td>'.
      '<td><a> Photographic Images </a></td>'.
      '<td><a>'.$rows['Auction'] .'</a></td>'.
        '<td><a>£'.$rows['commision_price'] .'</a></td>'.
          '<td><a>£'.$rows['sold_for'] .'</a></td>'.
          '<td><a>£'.$com.'</a></td>'.

        '<ul>'.

        '<li><td><a href="viewphotos.php?id='.$rows['idPhotographic_Images'].'">View</a></td>
          </li>'.
          '</ul>
</tr>';
$i++;
}
$photos = $pdo->query('SELECT * FROM sculptures WHERE status = "sold"');

foreach($photos as $rows){
    $com=$rows['sold_for'] - $rows['commision_price'];
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$rows['lotnumber'] .$rows['idsculptures'].'</a></td>'.
      '<td><a>'. $rows['name_of_artist'].'</a></td>'.
      '<td><a>'.$rows['year_of_work'] .'</a></td>'.
      '<td><a>'.$rows['subject_classification'] .'</a></td>'.
      '<td><a>'.$rows['estimated_price'] .'</a></td>'.
        '<td><a> Sculptures</a></td>'.
      '<td><a>'.$rows['Auction'] .'</a></td>'.
        '<td><a>£'.$rows['commision_price'] .'</a></td>'.
          '<td><a>£'.$rows['sold_for'] .'</a></td>'.
'<td><a>£'.$com.'</a></td>'.
        '<ul>'.

        '<li><td><a href="viewsculpture.php?id='.$rows['idsculptures'].'">View</a></td>
          </li>'.
          '</ul>
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
