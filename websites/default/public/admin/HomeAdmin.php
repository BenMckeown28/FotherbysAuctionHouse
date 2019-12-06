<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='home';
require '../headers/header.php';

/* Queries to select the data where the auction lots status is set to approved */

$totalauctions=$pdo->query('SELECT * FROM Auction');
$totalcarvings=$pdo->query('SELECT * FROM carvings WHERE status = "approved"');
$totaldrawings=$pdo->query('SELECT * FROM Drawings WHERE status = "approved"');
$totalpaintings=$pdo->query('SELECT * FROM Paintings WHERE status = "approved"');
$totalphotos=$pdo->query('SELECT * FROM Photographic_Images WHERE status = "approved"');
$totalsculptures=$pdo->query('SELECT * FROM sculptures WHERE status = "approved"');


/* Queries to select the data where the auction lots status is set to pending */

$totalcarvings1=$pdo->query('SELECT * FROM carvings WHERE status = "pending"');
$totaldrawings1=$pdo->query('SELECT * FROM Drawings WHERE status = "pending"');
$totalpaintings1=$pdo->query('SELECT * FROM Paintings WHERE status = "pending"');
$totalphotos1=$pdo->query('SELECT * FROM Photographic_Images WHERE status = "pending"');
$totalsculptures1=$pdo->query('SELECT * FROM sculptures WHERE status = "pending"');


/* Queries to select the data from each of the above queries and count the total of each query */

$rowcount = $totalcarvings->rowCount();
$rowcount1 = $totaldrawings->rowCount();
$rowcount2 = $totalpaintings->rowCount();
$rowcount3 = $totalphotos->rowCount();
$rowcount4 = $totalsculptures->rowCount();
$rowcount5 = $totalauctions->rowCount();
$rowcountpen = $totalcarvings1->rowCount();
$rowcount1pen = $totaldrawings1->rowCount();
$rowcount2pen = $totalpaintings1->rowCount();
$rowcount3pen = $totalphotos1->rowCount();
$rowcount4pen = $totalsculptures1->rowCount();

/* To add all the queries together to total the amount of items which are appproved  */
$total = $rowcount + $rowcount1 + $rowcount2 + $rowcount3 + $rowcount4  ;

/* To add all the queries together to total the amount of items which are pending  */
$totalpen = $rowcountpen + $rowcount1pen + $rowcount2pen + $rowcount3pen + $rowcount4pen ;

/* Total amount of auction lots within the system  */
$overall = $total + $totalpen ;

?>
<div class="grid">
<div class="cell">
<h2>Total amount of auctions: <?php echo '</br>'. $rowcount5 ; ?></h2>
</div>
<div class="cell">
  <h2>Total amount of approved auction lots: <?php echo '</br>'. $total ; ?></h2>
</div>
  <div class="cell">
    <h2>Total amount of pending auction lots: <?php echo '</br>'. $totalpen ; ?></h2>
    </div>
    <div class="cell">
      <h2>Total amount of auction lots: <?php echo '</br>'. $overall ; ?></h2>
      </div>
</div>

<?php






}
else{
  header('location:../login.php');
}
?>
