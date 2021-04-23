<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Iniciar sesión</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loginStyle.css">    
</head>
  <body>
  <?php include('header.html'); ?>
       <div class="registration-form">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="n nav-item">
                    <a class="nav-link active" id="logIn-tab" data-toggle="tab" href="#logIn" role="tab" aria-controls="home" aria-selected="true">Iniciar sesión</a>
                </li>
                <li class="n nav-item">
                    <a class="nav-link" id="signUp-tab" data-toggle="tab" href="#signUp" role="tab" aria-controls="profile" aria-selected="false">Registrarse</a>
                </li>
            </ul>
            <div class="tab-content profile-tab" class="modal fade" id="myTabContent">
                <div class="tab-pane fade active show" id="logIn" role="tabpanel" aria-labelledby="home-tab">
                    <form method="post" id="signUp-form" name="signUp-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="email" class="form-control item" id="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control item" id="password" name="password" placeholder="Contraseña" required>
                                </div>
                                <div id="alerta">
                                </div>
                                <div class="form-group">
                                <button  type="submit" class="btn btn-success"> Ingresar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="signUp" role="tabpanel" aria-labelledby="signUp-tab" class="modal fade">
                    <form method="post" id="registration-form" name="registration-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control item" id="firstName" name="firstName" placeholder="Nombre(s)" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control item" id="paternalName" name="paternalName" placeholder="Apellido paterno" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control item" id="maternalName" name="maternalName" placeholder="Apellido materno" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control item" id="passwordR" minlength="8" maxlength="30" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}$" name="password" placeholder="Contraseña" required>
                            <label  style="color: white;" for="passwordR">Longitud mínima de 8 caracteres, incluyendo mayúsculas, minúsculas y números</label>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control item" id="email" name="email" placeholder="Email" required>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="createAccount" name="createAccount">Registrarse</button>
                        </div>
                        <input type="hidden" name="id" id="id"/>
                    </form>
                </div>
            </div>
        </div>
            
        <!--footer goes here--->
        <div class="modal fade" id="myModalError" role="dialog">
            <div class="modal-dialog">
      <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
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
        <!--scripts-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <?php include('footer.html'); ?>
  </body>
</html>

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
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
    
        $('#createAccount').click(function(){
            //$('#registration-form')[0].reset();
            $('#createAccount').val("Add");
        }); 
        function toJSONString( form ) {
            var obj = {};
            var elements = form.querySelectorAll( "input" );
            var nameUser;//almacena el nombre del usuario
            for( var i = 0; i < elements.length; ++i ) {
                var element = elements[i];
                var name = element.name;
                var value = element.value;
                if( name && name!="createAccount") {
                    obj[name] = value;
                }
            }
            return JSON.stringify(obj);
        }
        //POST/UPDATE/Create product
        $(document).on('submit', '#registration-form',function(event){
            event.preventDefault();
            //Creacion del objeto a formato json
        function usuarioLocalStorage() {
            let usuario;
            if(localStorage.getItem('usuario') == null) {
                usuario = null;
            } else {
                location.href = 'userpage.php';
            }
        }
            var json = toJSONString( this );
            if( $('#createAccount').val() == "Add"){
                //POST
                $.ajax({
                    url:"http://25.4.107.19:8080/users",
                    type:"POST",
                    data:json,
                    dataType:"json",
                    contentType:"application/json",
                    statusCode: {
                        200: function(responseObject, textStatus, jqXHR) {
                            $('.modal-title').text("Usuario creado");
                            $('#mensaje').text("El usuario se ha registrado correctamente, ya puedes iniciar sesión");
                            $('#myModalError').modal('show');
                            location.href = 'login.php';
                        },
                        400: function(responseObject, textStatus, errorThrown) {
                            $('.modal-title').text("Usuario duplicado");
                            $('#mensaje').text("El correo electrónico que intentas ingresar ya ha sido registrado");
                            $('#myModalError').modal('show');
                        }
                    }
                });
            }    
	    });

        $(document).on('submit', '#signUp-form',function(event){
            event.preventDefault();
            var json = toJSONString( this );
            $.ajax({
                url:"http://25.4.107.19:8080/login",
                type:"POST",
                data:json,
                dataType:"json",
                contentType:"application/json",
                statusCode: {
                    404: function(responseObject, textStatus, errorThrown) {
                        var alerta = "<div class='alert alert-danger' role='alert'>Credenciales incorrectas</div>";
                        $("#alerta").append(alerta);
                    },
                    400: function(responseObject, textStatus, errorThrown) {
                        var alerta = "<div class='alert alert-info role='alert'>Error de servidor, intenta más tarde</div>";
                        $("#alerta").append(alerta);
                    }
                },
                success:function(data)
                {
                    console.log(data);
                    if(data != null){
                        localStorage.setItem('usuario', data);
                        if(data.role.role == "Cliente"){
                            location.href = 'index.php';
                        }else if(data.role.role == "Almacenista"){
                            location.href = 'almacenista.php';
                        }else if(data.role.role == "Administrador"){

                        }
                    }
                }
            });
        }); 
    }); 
    
</script>

