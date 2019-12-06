<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='carvings';
require '../headers/header.php';
$carving= $pdo->query('SELECT * FROM carvings WHERE idcarvings= '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>
<div class="con">



<div class="formadd">
<form action="" method="POST" >

          <input type="hidden" name="id" value="<?php echo $carving['idcarvings']; ?>"  />
          <label>lotnumber</label>
          <input  readonly="readonly" type="text" name="lot" value="<?php echo $carving['lotnumber']; ?>" /><br /><br />
          <label>Name of artist</label>
          <input  readonly="readonly"  type="text" name="name" value="<?php echo $carving['name_of_artist']; ?>" /><br /><br />
          <label>Year work produced</label>
          <input  readonly="readonly" type="text" name="year" value="<?php echo $carving['year_work_produced']; ?>" /><br /><br />
          <label>Subject Classification</label>
          <input  readonly="readonly" type="text" name="subject" value="<?php echo $carving['subject_classification']; ?>" /><br /><br />
          <label>Description</label>
          <input  readonly="readonly" type="text" name="description" value="<?php echo $carving['description']; ?>" /><br /><br />
          <label>Auciton date</label>
          <input readonly="readonly"  type="text" name="auction_date" value="<?php echo $carving['auction_date']; ?>" /><br /><br />
          <label>Estimated Price</label>
          <input  readonly="readonly" type="text" name="estimated_price" value="<?php echo $carving['estimated_price']; ?>" /><br /><br />
          <label>Material</label>
          <input readonly="readonly"  type="text" name="material" value="<?php echo $carving['material']; ?>" /><br /><br />
          <label>Height dimension</label>
          <input readonly="readonly"  type="text" name="height" value="<?php echo $carving['height_dimension']; ?>" /><br /><br />
          <label>Length dimension</label>
          <input readonly="readonly"  type="text" name="length" value="<?php echo $carving['length_dimension']; ?>" /><br /><br />
          <label>Width dimension</label>
          <input readonly="readonly"  type="text" name="width" value="<?php echo $carving['width_dimension']; ?>" /><br /><br />
          <label>Weight</label>
          <input readonly="readonly"  type="text" name="weight" value="<?php echo $carving['weight']; ?>" /><br /><br />
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
<!-- Updates all the carving records to set the auction to the auction selected within the previous table -->
<?php


if (isset($_POST['edit'])) {

        $stmt = $pdo->prepare('UPDATE carvings
                                SET Auction = :Auction,
                                status = "pending"

                                   WHERE idcarvings= '.$_POST['id'].'
                        ');

        $criteria = [
         'Auction' => $_POST['auction']

        ];

        $stmt->execute($criteria);
echo '<a > Carving record has been updated and added to the auction :'.$_POST['auction'].'</a>';


}
}
else{
  header('location:../login.php');
}
?>


</div>
</div>
