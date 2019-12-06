<!-- Removes the record from carvings where the id is set to the id within the url -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$update=$pdo->query('DELETE FROM carvings WHERE idcarvings = "'.$id.'"  ');
header("location:carvings.php");
?>
