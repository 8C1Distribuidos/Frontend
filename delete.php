<?php
    $filename = $_POST['filename'];
    $resource = "upload/".$filename;
    //echo "<script>console.log('Nummer: ".$resource."')</script>";
    unlink($resource);

?>