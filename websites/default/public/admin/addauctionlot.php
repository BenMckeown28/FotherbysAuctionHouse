<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='auctionlot';
require '../config.php';
require '../headers/header.php';
?>
<head>

<!--selected, S. (2019). Show input field only if a specific option is selected. [online]
 Stack Overflow. Available at: https://stackoverflow.com/questions/29321494/show-input-field-only-if-a-specific-option-is-selected
 [Accessed 4 May 2019]. -->
<script>
/* Script to check against a select box to see which selections is made. Will show the relevent fields when pressed */
  function yesnoCheck(that) {


      if (that.value == "drawing") {

          document.getElementById("drawing").style.display = "block";
      } else {
          document.getElementById("drawing").style.display = "none";
      }

      if (that.value == "Paintings") {

          document.getElementById("Paintings").style.display = "block";
      } else {
          document.getElementById("Paintings").style.display = "none";
      }

      if (that.value == "Photographic") {

          document.getElementById("Photographic").style.display = "block";
      } else {
          document.getElementById("Photographic").style.display = "none";
      }

      if (that.value == "Sculptures") {

          document.getElementById("Sculptures").style.display = "block";
      } else {
          document.getElementById("Sculptures").style.display = "none";
      }

      if (that.value == "Carvings") {

          document.getElementById("Carvings").style.display = "block";
      } else {
          document.getElementById("Carvings").style.display = "none";
      }



      }


</script>
</head>
<body>
  <h2>Add auction lot</h2>
<div class="con">



<div class="formadd">
<!-- Selects all the auctions within the table -->
<form action="addauctionlot.php" method="post">
    <label>Auction</label><br />
  <select name="auction">
    <?php
  $auctions=$pdo->query('SELECT * FROM Auction');
foreach($auctions as $row){

echo '<option value="'.$row['idAuction'].'">
'.$row['Auction_Name'].'
</option>';
}
?>

</select>
<br />
  <label>Name of artist</label><br />
  <input required type="text" name="artist"  /><br />
  <label>Year of the work was produced</label><br />
  <input required type="text" name="year"  /><br />
  <label>Subject clasification of the piece</label><br />
  <select required name="clasification">
<option>
  Landscape
</option>
<option>
  Seascape
</option>
<option>
Portrait
</option>
<option>
  Figure
</option>
<option>
  Still Life
</option>
<option>
  Nude
</option>
<option>
  Animal
</option>
<option>
  Abstract
</option>
<option>
  Other
</option>


</select> <br />
  <label>Description</label><br />
  <textarea cols="80" rows="10" name="description" ></textarea><br /><br />
  <label>Estimated price (£)</label><br />
  <input required type="text" name="price"  /><br />

<br />
<label>Choose a category for the item to be auctioned in :</label>
<select name="category" onchange="yesnoCheck(this);">
    <option value="drawing">Drawings</option>
    <option value="Paintings">Paintings</option>
    <option value="Photographic">Photographic Images</option>
    <option value="Sculptures">Sculptures</option>
    <option value="Carvings">Carvings</option>

</select>




<div id="drawing" style="display:none;">
  <br />    <label for="medium">Drawing medium</label><br />
<select name="mediumdraw">
<option>
  Pencil
</option>
<option>
  Ink
</option>
<option>
  Charcoal
</option>
<option>
  Other
</option>
</select><br />
<label>Framed ?</label><br />
<select name="frameddraw"><br />
  <option>
    Yes
  </option>
  <option>
    No
  </option>
</select><br />
<label>Dimensions</label><br />
<label>Height(cm)</label><br />
<input type="text" name="heightdraw" /><br />
<label>Width(cm)</label><br />
<input type="text" name="widthdraw" /><br />

</div>

<div id="Paintings" style="display:none;">
  <br />
  <label for="medium">Medium used</label><br />
<select name="mediumpaints">
<option>
oil
</option>
<option>
Acrylic
</option>
<option>
Watercolour
</option>
<option>
Other
</option>
</select><br />

<label>Framed ?</label><br />
<select name="framedpaints"><br />
  <option>
    Yes
  </option>
  <option>
    No
  </option>
</select><br />
<label>Dimensions</label><br />
<label>Height(cm)</label><br />
<input type="text" name="heightpaints" /><br />
<label>Width(cm)</label><br />
<input type="text" name="widthpaints" />
</div>

<div id="Photographic" style="display:none;">
<label>Type of image</label>
<select name="type">
  <option>
    Black and white
  </option>
  <option>
    Colour
  </option>
