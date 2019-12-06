<?php

require '../config.php';

 ?>
<html>

<head>
  <title>Fotherbys Auction House</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../style.css" />
</head>


<body>
  <nav class="headernav">
    <ul>
    <li>
  <img class="logo" src="../images/logo2.png" />
    </li>
    <div class="logged">

    <li>

<!-- If the user is logged in then the system will show who is logged into the system -->
<?php
if(isset($_SESSION['loggedin'])== true) {
echo '
      <li>

      <a>User logged in as :'." ".$_SESSION['username'].'</a></li>
        <a href="../logout2.php">Logout</a>';
}else{
        ?>
        <button type="submit" onclick="location.href='login.php'">Login</button>
    </li>
<?php  } ?>
  </div>

    </ul>

  </nav>
  <div class="flex-container">

  <div class="sidenav">

  <nav class="column">
<!-- Based on what poge the user is on will display as highlighted within the sidebar -->

  <ul>
    <a href="HomeAdmin.php">
    <li class= "<?php
if($page == 'home') {echo 'active2' ;}
           ?>">
      Home
    </li>
    <a href="addauctionlot.php">
    <li class= "<?php
if($page == 'auctionlot') {echo 'active2' ;}
           ?>">
      Adding auction lot
    </li>
    </a>
    <a href="addauction.php">
    <li class="<?php
if($page == 'auctionadd') {echo 'active2' ;}
           ?>">
      Add Auction
    </li>
    </a>
    <a href="auctions.php">
    <li class="<?php
if($page == 'auctions') {echo 'active2' ;}
           ?>">
      Auctions
    </li>
    </a>

      <a href="carvings.php">
    <li class="<?php
if($page == 'carvings') {echo 'active2' ;}
           ?>">
    Carvings
    </li>
    </a>
      <a href="Drawings.php">
    <li class="<?php
if($page == 'drawings') {echo 'active2' ;}
           ?>">
    Drawings
    </li>
    </a>
    <a href="paintings.php">
    <li class="<?php
if($page == 'paintings') {echo 'active2' ;}
           ?>">
      Paintings
    </li>
    </a>
      <a href="photos.php">
    <li class="<?php
if($page == 'photos') {echo 'active2' ;}
           ?>">
    Photographic Images
    </li>
    </a>
      <a href="sculptures.php">
    <li class="<?php
if($page == 'sculptures') {echo 'active2' ;}
           ?>">
    Sculptures
    </li>
    </a>
    <a class="dropdown" href="buyers.php">
    <li class="<?php
if($page == 'buyers') {echo 'active2' ;}
           ?>">
      Buyers
    </li>
    </a>
    <a href="sellers.php">
    <li class="<?php
if($page == 'sellers') {echo 'active2' ;}
           ?>">
      Sellers
    </li>
    </a>
    <a href="solditems.php">
    <li class="<?php
if($page == 'sold') {echo 'active2' ;}
           ?>">
      Sold Items
    </li>
    </a>
  </a>

  <a href="unassigned.php">
  <li class="<?php
if($page == 'unassigned') {echo 'active2' ;}
         ?>">
    Unassigned
  </li>
  </a>
  </ul>

  </nav>

</div>
<div class="content">
