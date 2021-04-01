<?php
include('almacenista-v2.php');
if(isset($_POST["productos_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM productos 
		WHERE id = '".$_POST["productos_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

        //`image`, `nombre`, `clasificacion`, `stock`,`costo`
        
		$output["name"] = $row["name"];
		$output["clasificacion"] = $row["clasificacion"];
        $output["stock"] = $row["stock"];
		$output["costo"] = $row["costo"];
		if($row["image"] != '')
		{
			$output['productos_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="200" height="100" /><input type="hidden" name="hidden_productos_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['productos_image'] = '<input type="hidden" name="hidden_productos_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>