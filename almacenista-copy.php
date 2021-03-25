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
							$button_delete= '<button type="button" name="delete" id="'.$datos[$i]["id"].'" class="btn btn-default delete-circle-button delete"  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
							<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
							</svg></button>';
	
							$button_edit='<button type="button" name="update" id="'.$datos[$i]["id"].'" class ="btn btn-default update-circle-button update" data-toggle="modal" data-target="#editarProductsModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
							<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
							</svg></button>';
							
							  echo "<tr>
									  <td>".$datos[$i]["image"]."</td>
								      <td>".$datos[$i]["id"]."</td>
									  <td>".$datos[$i]["name"]."</td>
									  <td>".$datos[$i]["clasification"]."</td>
									  <td>".$datos[$i]["stock"]."</td>
									  <td>".$datos[$i]["cost"]."</td>
									  <td>".$button_edit."</td>
									  <td>".$button_delete."</td>
									  
								  </tr>";
							
							/*
							<td><form method='post' action=''> \n
							<input type='hidden' name='id_cliente' value='".$fila["id_cliente"]."'>
							<input type='submit' value='Eliminar'>
							</form></td>
							
							<button type="button" name="update" id="'.$row["id"].'" 
							class ="btn btn-default update-circle-button update"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
							<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
							</svg></button>
							
							*/

							

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
						?>
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



<div id="editarProductsModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="productos_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Editar Producto</h4>
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
$(document).ready(function (e) {
  $('#myModal').on('show.bs.modal', function(e) {    
     var id = $(e.relatedTarget).data().id;
      $(e.currentTarget).find('#lista').val(id);
  });
});

$(document).ready(function(){
	$('#update').click(function(){
		$('#productos_form')[0].reset();
		$('.modal-title').text("Añadir Producto");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#productos_uploaded_image').html('');
	});

</script>