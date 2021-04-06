<?php

/* Obtiene el nombre del archivo */
$filename = $_POST['nombre'];

$target_directory = "upload/";
$target_file = $target_directory.basename($_FILES["file"]["name"]);
$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$newfilename = $target_directory.$filename.".".$filetype;

move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename);



?>