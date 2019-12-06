<?php

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
/* Selects record based on the id within the url */
$page='photos';
require "../config.php";
require '../headers/header.php';
   $sculpture= $pdo->query('SELECT * FROM Photographic_Images WHERE idPhotographic_Images = '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;




?>

<div class="con">
<div class="formadd">
<form action="" method="POST" >

          <input type="hidden" name="id" value="<?php echo $sculpture['idPhotographic_Images']; ?>"  />
          <label>lotnumber</label>
          <input readonly="readonly"  type="text" name="lotnumber" value="<?php echo $sculpture['lotnumber'].$sculpture['idPhotographic_Images']; ?>" /><br /><br />
          <label>Name of artist</label>
          <input readonly type="text" name="name_of_artist" value="<?php echo $sculpture['name_of_artist']; ?>" /><br /><br />
          <label>Auciton date</label>
          <input readonly type="text" name="auction_date" value="<?php echo $sculpture['auction_date']; ?>" /><br /><br />
          <label>Estimated Price</label>
          <input readonly  type="text" name="estimated_price" value="<?php echo $sculpture['estimated_price']; ?>" /><br /><br />
          <label>Enter Sold Price</label>
          <input type="text" name="sold"  /> <br /> <br />
          <input type="submit" name="submit" value="Sold" />

</form>

</div>
</div>
<!-- When the record is submitted it will update the relevent tables record for the price inputted by the user, thee status to sold and the commision price for 0.9 * worth of the price which
was inputted into the form -->
<?php
if(isset($_POST['submit'])){
$commision = $_POST['sold'];
$soldvalue = $commision * 0.9 ;

$insert= $pdo->prepare('UPDATE Photographic_Images
  SET commision_price = :commision_price,
  status = :status,
  sold_for = :sold_for
  WHERE idPhotographic_Images = '.$_GET['id'].'
');

$criteria = [
"commision_price"=> $soldvalue,
"status"=> "sold",
"sold_for"=> $_POST['sold']



];


$insert->execute($criteria);

echo 'Item has been sold for a value of: £'.$soldvalue." "."after commision";




}





}
?>
