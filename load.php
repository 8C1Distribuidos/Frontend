<?php
  
  $filename = $_POST['filename'];

  $target_directory = "upload/";
  $newfilename = $target_directory.$filename;

  $resource = "upload/".$filename;
    if(unlink($resource)) echo 1;
    else echo 2;
  if($_FILES["file"]!=null){
    if(move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename)) echo 1;
    else echo 2;
  }


 ?>