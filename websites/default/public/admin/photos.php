<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page="photos";
require '../headers/header.php';
?>
<h2>Photographic Images</h2>
<div class="buttons">

<ul class="buttons">
  <a href="photos.php">
    <div class="active">

<li >
  Pending
</li>

</div>


</a>
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


<!-- Sleects all the records from the photos table where the status is set to pending -->
<?php
require '../config.php';

$results = $pdo->query('SELECT * FROM Photographic_Images WHERE status = "pending" ');
$i=1;
foreach($results as $row){
echo  '<tr id="wrapper">'.
      '<td><a>'.$i.'</a></td>'.
      '<td> <a>'.$row['lotnumber'].$row['idPhotographic_Images'].'</a></td>'.
      '<td><a>'. $row['name_of_artist'].'</a></td>'.
      '<td><a>'.$row['year_work_produced'] .'</a></td>'.
      '<td><a>'.$row['subject_classification'] .'</a></td>'.
      '<td><a>'.$row['auction_date'] .'</a></td>'.
      '<td><a>'.$row['estimated_price'] .'</a></td>'.
      '<td><a>'.$row['height_dimension'] .'</a></td>'.
      '<td><a>'.$row['length_dimension'] .'</a></td>'.
      '<td><a>'.$row['type_of_image'] .'</a></td>'.
      '<td><a>'.$row['Auction'] .'</a></td>'.
      '<ul>'.
      '<li><td><a href="approvephoto.php?id='.$row['idPhotographic_Images'].'">Approve</a></li>'.
      '<li><a href="removephotos.php?id='.$row['idPhotographic_Images'].'">Remove</a></li>
<li><a href="viewphotos.php?id='.$row['idPhotographic_Images'].'">Edit</a></li>
      </td>
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
