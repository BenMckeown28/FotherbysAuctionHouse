<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
/* Selects the record from the buyers table and imports the relevent data into the form */
$page='buyers';
require "../config.php";
require '../headers/header.php';
   $sculpture= $pdo->query('SELECT * FROM buyers WHERE idbuyers = '. $_GET['id'])->fetch()  ;
$id =$_GET['id'] ;
?>
<div class="con">
<div class="formadd">
<form action="" method="POST" >

          <input type="hidden" name="id" value="<?php echo $sculpture['idbuyers']; ?>"  />
          <label>BuyerID</label>
          <input readonly="readonly"  type="text" name="lotnumber" value="<?php echo $sculpture['type'].$sculpture['idbuyers'] ?>" /><br /><br />
          <label>Firstname</label>
          <input  type="text" name="Firstname" value="<?php echo $sculpture['Firstname']; ?>" /><br /><br />
          <label>surname</label>
          <input  type="text" name="surname" value="<?php echo $sculpture['surname']; ?>" /><br /><br />
          <label>Email address</label>
          <input  type="text" name="email" value="<?php echo $sculpture['email_address']; ?>" /><br /><br />
          <label>Telephone </label>
          <input  type="text" name="telephone" value="<?php echo $sculpture['Telephone_number']; ?>" /><br /><br />
          <label>UserID </label>
          <input  type="text" name="userid" value="<?php echo $sculpture['userID']; ?>" /><br /><br />
          <label>Username </label>
          <input  type="text" name="username" value="<?php echo $sculpture['usernamepub']; ?>" /><br /><br />
          <label>Password </label>
          <input  type="text" name="password" value="<?php echo $sculpture['password']; ?>" /><br /><br />
          <label>Security question </label>
          <input  type="text" name="question" value="<?php echo $sculpture['question']; ?>" /><br /><br />
          <label>Security answer </label>
          <input  type="text" name="answer" value="<?php echo $sculpture['answer']; ?>" /><br /><br />


<input type="submit" name="submit" value="Edit" />


        </form>

      </div>
      </div>

<?php

/* An update query to update the buyers table and all the new data which has been inputted into the form */

if(isset($_POST['submit'])) {

       $stmt = $pdo->prepare('UPDATE buyers
                               SET
                                  Firstname= :Firstname,
                                  surname = :surname,
                                  email_address= :email_address,
                                  Telephone_number = :Telephone_number,
                                  userID = :userID,
                                  usernamepub = :usernamepub,
                                  password = :password,
                                  question = :question,
                                  answer = :answer



                                  WHERE idbuyers= '.$_GET['id'].'
                       ');

       $criteria = [

            'Firstname'=> $_POST['Firstname'],
            'surname' => $_POST['surname'],
            'email_address'=> $_POST['email'],
            'Telephone_number' => $_POST['telephone'],
            'userID' => $_POST['userid'],
            'usernamepub' => $_POST['username'],
            'password' => $_POST['password'],
            'question'=> $_POST['question'],
            'answer'=>$_POST['answer']
       ];

       $stmt->execute($criteria);

echo 'Record edited';
}
}
else{
  header('location:../login.php');
}

?>
