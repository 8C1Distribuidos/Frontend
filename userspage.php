<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/userspage.css">
   <title>Usuario</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
  </head>
  <style>
      
  </style>
  <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<body>
<div align= "center">
    <?php include('header.html'); ?>
</div>
        
<form method="post">
    <div style="margin-top: 6rem; z-index:-1" class="container emp-profile">
      <form method="post">
          <div class="row">
              <div class="col-md-4">
                  <div class="profile-img">
                      <img id="imagenUsuario" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt=""/>
                      <button type="button" id="add_button"  data-toggle="modal" data-target="#userImageModal" class="file btn btn-lg btn-primary">Cambiar foto</button>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="profile-head">
                              <h5>
                                  Usuario
                              </h5>
                              <div id="tipo" ></div>
                      <ul style = "margin-top: 3%;"class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información</a>
                          </li>
                      </ul>
                      <div style = "margin-top: 7%;" class="tab-content profile-tab" id="userInfo">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label>Correo</label>
                              </div>
                              <div class="col-md-6">
                                  <p></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label>Nombre</label>
                              </div>
                              <div class="col-md-6">
                                  <p></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label>Contraseña</label>
                              </div>
                              <div class="col-md-6">
                                  <p></p>
                              </div>
                          </div>
                        </div>
                  </div>
              </div>
              <div class="col-md-2">
                  <button type="button" class="profile-edit-btn" name="profileEdit" id="editProfile">Editar Perfil</button>
              </div>
          </div>
          <div class="row">
              <div class="col-md-4">
                  
              </div>
              <div class="col-md-8">
                  
              </div>
          </div>
      </form>           
  </div>
</form>
<!--///////////////////////////////////////////////////////////////////////-->
<!--Form to edit the user data-->
<div id="productosModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="productos_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
                    <h4 class="modal-title">Editar perfil</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<label>Nombre(s)</label>
					<input type="text" name="firstName" id="firstName" class="form-control "required />
					<br />
					<label>Apellido paterno</label>
                    <input type="text" class="form-control" name="paternalName" id="paternalName" required/>
                    <br/>
                    <label>Apellido materno</label>
					<input type="text" name="maternalName" id="maternalName" class="form-control"required />
					<br />
                    <label>Contraseña</label>
					<input type="text" name="password" id="passwordR" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}$" class="form-control"/>
					<label for="passwordR">Longitud mínima de 8 caracteres, incluyendo mayúsculas, minúsculas y números</label>
                    <br />
                    <label>Email</label>
					<input type="text" name="email" id="email" class="form-control" disabled />
					<br />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
                    <input type="hidden" name="role" id="role" />
                    <input type="hidden" name="photo" id="photo" />
					<input type="submit" name="action" id="action" class="btn btn-success"/> 
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>
  <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--Form to edit the user data-->
<div id="userImageModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="foto_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
                    <h4 class="modal-title">Editar perfil</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<label>Seleccionar imagen del usuario</label>
					<input type="file" name="imagen" id="imagen" class="fileToUpload" class="form-control" required/>
					<span id="productos_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
					<input type="submit" name="action" id="action" value="Guardar"class="btn btn-success"/> 
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>
  <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div style="bottom: 0 !important">
    <?php include('footer.html'); ?>
</div>
  
</body>
</html>

