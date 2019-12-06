<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='carvings';
require '../headers/header.php';
 ?>
<h2>Carvings</h2>
<div class="buttons">

<ul class="buttons">
  <a href="carvings.php">


<li >
  Pending
</li>



</a>
  <div class="active">
<a href="approvedcarvings.php">
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

<!-- Selects all records which are approved from carvings and displays them in a table -->
<?php
require '../config.php';

$results = $pdo->query('SELECT * FROM carvings WHERE status = "approved"');
$i=1;
foreach($results as $row){
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$row['lotnumber'].$row['idcarvings'].'</a></td>'.
      '<td><a>'. $row['name_of_artist'].'</a></td>'.
      '<td><a>'.$row['year_work_produced'] .'</a></td>'.
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
        '<li><td><a href="pending.php?id='.$row['idcarvings'].'">Pending</a></li>'.
        '<li><a href="remove.php?id='.$row['idcarvings'].'">Remove</a>
        <li><a href="viewcarvings.php?id='.$row['idcarvings'].'">Edit</a></li>
  <li><a href="soldcarvings.php?id='.$row['idcarvings'].'">Sold</a></li>
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
