

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
		<div class="milky" align="center">Lista de productos</div>
		<div class="container box">
			<br />
			<div class="table-responsive">
				<br />
				
				<div align="center">
				<img src="img/logo-top-1.png"height="120px"><button type="button" id="add_button" data-toggle="modal" data-target="#productosModal" class="btn btn-default orange-circle-button">+</button>
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
							<th width="1%">Editar</th>
							<th width="1%">Borrar</th>
						</tr>
					</thead>
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

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#productos_form')[0].reset();
		$('.modal-title').text("Añadir Producto");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#productos_uploaded_image').html('');
	});
	
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
	$(document).on('submit', '#productos_form', function(event){
		event.preventDefault();
		var nombre = $('#nombre').val();
		var clasificacion = $('#clasificacion').val();
        var stock = $('#stock').val();
		var costo = $('#costo').val();
		var extension = $('#productos_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#productos_image').val('');
				return false;
			}
		}	
		if(nombre != '' && clasificacion != '' && stock != '' && costo != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#productos_form')[0].reset();
					$('#productosModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Complete los campos");
		}
	});
	
	$(document).on('click', '.update', function(){
  var productos_id = $(this).attr("id");
  $.ajax({
   url:"fetch_single.php",
   method:"POST",
   data:{productos_id:productos_id},
   dataType:"json",
   success:function(data)
   {
    $('#productosModal').modal('show');
    $('#nombre').val(data.nombre);
    $('#clasificacion').val(data.clasificacion);
	$('#stock').val(data.stock);
    $('#costo').val(data.costo);
    $('.modal-title').text("Editar producto");
    $('#productos_id').val(productos_id);
    $('#productos_uploaded_image').html(data.productos_image);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
	
	$(document).on('click', '.delete', function(){
		var productos_id = $(this).attr("id");
		if(confirm("¿Estás seguro de eliminar esto?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{productos_id:productos_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>