<!-- Update the carvings record which is selected and set the status to pending -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$update=$pdo->query('UPDATE carvings SET status = "pending" WHERE idcarvings = "'.$id.'"  ');
header("location:carvings.php");

?>
