<html>
	<head>
        <title>Almacenistas</title>
        <link rel="stylesheet" href="css/almacenista.css">
        <link rel="stylesheet" href="css/generalStyle.css">
        <link rel="shortcut icon" href="img/logo_icon.jpg" >
	</head>
	<body>
    <?php include('header.html'); ?>
    <div id="pagina">
    <div id="contenido">
		<div class="milky" align="center">Lista de usuarios</div>
		<div style="margin-top:2rem" class="container box">
			<br />
			<div class="table-responsive">
				<br />
				<div align="center">
				<img src="img/logo-top-1.png"height="120px"><button type="button" id="add_button"  data-toggle="modal" data-target="#usuariosModal" class="btn btn-default orange-circle-button">+</button>
				</div>
				<br /><br />
				<table id="usuarios_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">Imagen</th>
							<th width="8%">ID</th>
							<th width="25%">Nombre</th>
                            <th width="15%">Apellidos</th>
                            <th width="15%">Contraseña</th>
                            <th width="10%">Email</th>
							<th width="10%">Editar</th>
							<th width="10%">Borrar</th>
						</tr>
					</thead>
                    <tbody>

                    </tbody>
				</table>
			</div>
            </div>
            </div>
            <div style="bottom: 0 !important">
    <?php include('footer.html'); ?>
</div>
</body>
</html>
</div>
<div class="modal fade" id="myModalError" role="dialog">
        <div class="modal-dialog">
    <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body"> 
                <h2 id="mensaje"></h2>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
    
        </div>
</div>
<div id="usuariosModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="usuarios_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
                <h4 class="modal-title">Añadir usuario</h4>
					<button style="" type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<label>Ingrese el nombre</label>
					<input type="text" name="firstName" id="firstName" class="form-control "required />
					<br />
					<label>Ingrese Apellido Paterno</label>
                    <input type="text" name="paternalName" id="paternalName" class="form-control "required />
					<br />
          <label>Ingrese Apellido Materno</label>
                    <input type="text" name="maternalName" id="maternalName" class="form-control "required />
					<br />
                    <label>Ingrese contraseña</label>
					<input type="text" name="password" id="password" class="form-control"required />
					<br />
                    <label>Ingrese email</label>
					<input type="email" name="email" id="email" class="form-control"required readonly="true"/>
					<br />
					<label>Seleccionar imagen del usuario</label>
					<input type="file" name="imagen" id="imagen"  class="fileToUpload"/>
					<span id="photo"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
                    <input type="hidden" name="role" id="role" />
					<input type="submit" name="action" id="action" class="btn btn-success"/> 
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>


