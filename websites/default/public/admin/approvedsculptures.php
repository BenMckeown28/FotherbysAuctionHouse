<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='sculptures';
require '../headers/header.php';
 ?>
<h2>Sculptures</h2>
<div class="buttons">

<ul class="buttons">
  <a href="sculptures.php">


<li >
  Pending
</li>



</a>
  <div class="active">
<a href="approvedsculptures.php">
  <li>
    Approved
  </li>
</a>

</div>

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
         <th>Width Dimension</th>
          <th>Material</th>
           <th>Weight</th>
           <th>
            Auction
           </th>
           <th>
            Status
           </th>
           <th>
            Action
           </th>

<!-- Selects all the sculptures where the status is set to approved -->
<?php
require '../config.php';

$results = $pdo->query('SELECT * FROM sculptures WHERE status = "approved"');
$i=1;
foreach($results as $row){
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$row['lotnumber'] .'</a></td>'.
      '<td><a>'. $row['name_of_artist'].'</a></td>'.
      '<td><a>'.$row['year_of_work'] .'</a></td>'.
      '<td><a>'.$row['subject_classification'] .'</a></td>'.

      '<td><a>'.$row['auction_date'] .'</a></td>'.
      '<td><a>'.$row['estimated_price'] .'</a></td>'.
      '<td><a>'.$row['height_dimension'] .'</a></td>'.
      '<td><a>'.$row['length_dimension'] .'</a></td>'.
      '<td><a>'.$row['width_dimension'] .'</a></td>'.
        '<td><a>'.$row['material'] .'</a></td>'.
        '<td><a>'.$row['weight'] .'</a></td>'.
        '<td><a>'.$row['Auction'] .'</a></td>'.
        '<td><a>'.$row['status'] .'</a></td>'.
        '<ul>'.
        '<li><td><a href="pendingsculp.php?id='.$row['idsculptures'].'">Pending</a></li>'.
        '<li><a href="removesculp.php?id='.$row['idsculptures'].'">Remove</a></li>
        <li><a href="viewsculpture.php?id=' . $row['idsculptures'] .'">View</a></li>
    <li><a href="soldsculptures.php?id='.$row['idsculptures'].'">Sold</a></li>

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
</body>
</div>
</div>
