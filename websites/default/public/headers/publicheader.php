<?php
session_start();
require 'config.php';

 ?>
<html>

<head>
  <title>Fotherbys Auction House</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css" />
</head>


<body>
  <nav class="headernav">
    <ul>
    <li>
  <img class="logo" src="../images/logo2.png" />
    </li>
    <li class="titleh2">
<h2>Catalogue</h2>

</li>

</ul>
<ul>
<!-- If the user is logged in then the system will show who is logged into the system -->
<?php
if(isset($_SESSION['loggedin2'])== true) {
echo '
      <li>

      <a>User logged in as :'." ".$_SESSION['username2'].'</a></li>
        <a href="../logout2.php">Logout</a>';
}else{
        ?>
        <button type="submit" onclick="location.href='loginpub.php'">Login</button>
    </li>
<?php  } ?>
  </div>




    </ul>


  </nav>
  <div class="flex-container">

  <div class="sidenav">

  <nav class="column">

  <ul>
    <a href="index.php">
    <li>
    Home
    </li>
    </a>
    <a href="carvingspublic.php">
    <li>
    Carvings
    </li>
    </a>
      <a href="Drawingspublic.php">
    <li>
      Drawings
    </li>
    </a>
      <a href="paintingspublic.php">
    <li>
  Paintings
    </li>
    </a>
      <a href="photospublic.php">
    <li>
      Photographic Images
    </li>
    </a>
      <a href="sculpturespublic.php">
    <li>
    Sculptures
    </li>
  </a>
        <a href="Auctions.php">
    <li>
   Auctions
    </li>
    </a>
<h3>Filter options</h3>


    <form method="post">
    <label>Category</label>
    <select name="category">
<option>
carvings
</option>
<option>
Drawings
</option>
<option>
Paintings
</option>
<option>
Photographic_Images
</option>
<option>
sculptures
</option>
  </select><br /><br />
  <label>Date of Auction</label>
  <select name="date">
    <?php
$date=$pdo->query('SELECT Date_Of_Auction FROM Auction');
foreach($date as $row){
echo '<option>
'.$row['Date_Of_Auction'].'
</option>';
}
    ?>

  </select><br /><br />





<br />
  <label>Price</label> <br />
  <label>Min   £</label>
  <input required  type="text" name="min" value="" /><br />
  <label>Max   £</label>
  <input required type="text" name="max" value="" /><br />


    <input type="submit" name="filter" value="filter" />

    </form>

  </ul>
  </nav>
</div>

<!-- The system will print out the data which the user has inputted into the filter and it twill be displayed within the url -->
<?php
if(isset($_POST['filter'])){
  $url = "results.php";
  if (isset($_POST['category'])) {
    $url = $url . "?category=" . $_POST['category'];
  }
  if (isset($_POST['date'])) {
    $url = $url . "&date=" . $_POST['date'];
  }
  if (isset($_POST['min'])) {
    $url = $url . "&min=" . $_POST['min'];
  }
  if (isset($_POST['max'])) {
    $url = $url . "&max=" . $_POST['max'];
  }

?>
  <script type="text/javascript">
    window.location.href = "<?= $url ?>";
  </script>
<?php
}
?>


<div class="content">
