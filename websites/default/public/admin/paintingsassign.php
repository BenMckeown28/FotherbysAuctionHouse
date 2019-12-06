<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

/* Selects all the relevent fields where the paintings records id matches the id within the url */
$page='paintings';
require '../headers/header.php';
$drawing= $pdo->query('SELECT * FROM Paintings WHERE idPaintings = '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>
<div class="con">



<div class="formadd">
<form action="" method="POST" >

          <input type="hidden" name="id" value="<?php echo $drawing['idPaintings']; ?>"  />
          <label>lotnumber</label>
          <input  readonly="readonly" type="text" name="lot" value="<?php echo $drawing['lotnumber']; ?>" /><br /><br />
          <label>Name of artist</label>
          <input  readonly="readonly"  type="text" name="name" value="<?php echo $drawing['Name_of_artist']; ?>" /><br /><br />
          <label>Year work produced</label>
          <input  readonly="readonly" type="text" name="year" value="<?php echo $drawing['year_work_produced']; ?>" /><br /><br />
          <label>Subject Classification</label>
          <input  readonly="readonly" type="text" name="subject" value="<?php echo $drawing['subject_classification']; ?>" /><br /><br />
          <label>Description</label>
          <input  readonly="readonly" type="text" name="description" value="<?php echo $drawing['description']; ?>" /><br /><br />
          <label>Auciton date</label>
          <input readonly="readonly"  type="text" name="auction_date" value="<?php echo $drawing['auction_date']; ?>" /><br /><br />
          <label>Estimated Price</label>
          <input  readonly="readonly" type="text" name="estimated_price" value="<?php echo $drawing['estimated_price']; ?>" /><br /><br />
          <label>Medium used</label>
          <input readonly="readonly"  type="text" name="material" value="<?php echo $drawing['medium_used']; ?>" /><br /><br />
          <label>Height dimension</label>
          <input readonly="readonly"  type="text" name="height" value="<?php echo $drawing['height_dimension']; ?>" /><br /><br />
          <label>Length dimension</label>
          <input readonly="readonly"  type="text" name="length" value="<?php echo $drawing['length_dimension']; ?>" /><br /><br />
          <label>Select Auction for lot item to be assigned to:</label>
<select name="auction">
  <!-- Selects all the auctions names from the auctions table and prints them into a select box -->
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

/* Updates the paintings table ands sets the auction to the auction which is selected within the previous  */
if (isset($_POST['edit'])) {

        $stmt = $pdo->prepare('UPDATE Paintings
                                SET Auction = :Auction,
                                status = "pending"

                                   WHERE idPaintings = '.$_POST['id'].'
                        ');

        $criteria = [
         'Auction' => $_POST['auction']

        ];

        $stmt->execute($criteria);
echo '<a > Painting record has been updated and added to the auction :'.$_POST['auction'].'</a>';


}
}
else{
  header('location:../login.php');
}
?>


</div>
</div>
