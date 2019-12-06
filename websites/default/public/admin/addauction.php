
<!-- File to add an auction to the system -->
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='auctionadd';
require '../config.php';
require '../headers/header.php';

$date=date('y-m-d');
?>
<head>

</head>
<body>
  <h2>Add auction</h2>
<div class="con">



<div class="formadd">

<form action="addauction.php" method="post">
  <label>Auction name</label><br />
  <input type="text" name="name"  /><br />
  <label>Date of Auction</label><br />
  <input type="date" min="<?php echo $date ?>" name="dateauction"  /><br />
  <label>Start time of Auction</label><br />
  <input type="text" name="timeauction"  /><br />
  <label>Description of Auction</label><br />
  <textarea cols="80" rows="10" name="description" ></textarea><br /><br />

<input type="submit" name="submit" value="add" />
<br />

</form>

</body>
</div>
 <?php

 if(isset($_POST{'submit'})){






/* Insert query to insert the new data into the auction table of the database */

     $stmt = $pdo->prepare('INSERT INTO Auction (Auction_Name,Date_Of_Auction,Auction_Time,Description)
         VALUES (:auction_name,:Date_of_auction,:Auction_time,:description)');
     $auction = [
'auction_name'=> $_POST['name'],
'Date_of_auction'=>$_POST['dateauction'],
'Auction_time'=>$_POST['timeauction'],
'description'=>$_POST['description']
     ];

 $stmt->execute($auction);

   echo 'Auction added';

   }
 }
 else{
   header('location:../login.php');
 }
 ?>