</select><br />
<label>Dimensions</label><br />
<label>Height(cm)</label><br />
<input type="text" name="heightphoto" /><br />
<label>Width(cm)</label><br />
<input type="text" name="widthphoto" />



</div>

<div id="Sculptures" style="display:none;">
  <br />
<label>Material Used</label>
<br />
<select name="material">
<option>
  Bronze
</option>
<option>
  Marble
</option>
  <option>
    Pewter
  </option>
  <option>
    Other
  </option>
</select><br />
<label>Dimensions</label><br />
<label>Height(cm)</label><br />
<input type="text" name="sculpheight" /><br />
<label>Length(cm)</label><br />
<input type="text" name="sculplength" /><br />
<label>Width(cm)</label><br />
<input type="text" name="sculpwidth" /><br />
<label>Approximate weight of piece (kg)</label><br />
<input type="text" name="sculpweight" />
</div>

<div id="Carvings" style="display:none;">
  <br />
  <label>Material</label><br />
  <select name="materialcarv">
<option>
  Oak
</option>
<option>
  Beach
</option>
<option>
  Pine
</option>
<option>
  Willow
</option>
<option>
  Other
</option>

  </select><br />

  <label>Dimensions</label><br />
  <label>Height(cm)</label><br />
  <input type="text" name="carvheight" /><br />
  <label>Length(cm)</label><br />
  <input type="text" name="carvlength" /><br />
  <label>Width(cm)</label><br />
  <input type="text" name="carvwidth" /><br />

  <label>Approximate weight of piece (kg)</label><br />
  <input type="text" name="carvweight" /><br />
</div> <br /> <br />
<input type="submit" name="add" value="Add auction lot" />

</div>
</div>
<?php



/* Queries to insert data into their specific details depending what category is selected within the system */

