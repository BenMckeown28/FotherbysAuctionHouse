<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

$page='sculptures';
require '../headers/header.php';
?>
<h2>Sculptures</h2>
<div class="buttons">
<ul class="buttons">
  <a href="sculptures.php">
    <div class="active">

<li >
  Pending
</li>

</div>


</a>
<a href="approvedsculptures.php">
  <li>
    Approved
  </li>
</a>

</ul>
</div>



<div class="con">
  <div class="tableview">

<table id="tableid" width="100%">
  <tr>
    <th>
      Row Number
    </th>
     <th>lotnumber</th>
     <th>Name of artist</th>
     <th>Year work was produced</th>
   <th>Subject classification</th>

     <th>Auction date</th>
      <th>Estimated price</th>
          <th>Material</th>
       <th>Height Dimension(cm)</th>
        <th>Length Dimension(cm)</th>
         <th>Width Dimension(cm)</th>
          <th>weight</th>
            <th>Auction</th>
              <th>Status</th>
          <th>
            Action
          </th>

<!-- Selects all the records from the sculptures table where the status is set to pending -->
<?php
require '../config.php';

$results = $pdo->query('SELECT * FROM sculptures WHERE status = "pending" ');
$i=1;
foreach($results as $row){
echo  '<tr id="wrapper">'.
      '<td> <a>'.$i.'</a></td>'.
      '<td> <a>'.$row['lotnumber'].$row['idsculptures'].'</a></td>'.
      '<td><a>'. $row['name_of_artist'].'</a></td>'.
      '<td><a>'.$row['year_of_work'] .'</a></td>'.
      '<td><a>'.$row['subject_classification'] .'</a></td>'.
      '<td><a>'.$row['auction_date'] .'</a></td>'.
      '<td><a>'.$row['estimated_price'] .'</a></td>'.
      '<td><a>'.$row['material'] .'</a></td>'.
      '<td><a>'.$row['height_dimension'] .'</a></td>'.
      '<td><a>'.$row['length_dimension'] .'</a></td>'.
      '<td><a>'.$row['width_dimension'] .'</a></td>'.
        '<td><a>'.$row['weight'] .'</a></td>'.
        '<td><a>'.$row['Auction'] .'</a></td>'.
        '<td><a>'.$row['status'] .'</a></td>' ;
        echo '<ul>
        <td><li><a href="Approvesculpture.php?id=' . $row['idsculptures'] .'">Approve</a></li>
      <li><a href="removesculp.php?id=' . $row['idsculptures'] .'">Remove</a></li>
<li><a href="viewsculpture.php?id=' . $row['idsculptures'] .'">Edit</a></li></td></ul>
</tr>';
$i++;
}
/* Search bar results */
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
     <th>Lot Number</th>
     <th>Name of artist</th>
     <th>Year work was produced</th>
   <th>Subject classification</th>
    <th>Description</th>
     <th>Auction date</th>
      <th>Estimated price</th>
          <th>Material</th>
       <th>Height Dimension(cm)</th>
        <th>Length Dimension(cm)</th>
         <th>Width Dimension(cm)</th>
          <th>Weight(kg)</th>
          <th>
            Action
          </th>

<?php
$raw_results= $pdo->query('SELECT * FROM sculptures WHERE
lotnumber  LIKE "'.'%'.$query.'%'.'"
OR name_of_artist LIKE "'.'%'.$query.'%'.'"
OR year_of_work LIKE "'.'%'.$query.'%'.'"
OR subject_classification LIKE "'.'%'.$query.'%'.'"
OR description LIKE "'.'%'.$query.'%'.'"
OR auction_date LIKE "'.'%'.$query.'%'.'"
OR estimated_price LIKE "'.'%'.$query.'%'.'"
OR material LIKE "'.'%'.$query.'%'.'"
OR height_dimension LIKE "'.'%'.$query.'%'.'"
OR width_dimension LIKE "'.'%'.$query.'%'.'"
OR length_dimension LIKE "'.'%'.$query.'%'.'"
OR weight LIKE "'.'%'.$query.'%'.'"
 '
);

foreach($raw_results as $row){
  echo  '<tr id="wrapper">'.
        '<td> <a>'.$row['lotnumber'] .'</a></td>'.
        '<td><a>'. $row['name_of_artist'].'</a></td>'.
        '<td><a>'.$row['year_of_work'] .'</a></td>'.
        '<td><a>'.$row['subject_classification'] .'</a></td>'.
        '<td><a>'.$row['description'] .'</a></td>'.
        '<td><a>'.$row['auction_date'] .'</a></td>'.
        '<td><a>'.$row['estimated_price'] .'</a></td>'.
        '<td><a>'.$row['material'] .'</a></td>'.
        '<td><a>'.$row['height_dimension'] .'</a></td>'.
        '<td><a>'.$row['length_dimension'] .'</a></td>'.
        '<td><a>'.$row['width_dimension'] .'</a></td>'.
          '<td><a>'.$row['weight'] .'</a></td>' ;
          echo '<td>.<a href="delete.php?id=' . $row['idsculptures'] .'">Delete sculpture</a>';
  echo '<a href="editsculpture.php?id=' . $row['idsculptures'] .'">Edit Sculpture</a>';
  echo '<a href="viewsculpture.php?id=' . $row['idsculptures'] .'">View Sculpture</a>.</td>;
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
