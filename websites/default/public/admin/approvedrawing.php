<!-- Approves drawings and sets the status to approved -->
<?php
session_start();
require '../config.php';
$id = $_GET['id'];
$update=$pdo->query('UPDATE Drawings SET status = "approved" WHERE idDrawings = "'.$id.'"  ');
header("location:Drawings.php");
?>
