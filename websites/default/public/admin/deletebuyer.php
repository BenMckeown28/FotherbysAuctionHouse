<!-- Delete a record from buyers where the id is chosen depending on the record which has been chosen -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
 $delete=$pdo->query('DELETE FROM buyers WHERE idbuyers = '. $_GET['id'])->fetch()  ;
header("location:buyers.php");



       ?>
