<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='unassigned';
require '../headers/header.php';
 ?>
<h2>Unassigned Auction lots</h2>
<div class="buttons">


</div>

<div class="con">
<div class="tableview">

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
                  <th>Action</th>


<!-- Selects all the records from the auctions table where they are not assigned to any auction within the database -->
<?php
require '../config.php';

$carvings = $pdo->query('SELECT * FROM carvings WHERE Auction = "0"');
$i=1;
foreach($carvings as $row){
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$row['lotnumber'] .'</a></td>'.
      '<td><a>'. $row['name_of_artist'].'</a></td>'.
      '<td><a>'.$row['year_work_produced'] .'</a></td>'.
      '<td><a>'.$row['subject_classification'] .'</a></td>'.
      '<td><a>'.$row['estimated_price'] .'</a></td>'.
      '<td><a> Carvings </a></td>'.
        '<ul>'.

        '<li><td><a href="carassign.php?id='.$row['idcarvings'].'">Assign</a></td>
          </li>'.
          '</ul>
</tr>';
$i++;
}

$drawings = $pdo->query('SELECT * FROM Drawings WHERE Auction = "0"');
$i=1;
foreach($drawings as $rows){
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$rows['lotnumber'] .'</a></td>'.
      '<td><a>'. $rows['Name_of_artist'].'</a></td>'.
      '<td><a>'.$rows['Year_work_produced'] .'</a></td>'.
      '<td><a>'.$rows['subject_classification'] .'</a></td>'.
      '<td><a>'.$rows['estimated_price'] .'</a></td>'.
      '<td><a> Drawings </a></td>'.
        '<ul>'.

        '<li><td><a href="drawassign.php?id='.$rows['idDrawings'].'">Assign</a></td>
          </li>'.
          '</ul>
</tr>';
$i++;
}
$paintings = $pdo->query('SELECT * FROM Paintings WHERE Auction = "0"');
$i=1;
foreach($paintings as $rows){
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$rows['lotnumber'] .'</a></td>'.
      '<td><a>'. $rows['Name_of_artist'].'</a></td>'.
      '<td><a>'.$rows['year_work_produced'] .'</a></td>'.
      '<td><a>'.$rows['subject_classification'] .'</a></td>'.
      '<td><a>'.$rows['estimated_price'] .'</a></td>'.
      '<td><a> Paintings </a></td>'.
        '<ul>'.

        '<li><td><a href="paintingsassign.php?id='.$rows['idPaintings'].'">Assign</a></td>
          </li>'.
          '</ul>
</tr>';
$i++;
}
$photos = $pdo->query('SELECT * FROM Photographic_Images WHERE Auction = "0"');
$i=1;
foreach($photos as $rows){
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$rows['lotnumber'] .'</a></td>'.
      '<td><a>'. $rows['name_of_artist'].'</a></td>'.
      '<td><a>'.$rows['year_work_produced'] .'</a></td>'.
      '<td><a>'.$rows['subject_classification'] .'</a></td>'.
      '<td><a>'.$rows['estimated_price'] .'</a></td>'.
      '<td><a> Photographic Images </a></td>'.
        '<ul>'.

        '<li><td><a href="photoassign.php?id='.$rows['idPhotographic_Images'].'">Assign</a></td>
          </li>'.
          '</ul>
</tr>';
$i++;
}
$photos = $pdo->query('SELECT * FROM sculptures WHERE Auction = "0"');
$i=1;
foreach($photos as $rows){
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$rows['lotnumber'] .'</a></td>'.
      '<td><a>'. $rows['name_of_artist'].'</a></td>'.
      '<td><a>'.$rows['year_of_work'] .'</a></td>'.
      '<td><a>'.$rows['subject_classification'] .'</a></td>'.
      '<td><a>'.$rows['estimated_price'] .'</a></td>'.
      '<td><a> Sculptures</a></td>'.
        '<ul>'.

        '<li><td><a href="sculpassign.php?id='.$rows['idsculptures'].'">Assign</a></td>
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
</body>
</div>
</div>
