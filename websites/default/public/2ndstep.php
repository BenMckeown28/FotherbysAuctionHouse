<?php
require 'config.php';
session_start();
if($_SESSION['loggedin']==true){



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
  <img class="logo" src="images/logo.png" />
</li>
</nav>

<h2>Login</h2>
<div class="flex-container">
<div class="sidenav2">
</div>
  <div class="content2">
  <div class="logform">
    <!-- Displays the security question depending on the users details which were inputted in to the first  -->
    <?php
    $results = $pdo->query('SELECT * FROM user');
    foreach ($results as $row){
    echo $row['question'];
}

    ?>

<form action="2ndstep.php" method="post">
<input type="password" name="answer" />
<input type="submit" name="submit" />
</form>
<!-- Checks if the users input is correct, wont allow access to the admin system without the correct answer -->
<?php
$results = $pdo->query('SELECT * FROM user WHERE Username = "'.$_SESSION['username'].'" ');

foreach ($results as $row){
if(isset($_POST['submit'])){
$input = $_POST['answer'];
$answer=$row['answer'];
if($input == $answer)
{
  header('location:admin/HomeAdmin.php');
}

else{
  echo 'wrong answer';
}
}
}
}

?>
</div>
</div>
</div>
