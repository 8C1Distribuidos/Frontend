<?php

include('db.php');
include("function.php");

if(isset($_POST["productos_id"]))
{
 $image = get_image_name($_POST["productos_id"]);
 if($image != '')
 {
  unlink("upload/" . $image);
 }
 $statement = $connection->prepare(
  "DELETE FROM productos WHERE id = :id"
 );
 $result = $statement->execute(
  array(
   ':id' => $_POST["productos_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>