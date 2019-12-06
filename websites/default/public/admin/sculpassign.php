<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
/* Selects the records details from sculptures and places the relevent fields within the form */
$page='sculptures';
require '../headers/header.php';
$drawing= $pdo->query('SELECT * FROM sculptures WHERE idsculptures = '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>
<div class="con">



<div class="formadd">
<form action="" method="POST" >

          <input type="hidden" name="id" value="<?php echo $drawing['idsculptures']; ?>"  />
          <label>lotnumber</label>
          <input  readonly="readonly" type="text" name="lot" value="<?php echo $drawing['lotnumber']; ?>" /><br /><br />
          <label>Name of artist</label>
          <input  readonly="readonly"  type="text" name="name" value="<?php echo $drawing['name_of_artist']; ?>" /><br /><br />
          <label>Year work produced</label>
          <input  readonly="readonly" type="text" name="year" value="<?php echo $drawing['year_of_work']; ?>" /><br /><br />
          <label>Subject Classification</label>
          <input  readonly="readonly" type="text" name="subject" value="<?php echo $drawing['subject_classification']; ?>" /><br /><br />
          <label>Description</label>
          <input  readonly="readonly" type="text" name="description" value="<?php echo $drawing['description']; ?>" /><br /><br />
          <label>Auciton date</label>
          <input readonly="readonly"  type="text" name="auction_date" value="<?php echo $drawing['auction_date']; ?>" /><br /><br />
          <label>Estimated Price</label>
          <input  readonly="readonly" type="text" name="estimated_price" value="<?php echo $drawing['estimated_price']; ?>" /><br /><br />
          <label>Material</label>
          <input readonly="readonly"  type="text" name="material" value="<?php echo $drawing['material']; ?>" /><br /><br />
          <label>Height dimension</label>
          <input readonly="readonly"  type="text" name="height" value="<?php echo $drawing['height_dimension']; ?>" /><br /><br />
          <label>Length dimension</label>
          <input readonly="readonly"  type="text" name="length" value="<?php echo $drawing['length_dimension']; ?>" /><br /><br />
          <label>Width dimension</label>
          <input readonly="readonly"  type="text" name="width" value="<?php echo $drawing['width_dimension']; ?>" /><br /><br />
          <label>Select Auction for lot item to be assigned to:</label>
<select name="auction">
  <?php
  $auctions=$pdo->query('SELECT * FROM Auction');
foreach ($auctions as $row){
  echo '
<option>'.
  $row['Auction_Name'].'
</option>
';
}
?>
</select>

<input type="submit" name="edit" value="Assign" />
        </form>

  <!-- Updates the sculptures record depending on the id within the url -->    

<?php


if (isset($_POST['edit'])) {

        $stmt = $pdo->prepare('UPDATE sculptures
                                SET Auction = :Auction,
                                status = "pending"

                                   WHERE idsculptures = '.$_POST['id'].'
                        ');

        $criteria = [
         'Auction' => $_POST['auction']

        ];

        $stmt->execute($criteria);
echo '<a > Sculpture record has been updated and added to the auction :'.$_POST['auction'].'</a>';


}
}
else{
  header('location:../login.php');
}
?>


</div>
</div>
