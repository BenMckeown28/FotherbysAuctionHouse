<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='buyers';
require '../config.php';
require '../headers/header.php';
?>
</head>
<body>
  <h2>Add Buyer</h2>
<div class="con">



<div class="buyadd">

<form action="addbuyer.php" method="post">
  <label>Firstname</label><br />
  <input type="text" name="firstname"  /><br />
  <label>Surname</label><br />
  <input type="text" name="surname"  /><br />
  <label>Email Address</label><br />
  <input type="text" name="email"  /><br />
  <label>Telephone number</label><br />
  <input type="text" name="telephone"  /><br />
  <label>User ID</label><br />
  <input type="text" name="userid"  /><br />
  <input type="submit" name="submit" />
</form>

</div>
</div>
<!-- An insert query to insert data into the buyers table -->
 <?php
 if(isset($_POST['submit'])){
$add=$pdo->prepare('INSERT INTO buyers(Firstname,surname,email_address,Telephone_number)
VALUES (:Firstname,:surname,:email_address,:Telephone_number)');

$buyer = [
'Firstname'=>$_POST['firstname'],
'surname'=>$_POST['surname'],
'email_address'=>$_POST['email'],
'Telephone_number'=>$_POST['telephone']

];


$add->execute($buyer);

echo "Buyer has been added to the system";
}
}
else{
  header('location:../login.php');
}
 ?>