<script>
    
    $(document).ready(function(){
        localStorage.removeItem('usuario2');
    let usuario = usuarioLocalStorage();
    if(usuario== null || usuario.role.role != "Administra"){
        location.href = 'index.php';
    }

    
    function usuarioLocalStorage() {
        let usuario;
        if(localStorage.getItem('usuario') == null) {
            usuario = null;
        } else {
            usuario = JSON.parse(localStorage.getItem('usuario'));
        }
        return usuario;
    }
        //Varibles
        var users;
        var urlStorers = "http://25.4.107.19:8080/storers"
        var urlUsers = "http://25.4.107.19:8080/users"

        //GET usuarios
        $.getJSON(urlStorers, function( data ) {
            users = data;
            loadTable();
        });
        function verificarFoto(urlToFile, t, f, i) {
            var image = new Image();
            var table = document.getElementById("usuarios_data");

            image.onload = function() {
                // image exists and is loaded
                /*var row = table.insertRow();
                var cell = row.insertCell();
                var newText = document.createTextNode(t);
                cell.appendChild(newText);*/
                $(table).find('tbody').append(t);
                //document.getElementById("usuarios_data").
                //$("#usuarios_data > tbody").append();     
                console.log(t);    
            }
            image.onerror = function() {
                document.getElementById("usuarios_data").innerHTML += f;
                //$("#usuarios_data > tbody").append(f);  
                console.log(f);
            }
            image.src = "users/"+urlToFile;
        }

        //Formato de usuarios en tabla 
         function loadTable(){
            for(var i=0;i<users.length;i++)
            {
                    var tr = "<tr>"+"<td><img width = '300' heigth = '400' src=users/"+users[i]["photo"]+"></td>"+
                    "<td>"+users[i]["id"]+"</td>"+
                    "<td>"+users[i]["firstName"]+"</td>"+
                    "<td>"+users[i]["paternalName"]+" "+users[i]["maternalName"]+"</td>"+
                    "<td>*******</td>"+
                    "<td>"+users[i]["email"]+"</td>"+
                    "<td><button type='button' name='update' id="+users[i]["id"]+ " class='btn btn-default update-circle-button update' ><svg xmlns=http://www.w3.org/2000/svg width=16 height=16 fill=currentColor class='bi bi-pencil-fill' viewBox=0 0 16 16><path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/></svg></button></td>"+
                    "<td><button type=button name=delete id="+users[i]["id"]+ " class= 'btn btn-default delete-circle-button delete'><svg xmlns=http://www.w3.org/2000/svg width=16 height=16 fill=currentColor class='bi bi-trash-fill' viewBox=0 0 16 16><path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/></svg></button></td></tr>";
            $("#usuarios_data > tbody").append(tr);
            };
        }
        function doStuff(){

        }
        function uploadFile(imagen, url){
            var filename  = imagen;  
            //To save file with this name
                var file_data = $('.fileToUpload').prop('files')[0];    //Fetch the file
                var form_data = new FormData();
                form_data.append("file",file_data);
                form_data.append("filename",filename);
                $.ajax({
                    url: url,                      //Server api to receive the file
                    type: "POST",
                    dataType: 'script',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success:function(dat2){
                    alert("OK");
                }
            });
        }

        //Modal UPDATE
        $(document).on('click', '.update', function(){
            var obj = users.find( user => user.id ==  $(this).attr("id"));
            $('#usuariosModal').modal('show');
            document.getElementById("email").readOnly = true;
                $('.modal-title').text("Editar usuario");
                $('#firstName').val(obj.firstName);
                $('#paternalName').val(obj.paternalName);
                $('#maternalName').val(obj.maternalName);
                $('#email').val(obj.email);
                $('#id').val(obj.id);
                $('#photo').html(obj.photo);
                $('#role').val(JSON.stringify(obj.role));
                $('#action').val("Update");
                $('#imagen').removeAttr('required');
        });

        //ADD Boton
        $('#add_button').click(function(){
            $('#usuarios_form')[0].reset();
            $('.modal-title').text("Añadir almacenista");
            document.getElementById("email").readOnly = false; 
            $('#action').val("Add");
            $('#photo').html('');
        });

        //POST/UPDATE/Create product
        $(document).on('submit', '#usuarios_form',function(e){
            var succede = false;
            e.preventDefault();
            //verify the extension
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
            //Creacion del objeto a formato json
            var obj = {};
            function toJSONString( form ) {
                var elements = form.querySelectorAll( "input, select" );
                var ident=Math.floor(Math.random() * 999999);
                for( var i = 0; i < elements.length; ++i ) {
                    var element = elements[i];
                    var name = element.name;
                    var value = element.value;
                    if( name && name!="action" && name!="imagen") {
                        obj[name] = value;
                    }
                   if(name && name=="imagen"){//creacion del nombre de la imagen del usuario
                        if( $('#action').val() == "Update"){
                            var product = users.find( product => product.id ==  document.getElementById("id").value);
                            obj["photo"] = product.photo;
                        }else{   
                            obj["photo"]= ident;
                        }
                   }
                   if( name && $('#action').val() == "Update" && name=="role") {
                        obj[name] = JSON.parse(value);
                    }
                   
                }
                return JSON.stringify(obj);
            }
            
            var json = toJSONString( this );
            if( $('#action').val() == "Add"){
                //POST
                $.ajax({
                    url:urlStorers,
                    type:"POST",
                    data:json,
                    dataType:"json",
                    contentType:"application/json",
                    statusCode: {
                        200: function(responseObject, textStatus, jqXHR) {
                            $('#usuariosModal').modal('hide');
                            $('.modal-title').text("Usuario creado");
                            $('#mensaje').text("El usuario se ha registrado correctamente, ya puedes iniciar sesión");
                            $('#myModalError').modal('show');
                        },
                        404: function(responseObject, textStatus, errorThrown) {
                            $('#usuariosModal').modal('hide');
                            $('.modal-title').text("Usuario duplicado");
                            $('#mensaje').text("El correo electrónico que intentas ingresar ya ha sido registrado");
                            $('#myModalError').modal('show');
                        }
                    },
                    success:function(data)
                    {
                        succede = true;
                        uploadFile("users/"+obj.photo, "loadFoto.php");
                        setTimeout(reload,100);
                        $('#usuarios_form')[0].reset();
                    }
                });
            }else{
                //PUT
                $.ajax({
                    url:urlUsers,
                    type:"PUT",
                    data:json,
                    dataType:"json",
                    contentType:"application/json",
                    success:function(data)
                    {
                        succede = true;
                        uploadFile("users/"+obj.photo, "loadFoto.php");
                        setTimeout(reload,100);
                        $('#usuarios_form')[0].reset();
                    }
                });
            }
            if(!succede){
                $('.modal-title').text("Error de conexión");
                            $('#mensaje').text("Tenemos problemas con el servicio, intenta mas tarde");
                            $('#myModalError').modal('show');
                   
            }  
             
	    });
        $(document).on('click', '.delete', function(e){
        e.preventDefault();
        var succede = false;
		var usuarios_id = $(this).attr("id");
            if(confirm("¿Estás seguro de eliminar esto?"))
            {
                $.ajax({
                    url:urlUsers+ "?id="+usuarios_id,
                    type:"DELETE",
                    dataType:"json",
                    contentType:"application/json",
                    statusCode: {
                        200: function(responseObject, textStatus, jqXHR) {
                            succede = true;
                            var imagen;
                            for( var i = 0; i < users.length; i++){     
                                if ( users[i]["id"] == usuarios_id) { 
                                    imagen = users[i]["photo"];
                                    users.splice(i, 1); 
                                    break; 
                                }
                            }  
                            $('#usuarios_data > tbody').empty();
                            uploadFile("users/"+imagen, "deleteImage.php");
                            setTimeout(loadTable,100);
                        }
                    }
                });
                
            }
            else
            {
                return false;	
            }
        });
        function reload() {
            location.reload();
        }
        
    }); 
</script>