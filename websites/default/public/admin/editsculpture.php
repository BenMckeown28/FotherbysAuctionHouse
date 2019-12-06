<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

/* Selects all the records from the sculptures table and imports the data into the form where the user can edit any field as they wish */
$page='sculptures';
require "../config.php";
   $sculpture= $pdo->query('SELECT * FROM sculptures WHERE idsculptures= '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>

<form action="" method="POST" >

          <input type="hidden" name="id" value="<?php echo $sculpture['idsculptures']; ?>"  />
          <label>lotnumber</label>
          <input  type="text" name="lot" value="<?php echo $sculpture['lotnumber']; ?>" /><br /><br />
          <label>Name of artist</label>
          <input  type="text" name="name" value="<?php echo $sculpture['name_of_artist']; ?>" /><br /><br />
          <label>Year of work</label>
          <input  type="text" name="year" value="<?php echo $sculpture['year_of_work']; ?>" /><br /><br />
          <label>Subject Classification</label>
          <input  type="text" name="subject" value="<?php echo $sculpture['subject_classification']; ?>" /><br /><br />
          <label>Description</label>
          <input  type="text" name="description" value="<?php echo $sculpture['description']; ?>" /><br /><br />
          <label>Auciton date</label>
          <input  type="text" name="auction_date" value="<?php echo $sculpture['auction_date']; ?>" /><br /><br />
          <label>Estimated Price</label>
          <input  type="text" name="estimated_price" value="<?php echo $sculpture['estimated_price']; ?>" /><br /><br />
          <label>Material</label>
          <input  type="text" name="material" value="<?php echo $sculpture['material']; ?>" /><br /><br />
          <label>Height dimension</label>
          <input  type="text" name="height" value="<?php echo $sculpture['height_dimension']; ?>" /><br /><br />
          <label>Length dimension</label>
          <input  type="text" name="length" value="<?php echo $sculpture['length_dimension']; ?>" /><br /><br />
          <label>Width dimension</label>
          <input  type="text" name="width" value="<?php echo $sculpture['width_dimension']; ?>" /><br /><br />
          <label>Weight</label>
          <input  type="text" name="weight" value="<?php echo $sculpture['weight']; ?>" /><br /><br />
<input type="submit" name="edit" value="edit" />
        </form>
<!-- Updates the sculptures record (depending on the id within the url) -->
<?php
if (isset($_POST['edit'])) {

       $stmt = $pdo->prepare('UPDATE sculptures
                               SET lotnumber = :lotnumber,
                                  name_of_artist= :name_of_artist,
                                  year_of_work = :year_of_work,
                                  subject_classification= :subject_classification,
                                  description = :description,
                                  auction_date = :auction_date,
                                  estimated_price = :estimated_price,
                                  material = :material,
                                  height_dimension = :height_dimension,
                                  length_dimension = :length_dimension,
                                  width_dimension = :width_dimension,
                                  weight=:weight


                                  WHERE idsculptures = '.$_POST['id'].'
                       ');

       $criteria = [
        'lotnumber' => $_POST['lot'],
            'name_of_artist'=> $_POST['name'],
            'year_of_work' => $_POST['year'],
            'subject_classification'=> $_POST['subject'],
            'description' => $_POST['description'],
            'auction_date' => $_POST['auction_date'],
            'estimated_price' => $_POST['estimated_price'],
            'material' => $_POST['material'],
            'height_dimension'=> $_POST['height'],
            'length_dimension'=>$_POST['length'],
            'width_dimension'=>$_POST['width'],
            'weight'=>$_POST['weight']
       ];

       $stmt->execute($criteria);

echo 'Record edited';
}
}
else{
  header('location:../login.php');
}
?>
