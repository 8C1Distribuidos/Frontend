


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
				<img src="img/logo-top-1.png"height="120px"><button type="button" id="add_button"  data-toggle="modal" data-target="#productosModal" class="btn btn-default orange-circle-button">+</button>
				</div>
				<br /><br />
				<table id="productos_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">Imagen</th>
							<th width="8%">ID</th>
							<th width="25%">Nombre</th>
                            <th width="15%">Clasificación</th>
                            <th width="15%">Catálogo</th>
                            <th width="10%">Stock</th>
                            <th width="10%">Costo</th>
							<th width="10%">Editar</th>
							<th width="10%">Borrar</th>
						</tr>
					</thead>
                    <tbody>

                    </tbody>
				</table>
			</div>
		
</body>
</html>
</div>
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
					<input type="text" name="name" id="name" class="form-control required" />
					<br />
					<label>Ingrese clasificacion</label>
                    <select class="form-control" name="clasificacion" id="clasificacion_menu"></select>
                    <br/>
                    <label>Catalogo</label>
					<input type="text" name="catalogo" id="catalogo" class="form-control" readonly="true"/>
					<br />
                    <label>Ingrese stock</label>
					<input type="number" name="stock" id="stock" class="form-control required" />
					<br />
                    <label>Ingrese el costo</label>
					<input type="number" name="costo" id="costo" class="form-control required" />
					<br />
					<label>Seleccionar imagen del producto</label>
					<input type="file" name="imagen" id="imagen" class="form-control required"/>
					<span id="productos_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
					<input type="submit" name="action" id="action" class="btn btn-success"/> 
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>


<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        //Varibles
        var products;
        var classifications;

        //GET productos
        $.getJSON("http://localhost:3000/products", function( data ) {
            products = data;
            loadTable();
        });

        //Formato de productos en tabla 
        function loadTable(){
            for(var i=0;i<products.length;i++)
            {
            var tr  ="<tr>"+
                    "<td><img src="+products[i]["imagen"]+"></td>"+
                    "<td>"+products[i]["id"]+"</td>"+
                    "<td>"+products[i]["name"]+"</td>"+
                    "<td>"+products[i]["clasificacion"][0]["name"]+"</td>"+
                    "<td>"+products[i]["clasificacion"][0]["catalogo"][0]["name"]+"</td>"+
                    "<td>"+products[i]["stock"]+"</td>"+
                    "<td>"+"$"+products[i]["costo"]+"</td>"+
                    "<td><button type='button' name='update' id="+products[i]["id"]+ " class='btn btn-default update-circle-button update' ><svg xmlns=http://www.w3.org/2000/svg width=16 height=16 fill=currentColor class='bi bi-pencil-fill' viewBox=0 0 16 16><path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/></svg></button></td>"+
                    "<td><button type=button name=delete id="+products[i]["id"]+ " class= 'btn btn-default delete-circle-button delete'><svg xmlns=http://www.w3.org/2000/svg width=16 height=16 fill=currentColor class='bi bi-trash-fill' viewBox=0 0 16 16><path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/></svg></button></td></tr>";
            $("#productos_data").append(tr);
            };
        }
        
        //GET clasificaciones 
        $.getJSON("http://localhost:3000/clasificacion", function( data ) {
            classifications = data;
            for(var i=0;i<classifications.length;i++)
            {
                var option  ="<option value="+classifications[i]["id"]+">"+classifications[i]["name"]+"</option>";
                $("#clasificacion_menu").append(option);
            }
            //document.getElementById("catalogo").value = classifications[0]["catalogo"][0]["name"];
        });

        //Select On change 
        $('#clasificacion_menu').change(function(){
            var obj = classifications.find( clasification => clasification.id ==  this.value);
            document.getElementById("catalogo").value = obj.catalogo[0].name;
        })

        //Modal UPDATE
        $(document).on('click', '.update', function(){
            const obj = products.find( product => product.id ==  $(this).attr("id"));
            $('#productosModal').modal('show');
                $('.modal-title').text("Editar producto");
                $('#name').val(obj.name);
                $('#clasificacion').val(obj.clasificacion.name);
                $('#catalogo').val(obj.clasificacion[0].catalogo[0].name);
                $('#stock').val(obj.stock);
                $('#costo').val(obj.costo);
                $('#id').val(obj.id);
                $('#productos_uploaded_image').html(obj.imagen);
                $('#action').val("Update");
        });

        //ADD Boton
        $('#add_button').click(function(){
            $('#productos_form')[0].reset();
            $('.modal-title').text("Añadir Producto");
            $('#action').val("Add");
            $('#productos_uploaded_image').html('');
        });

        //POST/UPDATE producto
        $(document).on('submit', '#productos_form',function(event){
            event.preventDefault();
            var extension = $('#imagen').val().split('.').pop().toLowerCase();

            if(extension != '')
            {
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Formato de imagen no valido");
                    $('#imagen').val('');
                    return false;
                }
            }

            //Formulario a JSON
            function toJSONString( form ) {
                var obj = {};
                var elements = form.querySelectorAll( "input, select" );
                for( var i = 0; i < elements.length; ++i ) {
                    var element = elements[i];
                    var name = element.name;
                    var value = element.value;
                    /*if( name && name=="clasificacion") {
                        var clasificacion = classifications.find( clasification => clasification.id ==  value);
                        obj[name] = clasificacion;
                        obj[name][0]["id"] = clasificacion.id;
                        obj[name][0]["name"] = clasificacion.name;
                        obj[name][0]["catalogo"][0]["id"] = clasificacion.catalogo[0].id;
                        obj[name][0]["catalogo"][0]["name"] = clasificacion.catalogo[0].name;
                    }*/
                    if( name && name!="action" && name!="catalogo") {
                        obj[ name ] = value;
                    }
                }
                return JSON.stringify( obj );
            }
            
            var json = toJSONString( this );

            if( $('#action').val() == "Add"){
                //POST
                $.ajax({
                    url:"http://localhost:3000/products",
                    type:"POST",
                    data:json,
                    dataType:"json",
                    contentType:"application/json",
                    success:function(data)
                    {
                        $('#productos_form')[0].reset();
                        $('#productosModal').modal('hide');
                        products.push(json);
                        $('#productos_data > tbody').empty();
                        loadTable();
                    }
                });
            }else{
                //PUT
                $.ajax({
                    url:"http://localhost:3000/products",
                    type:"PUT",
                    data:json,
                    dataType:"json",
                    contentType:"application/json",
                    success:function(data)
                    {
                        $('#productosModal').modal('hide');
                        products.reverse(json);
                        $('#productos_data > tbody').empty();
                        loadTable();
                    }
                });
            }     
	    });
        $(document).on('click', '.delete', function(){
		var productos_id = $(this).attr("id");
            if(confirm("¿Estás seguro de eliminar esto?"))
            {
                $.ajax({
                    url:"http://localhost:3000/products/"+productos_id,
                    type:"DELETE",
                    dataType:"json",
                    contentType:"application/json",
                    success:function(data)
                    {
                        for( var i = 0; i < products.length; i++){     
                            if ( products[i]["id"] == productos_id) { 
                                products.splice(i, 1); 
                                break; 
                            }
                        }  
                        $('#productos_data > tbody').empty();
                        loadTable();
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