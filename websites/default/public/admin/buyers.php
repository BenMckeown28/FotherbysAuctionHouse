<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='buyers';
require '../headers/header.php';
 ?>
<h2>Buyers</h2>
<?php
echo '
<form action="buyers.php" method="post">
<div class="search">
  <input id="search" onkeyup="showHint(this.value)" autocomplete="off" name="query" type="text" placeholder="Search " />
  <input id="submit" name="submit" type="submit" value="Search" />
<a href="addbuyer.php">Add</a>
  </div>
</form>
'
?>

<div class="con">
  <div class="tableview">
<table id="tableid" width="100%">
  <tr>
    <th>
      Row Number
    </th>
     <th>Firstname</th>
     <th>surname</th>
     <th>email_address</th>
   <th>Telephone_number</th>
    <th>UserID</th>
        <th>action</th>
<!-- Selects all the records from the buyers table -->
<?php
require '../config.php';

$results = $pdo->query('SELECT * FROM buyers');
$i=1;
foreach($results as $row){
echo  '<tr id="wrapper">'.
'<td> <a>'.$i .'</a></td>'.
      '<td> <a>'.$row['Firstname'] .'</a></td>'.
      '<td><a>'. $row['surname'].'</a></td>'.
      '<td><a>'.$row['email_address'] .'</a></td>'.
      '<td><a>'.$row['Telephone_number'] .'</a></td>'.
      '<td><a>'.$row['type'].$row['idbuyers'] .'</a></td>' ;
        echo '<td><a href="deletebuyer.php?id='.$row['idbuyers'].'">Remove</a>
<a href="editbuyer.php?id=' . $row['idbuyers'] .'">Edit</a>.</td>
</tr>';
$i++;
}






if(isset($_POST['submit'])){
$query = $_POST['query'];
$query = htmlspecialchars($query);
?>
<script>
var Parent = document.getElementById("tableid");
while(Parent.hasChildNodes())
{
   Parent.removeChild(Parent.firstChild);
}

</script>
<table id="tableid" width="100%">
  <tr>
     <th>Firstname</th>
     <th>surname</th>
     <th>email_address</th>
   <th>Telephone_number</th>
    <th>UserID</th>

<?php
$raw_results= $pdo->query('SELECT * FROM buyers WHERE
Firstname  LIKE "'.'%'.$query.'%'.'"
OR surname LIKE "'.'%'.$query.'%'.'"
OR email_address LIKE "'.'%'.$query.'%'.'"
OR Telephone_number LIKE "'.'%'.$query.'%'.'"
OR UserID LIKE "'.'%'.$query.'%'.'"

 '
);

foreach($raw_results as $row){
  echo  '<tr id="wrapper">'.
        '<td> <a>'.$row['Firstname'] .'</a></td>'.
        '<td><a>'. $row['surname'].'</a></td>'.
        '<td><a>'.$row['email_address'] .'</a></td>'.
        '<td><a>'.$row['Telephone_number'] .'</a></td>'.
        '<td><a>'.$row['UserID'] .'</a></td>' ;
          echo '<td>.<a href="delete.php?id=' . $row['idsculptures'] .'">Delete sculpture</a>.</td>';
  echo '<td>.<a href="editsculpture.php?id=' . $row['idsculptures'] .'">Edit Sculpture</a>.</td>';
  echo '<td>.<a href="viewsculpture.php?id=' . $row['idsculptures'] .'">View Sculpture</a>.</td>;
  </tr>';


}

}
}
else{
  header('location:../login.php');
}

?>


</table>
</div>
</div>
