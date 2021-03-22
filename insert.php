<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["productos_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO productos (`image`, `nombre`, `clasificacion`, `stock`,`costo`) 
			VALUES (:image, :nombre, :clasificacion, :stock, :costo)
		");
		$result = $statement->execute(
			array(
                
				':nombre'	=>	$_POST["nombre"],
				':clasificacion'	=>	$_POST["clasificacion"],
                ':stock'	=>	$_POST["stock"],
                ':costo'	=>	$_POST["costo"],
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["productos_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_productos_image"];
		}
		$statement = $connection->prepare(
			"UPDATE productos 
			SET nombre = :nombre, clasificacion = :clasificacion, stock = :stock, costo = :costo, image = :image  
			WHERE id = :id
			"
		);
        
		$result = $statement->execute(
			array(
				':nombre'	=>	$_POST["nombre"],
				':clasificacion'	=>	$_POST["clasificacion"],
				':stock'	=>	$_POST["stock"],
				':costo'	=>	$_POST["costo"],
				':image'		=>	$image,
				':id'			=>	$_POST["productos_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}



?>
