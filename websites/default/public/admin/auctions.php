<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='auctions';
require '../headers/header.php';
?>
<h2>Auctions</h2>

<div class="con">
<div class="tableview">

<table id="tableid" width="100%">
  <tr>
    <th>Row Number</th>
     <th>Auction name</th>
        <th>Date of Auction</th>
           <th>Auction start time</th>
 <th>Action</th>


<!-- Selects all the records from the auction table -->
<?php
require '../config.php';

$results = $pdo->query('SELECT * FROM Auction');
$i=1;
foreach($results as $row){
echo  '<tr id="wrapper">'.
'<td><a>'.$i.'</a></td>'.
      '<td><a>'.$row['Auction_Name'] .'</a></td>'.
        '<td><a>'.$row['Date_Of_Auction'] .'</a></td>'.
          '<td><a>'.$row['Auction_Time'] .'</a></td>'.
            '<ul>
        <td>  <li><a href="view.php?id='.$row['idAuction'].'">View</a></li>
<li><a href="removeauction.php?id='.$row['idAuction'].'">Remove</a>

          </li></td>
          </ul>.

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
