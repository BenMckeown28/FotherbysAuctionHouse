<?php

require "config.php";
require 'headers/publicheader.php';
   $sculpture= $pdo->query('SELECT * FROM Photographic_Images WHERE idPhotographic_Images= '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>
<h2><?php echo $sculpture['lotnumber'] .$sculpture['idPhotographic_Images'];  ?></h2>
<div class="con">

<div class="formadd">
<form action="" method="POST" >

          <input type="hidden" name="id" value="<?php echo $sculpture['idPhotographic_Images']; ?>"  />
          <label>lotnumber</label>
          <input readonly="readonly"  type="text" name="lotnumber" value="<?php echo $sculpture['lotnumber'].$sculpture['idPhotographic_Images']; ?>" /><br /><br />
          <label>Name of artist</label>
          <input readonly="readonly" type="text" name="name_of_artist" value="<?php echo $sculpture['name_of_artist']; ?>" /><br /><br />
          <label>Year of work</label>
          <input readonly="readonly" type="text" name="year_of_work" value="<?php echo $sculpture['year_work_produced']; ?>" /><br /><br />
          <label>Subject Classification</label>
          <input readonly="readonly" type="text" name="subject_classification" value="<?php echo $sculpture['subject_classification']; ?>" /><br /><br />
          <label>Description</label>
          <textarea rows="10" cols="80" readonly name="description"> <?php echo $sculpture['description']; ?></textarea>
          <label>Auciton date</label>
          <input readonly="readonly" type="text" name="auction_date" value="<?php echo $sculpture['auction_date']; ?>" /><br /><br />
          <label>Estimated Price (£)</label>
          <input readonly="readonly" type="text" name="estimated_price" value="<?php echo $sculpture['estimated_price']; ?>" /><br /><br />
          <label>Type of Image</label>
          <input readonly="readonly" type="text" name="material" value="<?php echo $sculpture['type_of_image']; ?>" /><br /><br />
          <label>Height dimension</label>
          <input readonly="readonly" type="text" name="height" value="<?php echo $sculpture['height_dimension']; ?>" /><br /><br />
          <label>Length dimension</label>
          <input readonly="readonly" type="text" name="length" value="<?php echo $sculpture['length_dimension']; ?>" /><br /><br />

        </form>
      </div>
        <div class="placehold2">
          Placehold image
        </div>
</div>

<?php

if (isset($_SESSION['loggedin2']) && $_SESSION['loggedin2'] == true){
  echo'
  <div class="leave">

  <div class="commisbid">

  <form method="post">
  <label>
    Place a commision bid:
  </label>

  <input type="text" name="bid" />
  <input type="submit" name="submit" value="Bid" />
  </form>

  </div>

  </div>
';

if(isset($_POST['submit'])){

$date=date('y,m,d');


if($_POST['bid'] > $sculpture['estimated_price']){

  $lotnum = $sculpture['lotnumber'] ;
  $lotid = $sculpture['idPhotographic_Images'];

  $lot = $lotnum.$lotid ;

$insert=$pdo->prepare('INSERT INTO commision_bids(username,lotnumber,date_bid,commision_bid)
  VALUES  (:username,:lot,:date_bid,:commision_bid)');

$criteria = [
'username'=> $_SESSION['username'],
'lot'=>$lot,
'date_bid'=>$date,
'commision_bid'=>$_POST['bid']
];

$insert->execute($criteria);

echo 'Commision bid has been made';


}
else{
  echo 'Bid too low must be over estimated price';
}




}




}
?>