<script>
  
  $(document).ready(function(){
    var usuario = usuarioLocalStorage();
    if (usuario == null) {
        location.href = 'login.php';
    }
    updatecont();
    verificarFoto();
  //uploadFile("users/"+obj.photo, "loadFoto.php");
  function updatecont(){
    var obj = usuarioLocalStorage();
    console.log(obj);
        $("#userInfo").empty();
            var tr  ="<div class=\"row\">"+
                    "<div class=\"col-md-6\">"+
                        "<label>"+"Correo"+"</label>"+
                    "</div>"+
                    "<div class=\"col-md-6\">"+
                        "<p>"+obj["email"]+"</p>"+
                    "</div>"+
                "</div>"+
                "<div class=\"row\">"+
                    "<div class=\"col-md-6\">"+
                        "<label>"+"Nombre"+"</label>"+
                    "</div>"+
                    "<div class=\"col-md-6\">"+
                        "<p>"+obj["firstName"]+ " " + obj["paternalName"]+ " " + obj["maternalName"]+"</p>"+
                    "</div>"+
                "</div>"+
                "<div class=\"row\">"+
                    "<div class=\"col-md-6\">"+
                        "<label>"+"Contraseña"+"</label>"+
                    "</div>"+
                    "<div class=\"col-md-6\">"+
                        "<p>"+"********"+"</p>"+
                    "</div>"+
                "</div>";
            $("#userInfo").append(tr);
            document.getElementById('tipo').textContent = "Tipo de usuario: " + usuario.role.role;
            
    }
    function verificarFoto(urlToFile) {
        var image = new Image();

        image.onload = function() {
            // image exists and is loaded
            document.getElementById("imagenUsuario").src = "users/"+usuario.photo;         
        }
        image.onerror = function() {
            // image did not load
        }
        image.src = "users/"+usuario.photo;
    }

    function uploadFile(imagen,url){
        //var filename = $('#filename').val();   
        var filename  = imagen;               //To save file with this name
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
            if(dat2==1) alert("OK");
            else alert("Error");
        } 
        });
    }
    
    $(document).on('submit', '#foto_form',function(event){
        event.preventDefault();
        var extension = $('#imagen').val().split('.').pop().toLowerCase();
        if(extension != '')
        {
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert("Invalid Image File");
                $('#imagen').val('');
                return false;
            }
        }
        uploadFile("users/"+usuario.photo, "loadFoto.php");
        setTimeout(reload,100);
    });
    function reload(){
        location.reload();
    }
    document.getElementById("passwordR")
    .addEventListener('input', function(evt) {
        const campo = evt.target,
        regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}$/;
        //Se muestra un texto válido/inválido a modo de ejemplo
        if (regex.test(campo.value)) {
            this.style.backgroundColor = "palegreen";
        } else {
            this.style.backgroundColor = "indianred";
        }
    });
  $(document).on('submit', '#productos_form',function(event){
      event.preventDefault();
        
        function toJSONString( form ) {
            var obj = {};
            var elements = form.querySelectorAll( "input, select, textarea" );
            for( var i = 0; i < elements.length; ++i ) {
                var element = elements[i];
                var name = element.name;
                var value = element.value;

                if( name && name!="action") {
                    obj[ name ] = value;
                }
                if( name && name == "role") {
                    console.log(value);
                    obj[ name ] = JSON.parse(value);
                }
            }
            console.log(JSON.stringify( obj ))
            return JSON.stringify( obj );
        }
        var json = toJSONString( this );
        event.preventDefault();
        var x= $('#action').val();
        if( x == "Update"){
            $.ajax({
                url:"http://25.4.107.19:8080/users",
                type:"PUT",
                data:json,
                dataType:"json",
                contentType:"application/json",
                success:function(data)
                {
                    localStorage.setItem('usuario',json);
                    updatecont();
                    $('#productosModal').modal('hide');
                }
            });
        }
    });

    //Modal UPDATE
    $('#editProfile').click(function(){
        var obj = usuarioLocalStorage();
            $('#passwordR').val("");
            document.getElementById("passwordR").style.backgroundColor = "transparent";
            $('#productosModal').modal('show');
            $('.modal-title').text("Editar perfil de usuario");
            $('#firstName').val(obj.firstName);
            $('#paternalName').val(obj.paternalName);
            $('#maternalName').val(obj.maternalName);
            $('#email').val(obj.email);
            $('#id').val(obj.id);
            $('#photo').val(obj.photo);
            $('#role').val(JSON.stringify(obj.role));
            $('#productos_uploaded_image').html(obj.imagen);
            $('#action').val("Update");
        });
        //Para la variable de otra pagina
    function usuarioLocalStorage() {
        let usuario;
        if(localStorage.getItem('usuario') == null) {
            usuario = null;
        } else {
            usuario = JSON.parse(localStorage.getItem('usuario'));
        }
        return usuario;
    }
     }); 
</script>