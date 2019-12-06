<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='paintings';
require '../headers/header.php';
 ?>
<h2>Paintings</h2>
<div class="buttons">

<ul class="buttons">
  <a href="paintings.php">


<li >
  Pending
</li>



</a>
  <div class="active">
<a href="approvedpaintings.php">
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
         <th>Medium</th>
          <th>Framed</th>
              <th>Auction</th>
          <th>
            Action
          </th>


<!-- Selects all the paintings which status is set to approved -->
<?php
require '../config.php';

$results = $pdo->query('SELECT * FROM Paintings WHERE status = "approved"');
$i=1;
foreach($results as $row){
echo  '<tr id="wrapper">'.
    '<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$row['lotnumber'] .'</a></td>'.
      '<td><a>'. $row['Name_of_artist'].'</a></td>'.
      '<td><a>'.$row['year_work_produced'] .'</a></td>'.
      '<td><a>'.$row['subject_classification'] .'</a></td>'.

      '<td><a>'.$row['auction_date'] .'</a></td>'.
      '<td><a>'.$row['estimated_price'] .'</a></td>'.
      '<td><a>'.$row['height_dimension'] .'</a></td>'.
      '<td><a>'.$row['length_dimension'] .'</a></td>'.
      '<td><a>'.$row['medium_used'] .'</a></td>'.
        '<td><a>'.$row['framed'] .'</a></td>'.
          '<td><a>'.$row['Auction'] .'</a></td>'.
        '<ul>'.
        '<li><td><a href="pendingpaintings.php?id='.$row['idPaintings'].'">Pending</a></li>'.
        '<li><a href="removepaintings.php?id='.$row['idPaintings'].'">Remove</a>
        <li><a href="viewpainting.php?id='.$row['idPaintings'].'">View</a>
        <li><a href="soldpaintings.php?id='.$row['idPaintings'].'">Sold</a></li>
          </li></td>'.
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
