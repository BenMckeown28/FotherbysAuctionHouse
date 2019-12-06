<!-- Delete query to delete a record from sculptures -->
<?php
require '../config.php';
$id =$_GET['id'] ;
 $delete=$pdo->query('DELETE FROM sculptures WHERE idsculptures = '. $_GET['id'])->fetch()  ;
        echo 'Sculpture deleted';
        header('Location:sculptures.php');



       ?>
