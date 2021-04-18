<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Iniciar sesión</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loginStyle.css">    
</head>
  <body>
       <div class="registration-form">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="logIn-tab" data-toggle="tab" href="#logIn" role="tab" aria-controls="home" aria-selected="true">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="signUp-tab" data-toggle="tab" href="#signUp" role="tab" aria-controls="profile" aria-selected="false">Registrarse</a>
                </li>
            </ul>
            <div class="tab-content profile-tab" class="modal fade" id="myTabContent">
                <div class="tab-pane fade active show" id="logIn" role="tabpanel" aria-labelledby="home-tab">
                    <form method="post" id="signUp-form" name="signUp-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control item" id="email2" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control item" id="password2" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                <a href="userspage.php"  type="button" class="btn btn-block create-account"> Ingresar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="signUp" role="tabpanel" aria-labelledby="signUp-tab" class="modal fade">
                <form method="post" id="registration-form" name="registration-form" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control item" id="firstName" name="firstName" placeholder="Nombre(s)">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="paternalName" name="paternalName" placeholder="Apellido paterno">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="maternalName" name="maternalName" placeholder="Apellido materno">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control item" id="password" name="password" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control item" id="birthDate" name="birthDate" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" id="createAccount" name="createAccount"/>
                    </div>
                    <input type="hidden" name="role" id="role" value="Cliente"/>
                    <input type="hidden" name="id" id="id"/>
                </form>
            </div>
        </div>
        <!--footer goes here--->

        <!--scripts-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
  </body>
</html>

<?php 

?>

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        //Varibles
        var users;
        var classifications;
        var urlProducts = "http://localhost:3000/Users"
        /*ADD Boton*/
        $('#createAccount').click(function(){
            //$('#registration-form')[0].reset();
            $('#createAccount').val("Add");
        }); 

        //POST/UPDATE/Create product
        $(document).on('submit', '#registration-form',function(event){
            event.preventDefault();
            //Creacion del objeto a formato json
            var obj = {};
            function toJSONString( form ) {
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
                console.log(obj);
                return JSON.stringify(obj);
            }
            
            var json = toJSONString( this );
            if( $('#createAccount').val() == "Add"){
                //POST
                $.ajax({
                    url:"http://localhost:3000/Users",
                    type:"POST",
                    data:json,
                    dataType:"json",
                    contentType:"application/json",
                    success:function(data)
                    {
                        //Users.push(obj);
                        /*a('#productos_data > tbody').empty();
                        loadTable();*/
                    }
                });
            }    
	    });
    }); 
    
</script>

