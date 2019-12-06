<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='sellers';
require '../config.php';
require '../headers/header.php';
?>
</head>
<body>
  <h2>Add Seller</h2>
<div class="con">



<div class="buyadd">

<form action="addseller.php" method="post">
  <label>Firstname</label><br />
  <input type="text" name="firstname"  /><br />
  <label>Surname</label><br />
  <input type="text" name="surname"  /><br />
  <label>Email Address</label><br />
  <input type="text" name="email"  /><br />
  <label>Telephone number</label><br />
  <input type="text" name="telephone"  /><br />

  <input type="submit" name="submit" />
</form>

</div>
</div>
<!--Insert query to insert data into the sellers table -->
 <?php
 if(isset($_POST['submit'])){
$add=$pdo->prepare ('INSERT INTO sellers (Firstname,Surname,email_address,Telephone_number)
VALUES (:Firstname,:Surname,:email_address,:Telephone_number)');

$buyer = [
'Firstname'=>$_POST['firstname'],
'Surname'=>$_POST['surname'],
'email_address'=>$_POST['email'],
'Telephone_number'=>$_POST['telephone']
];


$add->execute($buyer);

echo "Seller has been added to the system";
}
}
else{
  header('location:../login.php');
}
 ?>
