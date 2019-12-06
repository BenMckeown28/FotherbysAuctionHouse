<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='paintings';
require "../config.php";
require '../headers/header.php';
   $sculpture= $pdo->query('SELECT * FROM Paintings WHERE idPaintings = '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>
<div class="con">
<div class="formadd">
<form action="" method="POST" >

          <input type="hidden" name="id" value="<?php echo $sculpture['idPaintings']; ?>"  />
          <label>lotnumber</label>
          <input readonly="readonly"  type="text" name="lotnumber" value="<?php echo $sculpture['lotnumber'] .$sculpture['idPaintings']; ?>" /><br /><br />
          <label>Name of artist</label>
          <input  type="text" name="name_of_artist" value="<?php echo $sculpture['Name_of_artist']; ?>" /><br /><br />
          <label>Year of work</label>
          <input  type="text" name="year_of_work" value="<?php echo $sculpture['year_work_produced']; ?>" /><br /><br />
          <label>Subject Classification</label>
          <input  type="text" name="subject_classification" value="<?php echo $sculpture['subject_classification']; ?>" /><br /><br />
          <label>Description</label>
            <textarea rows="10" cols="80" readonly name="description"> <?php echo $sculpture['description']; ?></textarea>
          <label>Auciton date</label>
          <input type="text" name="auction_date" value="<?php echo $sculpture['auction_date']; ?>" /><br /><br />
          <label>Estimated Price (£)</label>
          <input  type="text" name="estimated_price" value="<?php echo $sculpture['estimated_price']; ?>" /><br /><br />
          <label>Medium used</label>
          <input  type="text" name="medium_used" value="<?php echo $sculpture['medium_used']; ?>" /><br /><br />

          <label>Framed</label>
          <input  type="text" name="framed" value="<?php echo $sculpture['framed']; ?>" /><br /><br />
          <label>Height dimension (cm)</label>
          <input  type="text" name="height" value="<?php echo $sculpture['height_dimension']; ?>" /><br /><br />
          <label>Length dimension(cm)</label>
          <input  type="text" name="length" value="<?php echo $sculpture['length_dimension']; ?>" /><br /><br />


<input type="submit" name="submit" value="Edit" />

        </form>

</div>
</div>
        <h2>Commision bids made on Item</h2>
  <div class="tableview">

  <table>
    <th>
      Row Number
    </th>
    <th>
      Bid ID
    </th>
    <th>
      Bid ammount
    </th>
    <th>
      Bid made by
    </th>
    <th>
      Bid made on
    </th>

<!-- Selects all the records from the commission bids where the lotnumber is the same as the id of the carving record -->
  <?php
  $LOT=$sculpture['lotnumber'].$sculpture['idPaintings'];

  $results = $pdo->query('SELECT * FROM commision_bids WHERE lotnumber = "'.$LOT.'" ');

  $i=1;
  foreach($results as $row){
    echo  '<tr id="wrapper">'.
    '<td> <a>'.$i.'</a></td>'.
          '<td> <a>'.$row['code'].$row['idcommision_bids'].'</a></td>'.
          '<td><a> £'. $row['commision_bid'].'</a></td>'.
          '<td><a>'.$row['username'] .'</a></td>'.
          '<td><a>'.$row['date_bid'] .'</a></td>.
  </tr>';

  $i++;

  }










  echo '</table>';
  echo '</div>';

  ?>
  <?php

        if(isset($_POST['submit'])) {

               $stmt = $pdo->prepare('UPDATE Paintings
                                       SET
                                          Name_of_artist= :name_of_artist,
                                          year_work_produced = :year_work_produced,
                                          subject_classification= :subject_classification,
                                          description = :description,
                                          auction_date = :auction_date,
                                          estimated_price = :estimated_price,
                                          medium_used = :medium_used,
                                          framed = :framed,
                                          length_dimension = :length_dimension,
                                          height_dimension = :height_dimension



                                          WHERE idPaintings= '.$_GET['id'].'
                               ');

               $criteria = [

                    'name_of_artist'=> $_POST['name_of_artist'],
                    'year_work_produced' => $_POST['year_of_work'],
                    'subject_classification'=> $_POST['subject_classification'],
                    'description' => $_POST['description'],
                    'auction_date' => $_POST['auction_date'],
                    'estimated_price' => $_POST['estimated_price'],
                    'medium_used' => $_POST['medium_used'],
                    'framed'=> $_POST['framed'],
                    'length_dimension'=>$_POST['length'],
                    'height_dimension'=>$_POST['height']

               ];

               $stmt->execute($criteria);

        echo 'Record edited';
        }
      }
      else{
        header('location:../login.php');
      }



?>
