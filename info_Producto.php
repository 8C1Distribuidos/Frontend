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
		<link rel="stylesheet" href="css/info_Producto.css">
	</head>
	<body>
		<div class="milky" align="center">Informacion del producto </div>
		<div class="container box">
			<br />
			<div class="table-responsive">
				<br />
				<div align="center">
				<img src="img/logo-top-1.png"height="120px">
				</div>
				<br /><br />
				<table id="productos_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="15%">Imagen</th>
							<th width="8%">ID</th>
							<th width="35%">Nombre</th>
                            <th width="20%">Clasificación</th>
                            <th width="10%">Stock</th>
                            <th width="10%">Costo</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript" language="javascript" >
/*
	$(document).ready(function(){
		var dataTable = $('#productos_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch.php",
				type:"POST"
			},
			"columnDefs":[
				{
					"targets":[0, 3, 5],
					"orderable":false,
				},
			],
		});
	});
	$(document).on('click', '.update', function(){
		var productos_id = $(this).attr("id");
		if (isset($_GET['clasificacion'])) {
			var clasificacion = $_GET['clasificacion'];
		}
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{productos_id:productos_id},
			dataType:"json",
			success:function(data)
			{
				if (data.clasificacion == "Blanco") {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}
			}
		})
	});*/
</script>