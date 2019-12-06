
<!-- A query to update the carvings status to approve when button is pressed on the carvings main page -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$update=$pdo->query('UPDATE carvings SET status = "approved" WHERE idcarvings = "'.$id.'"  ');
header("location:carvings.php");
?>
