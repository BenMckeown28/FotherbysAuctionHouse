<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='drawings';
require '../headers/header.php';
?>
<h2>Drawings</h2>
<div class="buttons">

<ul class="buttons">
  <a href="Drawings.php">
    <div class="active">

<li >
  Pending
</li>

</div>


</a>
<a href="approveddrawings.php">
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
            <th>Action</th>

<!-- Selects all the drawings and sets the status to pending -->
<?php
require '../config.php';

$results = $pdo->query('SELECT * FROM Drawings WHERE status = "pending"');
$i=1;
foreach($results as $row){
echo  '<tr id="wrapper">'.
'<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$row['lotnumber'].$row['idDrawings'].'</a></td>'.
      '<td><a>'. $row['Name_of_artist'].'</a></td>'.
      '<td><a>'.$row['Year_work_produced'] .'</a></td>'.
      '<td><a>'.$row['subject_classification'] .'</a></td>'.

      '<td><a>'.$row['auction_date'] .'</a></td>'.
      '<td><a>'.$row['estimated_price'] .'</a></td>'.
      '<td><a>'.$row['Height_dimension'] .'</a></td>'.
      '<td><a>'.$row['Length_dimension'] .'</a></td>'.
      '<td><a>'.$row['Drawing_medium'] .'</a></td>'.
        '<td><a>'.$row['framed'] .'</a></td>'.
      '<td><a>'.$row['Auction'] .'</a></td>'.

        '<ul class="actions">'.


        '<li><td><a href="approvedrawing.php?id='.$row['idDrawings'].'">Approve</a></li>'.
        '<li><a href="removedrawings.php?id='.$row['idDrawings'].'">Remove</a></li>
  <li><a href="viewdrawings.php?id='.$row['idDrawings'].'">Edit</a></li>
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