if(isset($_POST{'add'})){
  if($_POST['category'] == "drawing"){
  $id= $_POST['auction'];


$date=$pdo->query('SELECT * FROM Auction WHERE idAuction = "'.$id.'"');
foreach($date as $row){
$auctionname= $row['Auction_Name'];
$auctiondate=$row['Date_Of_Auction'];

}
    $stmt = $pdo->prepare('INSERT INTO Drawings (Name_of_artist, Year_work_produced,subject_classification,description,auction_date,estimated_price,Drawing_medium,framed,Height_dimension,Length_dimension,Auction,status,category )
        VALUES (:Name_of_artist,:Year_work_produced,:subject_classification,:description,:auction_date,:estimated_price,:Drawing_medium,:framed,:Height_dimension,:Length_dimension,:Auction,:status,:category)');
    $drawing = [
    'Name_of_artist' => $_POST['artist'],
    'Year_work_produced' => $_POST['year'],
     'subject_classification'=> $_POST['clasification'],
      'description'=> $_POST['description'],
      'auction_date'=> $auctiondate,
      'estimated_price'=>$_POST['price'],
        'Drawing_medium'=>$_POST['mediumdraw'],
        'framed'=>$_POST['frameddraw'],
        'Height_dimension'=>$_POST['heightdraw'],
        'Length_dimension'=>$_POST['widthdraw'],
        'Auction'=>$auctionname,
        'status'=> "pending",
        'category'=> "drawings"

    ];

$stmt->execute($drawing);

  echo 'Auction added';

  }

    if($_POST['category'] == "Paintings"){
      $id= $_POST['auction'];


    $date=$pdo->query('SELECT * FROM Auction WHERE idAuction = "'.$id.'"');
    foreach($date as $row){
    $auctionname= $row['Auction_Name'];
    $auctiondate=$row['Date_Of_Auction'];

    }
      $stmt = $pdo->prepare('INSERT INTO Paintings (Name_of_artist, Year_work_produced,subject_classification,description,auction_date,estimated_price,medium_used,framed,height_dimension,length_dimension,Auction,status,category )
          VALUES (:Name_of_artist,:Year_work_produced,:subject_classification,:description,:auction_date,:estimated_price,:medium_used,:framed,:height_dimension,:length_dimension,:Auction,:status,:category)');
      $painting = [

      'Name_of_artist' => $_POST['artist'],
      'Year_work_produced' => $_POST['year'],
       'subject_classification'=> $_POST['clasification'],
        'description'=> $_POST['description'],
          'auction_date'=> $auctiondate,
        'estimated_price'=>$_POST['price'],
          'medium_used'=>$_POST['mediumpaints'],
          'framed'=>$_POST['framedpaints'],
          'height_dimension'=>$_POST['heightpaints'],
          'length_dimension'=>$_POST['widthpaints'],
          'Auction'=>$auctionname,
'status'=> "pending",
'category'=>"paintings"
      ];

  $stmt->execute($painting);




  echo 'Auction added';
}

if($_POST['category'] == "Photographic"){
  $id= $_POST['auction'];


$date=$pdo->query('SELECT * FROM Auction WHERE idAuction = "'.$id.'"');
foreach($date as $row){
$auctionname= $row['Auction_Name'];
$auctiondate=$row['Date_Of_Auction'];

}
  $stmt = $pdo->prepare('INSERT INTO Photographic_Images (Name_of_artist, Year_work_produced,subject_classification,description,auction_date,estimated_price,type_of_image,height_dimension,length_dimension,Auction,status,category )
      VALUES (:Name_of_artist,:Year_work_produced,:subject_classification,:description,:auction_date,:estimated_price,:type_of_image,:height_dimension,:length_dimension,:Auction,:status,:category)');
  $photo = [

  'Name_of_artist' => $_POST['artist'],
  'Year_work_produced' => $_POST['year'],
   'subject_classification'=> $_POST['clasification'],
    'description'=> $_POST['description'],
      'auction_date'=> $auctiondate,
    'estimated_price'=>$_POST['price'],
      'type_of_image'=>$_POST['type'],
      'height_dimension'=>$_POST['heightphoto'],
      'length_dimension'=>$_POST['widthphoto'],
      'Auction'=>$auctionname,
'status'=> "pending",
'category'=>"Photographic_Images"
  ];

$stmt->execute($photo);



  echo 'Auction added';
}

if($_POST['category'] == "Sculptures"){
  $id= $_POST['auction'];


$date=$pdo->query('SELECT * FROM Auction WHERE idAuction = "'.$id.'"');
foreach($date as $row){
$auctionname= $row['Auction_Name'];
$auctiondate=$row['Date_Of_Auction'];

}
$stmt = $pdo->prepare('INSERT INTO sculptures (Name_of_artist, year_of_work,subject_classification,description,auction_date,estimated_price,material,height_dimension,length_dimension,width_dimension,weight,Auction,status,category )
    VALUES (:Name_of_artist,:year_of_work,:subject_classification,:description,:auction_date,:estimated_price,:material,:height_dimension,:length_dimension,:width_dimension,:weight,:Auction,:status,:category)');
$sculptures = [

'Name_of_artist' => $_POST['artist'],
'year_of_work' => $_POST['year'],
 'subject_classification'=> $_POST['clasification'],
  'description'=> $_POST['description'],
      'auction_date'=> $auctiondate,
  'estimated_price'=>$_POST['price'],
    'material'=>$_POST['material'],
    'height_dimension'=>$_POST['sculpheight'],
    'length_dimension'=>$_POST['sculplength'],
    'width_dimension'=>$_POST['sculpwidth'],
    'weight'=>$_POST['sculpweight'],
    'Auction'=>$auctionname,
'status'=> "pending",
'category'=>"sculptures"
];

$stmt->execute($sculptures);


  echo 'Auction added';

}

if($_POST['category'] == "Carvings"){
  $id= $_POST['auction'];


$date=$pdo->query('SELECT * FROM Auction WHERE idAuction = "'.$id.'"');
foreach($date as $row){
$auctionname= $row['Auction_Name'];
$auctiondate=$row['Date_Of_Auction'];

}
  $stmt = $pdo->prepare('INSERT INTO carvings (Name_of_artist, Year_work_produced,subject_classification,description,auction_date,estimated_price,material,height_dimension,length_dimension,width_dimension,weight,Auction,status,category )
      VALUES (:Name_of_artist,:Year_work_produced,:subject_classification,:description,:auction_date,:estimated_price,:material,:height_dimension,:length_dimension,:width_dimension,:weight,:Auction,:status,:category)');
  $carvings= [

  'Name_of_artist' => $_POST['artist'],
  'Year_work_produced' => $_POST['year'],
   'subject_classification'=> $_POST['clasification'],
    'description'=> $_POST['description'],
        'auction_date'=> $auctiondate,
    'estimated_price'=>$_POST['price'],
      'material'=>$_POST['materialcarv'],
      'height_dimension'=>$_POST['carvheight'],
      'length_dimension'=>$_POST['carvlength'],
      'width_dimension'=>$_POST['carvwidth'],
      'weight'=>$_POST['carvweight'],
      'Auction'=>$auctionname,
'status'=> "pending",
'category'=> "carvings"
  ];

  $stmt->execute($carvings);



  echo 'Auction added';
}

}
}
else{
  header('location:../login.php');
}
 ?>
</form>

</body>
