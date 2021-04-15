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
        <form method="post" id="registration-form" class="registration-form" enctype="multipart/form-data">
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
                        <div class="tab-pane fade show active" id="logIn" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control item" id="email2" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control item" id="password2" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group">
                                    <a href="userspage.php"  type="button" class="btn btn-block create-account"> Ingresar </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="signUp" role="tabpanel" aria-labelledby="signUp-tab" class="modal fade">
                        <div class="form-group">
                            <input type="text" class="form-control item" id="firtsName" name="firtsName" placeholder="Nombre(s)">
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
                        <!--<div class="form-group">
                            <input type="password" class="form-control item" id="password2" name="password2" placeholder="Repetir contraseña">
                        </div>-->
                        <div class="form-group">
                            <input type="text" class="form-control item" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control item" id="birthDate" name="birthDate" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <a href="userspage.php" type="submit" class="btn btn-block create-account" id="createAccount" name="createAccount">Crear cuenta </a>
                        </div>
                        <input type="hidden" name="id" id="id" />
                        <input type="hidden" name="role" id="role" />
                    </div>
                </div>

        </form>
    </div>

        <!--footer goes here--->

        <!--scripts-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
  </body>
</html>



<?php 
/*
function upload_image()
{
 if(isset($_FILES["imagen"]))
 {
  $extension = explode('.', $_FILES['imagen']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = './upload/' . $new_name;
  move_uploaded_file($_FILES['imagen']['tmp_name'], $destination);
  return $new_name;
 }
}

?>

<?php 
function update($id)
{
    $users = AdminLogin::find($id);

    if(Input::hasFile('image_file'))
    {
        $usersImage = public_path("uploads/images/{$users->image_file}"); // get previous image from folder
        if (File::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        $file = Input::file('image_file');
        $name = time() . '-' . $file->getClientOriginalName();
        $file = $file->move(('uploads/images'), $name);
        $users->image_file= $name;
    }
    $users->save();
    return response()->json($users);
}
*/
?>

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        //Varibles
        var users;
        var classifications;
        var urlProducts = "http://localhost:3000/Users"

        //GET productos
        $.getJSON(urlProducts, function( data ) {
            users = data;
        });
        /*
        
        //GET clasificaciones 
        $.getJSON("http://localhost:3000/clasificacion", function( data ) {
            classifications = data;
            for(var i=0;i<classifications.length;i++)
            {
                var option  ="<option value="+classifications[i]["id"]+">"+classifications[i]["name"]+"</option>";
                $("#clasificacion_menu").append(option);
            }
        });

        
/*
        Modal UPDATE
        $(document).on('click', '.update', function(){
            var obj = products.find( product => product.id ==  $(this).attr("id"));
            var clas = classifications.find(clasification => clasification.id == obj.clasificacion.id);
            $('#productosModal').modal('show');
                $('.modal-title').text("Editar producto");
                $('#name').val(obj.name);
                $('#clasificacion_menu').val(obj.clasificacion.id);
                $('#catalogo').val(obj.clasificacion.catalogo.name);
                $('#stock').val(obj.stock);
                $('#costo').val(obj.costo);
                $('#id').val(obj.id);
                $('#productos_uploaded_image').html(obj.imagen);
                $('#action').val("Update");
        });*/

        /*ADD Boton*/
        $('#createAccount').click(function(){
            $('#registration-form')[0].reset();
            //a('.modal-title').text("Añadir Producto");
           // document.getElementById("catalogo").value = classifications[0]["catalogo"]["name"];
            $('#createAccount').val("Add");
            //a('#productos_uploaded_image').html('');
        }); 

        //POST/UPDATE/Create product
        $(document).on('submit', '#registration-form',function(event){
            event.preventDefault();
            //verify the extension
            


            //Creacion del objeto a formato json
            var obj = {};
            function toJSONString( form ) {
                var elements = form.querySelectorAll( "input" );
                var nameUser;//almacena el nombre del producto
                //var ident=Math.floor(Math.random() * 999999);
                for( var i = 0; i < elements.length; ++i ) {
                    var element = elements[i];
                    var name = element.name;
                    var value = element.value;
                    if( name && name!="createAccount" && name!="catalog") {
                        obj[name] = value;
                    }
                    /* if( name && name=="clasificacion") { 
                        obj[name]= classifications.find( clasification => clasification.id ==  value);
                    }
                    if( name && name!="action" && name!="catalogo"&& name!="clasificacion") {
                        obj[name] = value;
                    }
                   if(name && name=="imagen"){//creacion del nombre de la imagen del producto
                    let procesado;*/
                    procesado = nameUser.replace(/\s+/g, '');      // > "Textodeejemplo"
                    obj[name]= ('upload/' + procesado + '_' + ident + '.' + extension);
                   
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
                        alert("Esta vivo!");
                        //Users.push(obj);
                        /*a('#productos_data > tbody').empty();
                        loadTable();*/
                    }
                });
            }    
	    });
    }); 

   
    
</script>

