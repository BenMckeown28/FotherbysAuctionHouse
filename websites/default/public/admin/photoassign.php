<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
/* Selects all the fields within the photos table and sets the forms fields to equal the record chosen by the id within the url */
$page='photos';
require '../headers/header.php';
$photos= $pdo->query('SELECT * FROM Photographic_Images WHERE idPhotographic_Images = '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>
<div class="con">



<div class="formadd">
<form action="" method="POST" >

          <input type="hidden" name="id" value="<?php echo $photos['idPhotographic_Images']; ?>"  />
          <label>lotnumber</label>
          <input  readonly="readonly" type="text" name="lot" value="<?php echo $photos['lotnumber']; ?>" /><br /><br />
          <label>Name of artist</label>
          <input  readonly="readonly"  type="text" name="name" value="<?php echo $photos['name_of_artist']; ?>" /><br /><br />
          <label>Year work produced</label>
          <input  readonly="readonly" type="text" name="year" value="<?php echo $photos['year_work_produced']; ?>" /><br /><br />
          <label>Subject Classification</label>
          <input  readonly="readonly" type="text" name="subject" value="<?php echo $photos['subject_classification']; ?>" /><br /><br />
          <label>Description</label>
          <input  readonly="readonly" type="text" name="description" value="<?php echo $photos['description']; ?>" /><br /><br />
          <label>Auciton date</label>
          <input readonly="readonly"  type="text" name="auction_date" value="<?php echo $photos['auction_date']; ?>" /><br /><br />
          <label>Estimated Price</label>
          <input  readonly="readonly" type="text" name="estimated_price" value="<?php echo $photos['estimated_price']; ?>" /><br /><br />
          <label>Type of Image</label>
          <input readonly="readonly"  type="text" name="material" value="<?php echo $photos['type_of_image']; ?>" /><br /><br />
          <label>Height dimension</label>
          <input readonly="readonly"  type="text" name="height" value="<?php echo $photos['height_dimension']; ?>" /><br /><br />
          <label>Length dimension</label>
          <input readonly="readonly"  type="text" name="length" value="<?php echo $photos['length_dimension']; ?>" /><br /><br />
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

<?php


if (isset($_POST['edit'])) {

        $stmt = $pdo->prepare('UPDATE Photographic_Images
                                SET Auction = :Auction,
                                status = "pending"

                                   WHERE idPhotographic_Images = '.$_POST['id'].'
                        ');

        $criteria = [
         'Auction' => $_POST['auction']

        ];

        $stmt->execute($criteria);
echo '<a > Photo record has been updated and added to the auction :'.$_POST['auction'].'</a>';


}
}
else{
  header('location:../login.php');
}
?>


</div>
</div>
