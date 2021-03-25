<?php

?>

<html>
	<head>
		<title>Productos</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" href="css/almacenista.css">
		
	</head>
	<body>
		match();
		<div class="milky" align="center">Lista de productos</div>
		<div class="container box">
			<br />
			<div class="table-responsive">
				<br />
				<div align="center">
				<img src="img/logo-top-1.png"height="120px"><button type="button" id="add_button" data-toggle="modal" data-target="#productosModal" class="btn btn-default orange-circle-button">+</button>
				</div>
				<br /><br />
				<table id="productos_table" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="15%">Imagen</th>
							<th width="8%">ID</th>
							<th width="35%">Nombre</th>
                            <th width="20%">Clasificación</th>
                            <th width="10%">Stock</th>
                            <th width="10%">Costo</th>
							<th width="1%">Editar</th>
							<th width="1%">Borrar</th>
						</tr>
					</thead>
					<tbody id="contenido">
						
						<?php
							$datos = json_decode(file_get_contents("producto.json"), true);
							for($i=0; $i<count($datos); $i++){
							echo "<tr><td>".$datos[$i]["image"]."</td><td>".$datos[$i]["id"]."</td><td>".$datos[$i]["name"]."</td><td>".
							$datos[$i]["clasification"]."</td><td>".$datos[$i]["stock"]."</td><td>".
							$datos[$i]["cost"]."</td></tr>";
							
							/*
							<td><form method='post' action=''> \n
							<input type='hidden' name='id_cliente' value='".$fila["id_cliente"]."'>
							<input type='submit' value='Eliminar'>
							</form></td>*/

							}
							
							
						/*	
							foreach($producto->guardarProducto() as $r): ?>
								<tr>
									<td><?php echo $r->GET('image'); ?></td>
									<td><?php echo $r->GET('id'); ?></td>
									<td><?php echo $r->GET('name'); ?></td>
									<td><?php echo $r->GET('clasification'); ?></td>
									<td><?php echo $r->GET('stock'); ?></td>
									<td><?php echo $r->GET('cost'); ?></td>
									<td>
										<a href="?action=PUT&id=<?php echo $r->id; ?>">Editar</a>
									</td>
									<td>
										<a href="?action=DELETE&id=<?php echo $r->id; ?>">Eliminar</a>
									</td>
								</tr>
							<?php endforeach; ?>
						*/
						
					</tbody>
				</table>
			</div>
		</div>
		
	</body>
	
</html>
<div id="productosModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="productos_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Añadir Producto</h4>
				</div>
				<div class="modal-body">
					<label>Ingrese el nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control" />
					<br />
					<label>Ingrese clasificacion</label>
					<input type="text" name="nombre" id="nombre" class="form-control" />
                    <br/>
                    <label>Ingrese stock</label>
					<input type="text" name="stock" id="stock" class="form-control" />
					<br />
                    <label>Ingrese el costo</label>
					<input type="text" name="costo" id="costo" class="form-control" />
					<br />
					<label>Seleccionar imagen del producto</label>
					<input type="file" name="productos_image" id="productos_image" />
					<span id="productos_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="productos_id" id="productos_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	$datos = json_decode(file_get_contents("producto.json"), true);
	var contenido = document.querySelector('#contenido_products');
	function match(){
		fetch('producto.json')
		.then( res => res.json())
		.then(datos => {
			//console.log(datos);
			tabla(datos);

		})

	}

	/*function tabla(datos){
		
		console.log(datos);
		contenido.innerHTML= ' ';
		for(let  valor of datos ){
			//console.log(valor);
			contenido.innerHTML += `
			<tr  
				<th scope ="row">${producto.image} </th>
				<td>scope ="row">${producto.id} </td>
				<td>scope ="row">${producto.name} </td>
				<td>scope ="row">${producto.clasification} </td>
				<td>scope ="row">${producto.stock} </td>
				<td>scope ="row">${producto.costo} </td>
				
							
			</tr>
			´
		}
		
	}*/
</script>