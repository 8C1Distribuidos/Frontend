<?php
  
  $filename = $_POST['filename'];
  if($_FILES["file"]!=null){
    unlink($filename);
    if(move_uploaded_file($_FILES["file"]["tmp_name"],$filename)) 
    echo 1;
  }

 ?>