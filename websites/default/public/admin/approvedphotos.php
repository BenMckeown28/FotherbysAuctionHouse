<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='photos';
require '../headers/header.php';
?>
<h2>Photosgraphic Images</h2>

<div class="buttons">

<ul class="buttons">
  <a href="photos.php">


<li >
  Pending
</li>



</a>
  <div class="active">
<a href="approvedphotos.php">
  <li>
    Approved
  </li>
</a>


</ul>
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
     <th>Auction date</th>
      <th>Estimated price</th>
       <th>Height Dimension</th>
        <th>Length Dimension</th>
         <th>Type of image</th>
         <th>Auction</th>
   <th>
     Action
   </th>


<!-- Selects all the photos where the status is set  to approved and puts them in a table -->
<?php
require '../config.php';

$results = $pdo->query('SELECT * FROM Photographic_Images WHERE status = "approved" ');
$i=1;
foreach($results as $row){
echo  '<tr id="wrapper">'.
       '<td>
       <a>'.$i.'</a>
       </td>'.
      '<td> <a>'.$row['lotnumber'] .'</a></td>'.
      '<td><a>'. $row['name_of_artist'].'</a></td>'.
      '<td><a>'.$row['year_work_produced'] .'</a></td>'.
      '<td><a>'.$row['subject_classification'] .'</a></td>'.
      '<td><a>'.$row['auction_date'] .'</a></td>'.
      '<td><a>'.$row['estimated_price'] .'</a></td>'.
      '<td><a>'.$row['height_dimension'] .'</a></td>'.
      '<td><a>'.$row['length_dimension'] .'</a></td>'.
      '<td><a>'.$row['type_of_image'] .'</a></td>'.
      '<td><a>'.$row['Auction'] .'</a></td>'.
      '<div class="action">'.
      '<ul>'.
      '<li><td><a href="pendingphotos.php?id='.$row['idPhotographic_Images'].'">Pending</a></li>'.
      '<li><a href="removephotos.php?id='.$row['idPhotographic_Images'].'">Remove</a></li>
      <li><a href="viewphotos.php?id='.$row['idPhotographic_Images'].'">View</a></li>
      <li><a href="soldphotos.php?id='.$row['idPhotographic_Images'].'">Sold</a></li></td>
        </li>
  </div>
        '.
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
