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
               <form>
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
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="logIn" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control item" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control item" id="password" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group">
                                    <a href="userspage.php"  type="button" class="btn btn-block create-account"> Ingresar </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="signUp" role="tabpanel" aria-labelledby="signUp-tab">
                        <div class="form-group">
                            <input type="text" class="form-control item" id="userFirtsName" placeholder="Nombre(s)">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control item" id="userLastNameP" placeholder="Apellido paterno">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control item" id="userLastNameM" placeholder="Apellido materno">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control item" id="password" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control item" id="password" placeholder="Repetir contraseña">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control item" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <a href="userspage.php" type="submit" class="btn btn-block create-account" id="createAccount" name="createAccount">Crear cuenta </a>
                        </div>
                    </div>
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

?>

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        //Varibles
        var users;
        var classifications;

        //GET productos
        $.getJSON("http://localhost:3000/users", function( data ) {
            users = data;
            loadTable();
        });
        /*
        //Formato de productos en tabla 
        function loadTable(){
            for(var i=0;i<products.length;i++)
            {
            var tr  ="<tr>"+
                    "<td><img src="+products[i]["imagen"]+"></td>"+
                    "<td>"+products[i]["id"]+"</td>"+
                    "<td>"+products[i]["name"]+"</td>"+
                    "<td>"+products[i]["clasificacion"]["name"]+"</td>"+
                    "<td>"+products[i]["clasificacion"]["catalogo"]["name"]+"</td>"+
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
        });

        //Select On change 
        $('#clasificacion_menu').change(function(){
            var obj = classifications.find( clasification => clasification.id ==  this.value);
            document.getElementById("catalogo").value = obj.catalogo.name;
        })*/

        //Modal UPDATE
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
        });

        //ADD Boton
        $('#createAccount').click(function(){
            $('#users_form')[0].reset();
            $('.modal-title').text("Añadir Producto");
            document.getElementById("catalogo").value = classifications[0]["catalogo"]["name"];
            $('#action').val("Add");
            $('#productos_uploaded_image').html('');
        }); 

        //POST/UPDATE/Create product
        $(document).on('submit', '#registration-form',function(event){
            event.preventDefault();
            //verify the extension
            var extension = $('#imagen').val().split('.').pop().toLowerCase();
            console.log($('#imagen').val());
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
                var elements = form.querySelectorAll( "input" );
                var nameUser;//almacena el nombre del producto
                var ident=Math.floor(Math.random() * 999999);
                for( var i = 0; i < elements.length; ++i ) {
                    var element = elements[i];
                    var name = element.name;
                    var value = element.value;
                    if(name && name=="name"){
                        nameUser=value;
                    }
                    /*if( name && name=="clasificacion") { 
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
                }
                
                console.log(obj);
                 
                return JSON.stringify(obj);
            }
            
            var json = toJSONString( this );

            if( $('#createAccount').val() == "Add"){
                //POST
                $.ajax({
                    url:"http://localhost:3000/users",
                    type:"POST",
                    data:json,
                    dataType:"json",
                    contentType:"application/json",
                    success:function(data)
                    {
                        $('#registration-form')[0].reset();
                        $('#productosModal').modal('hide');
                        users.push(obj);
                        /*$('#productos_data > tbody').empty();
                        loadTable();*/
                    }
                });
            }else{
                //PUT
                $.ajax({
                    url:"http://localhost:3000/users/"+obj.id,
                    type:"PUT",
                    data:json,
                    dataType:"json",
                    contentType:"application/json",
                    success:function(data)
                    {
                        //$('#productosModal').modal('hide');
                        for( var i = 0; i < products.length; i++){     
                            if ( products[i]["id"] == obj.id) { 
                                products[i] = obj;
                                break; 
                            }
                        }  
                        /*$('#productos_data > tbody').empty();
                        loadTable();*/
                    }
                });
            }     
	    });
    }); 

   
    
</script>

