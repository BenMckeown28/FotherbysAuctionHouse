<?php
ob_start();
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
  <img class="logo" src="images/logo2.png" />
</li>
</nav>


<?php
$first_num= rand(1,10);
$second_num=rand(1,10);
$operators = array("+","-","*");
$operator=rand(0 , count($operators)-1);
$operator = $operators[$operator];

$answer = 0;
switch($operator){
  case "+":
  $answer =$first_num + $second_num;
  break;
  case "-":
  $answer = $first_num - $second_num;
  break;
  case "*":
  $answer = $first_num * $second_num;
  break;
}



require 'functions/loadTemplate.php';
echo '<h2>Login</h2>';
  echo '<div class="flex-container">';
echo '<div class="sidenav2">
</div>';
echo '<div class="content2">';
echo '<div class="logform">';
require 'templates/login.html.php';




/* User has inputted their username and password correctly, it should take them to the next login stage */

if(isset($_POST['submit'])){


$stmt=$pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
$user=$pdo->query('SELECT username FROM user');
$pass=$pdo->query('SELECT password FROM user');
$validUser = [
'username' => $_POST['username'],
'password' =>  $_POST['password']
];
$stmt->execute($validUser);
// will find rows which are related to admins through the letter A
if ($stmt->rowCount() > 0)
 {
$_SESSION['loggedin'] = true;
$_SESSION['username'] = $_POST['username'];
// confirmation that the admin has logged in
  header('location:2ndstep.php');
  echo 'You are now logged in';

}
else{
  echo "Invalid username or password, please input a valid username and password";
}
}







?>
</div>
</div>
</div>
