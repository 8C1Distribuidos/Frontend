<?php
 $filename = $_POST['filename'];
  if(unlink($filename)) echo 1;
  else echo 2;
 ?>