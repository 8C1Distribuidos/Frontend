<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/carrito.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <nav class="navbar navbar-dark bg-dark navbar-expand-md justify-content-center">
        <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                   <a class="nav-link" href="index.php" id="navbar" type="button" >
                      Inicio
                    </a>
                </li>
                <li class="nav-item active">
                   <a class="nav-link" href="catalogos.php" id="navbar" type="button">
                      Productos
                    </a>
                </li>
              <!--
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Productos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Vinos</a>
                      <a class="dropdown-item" href="#">Destilados</a>
                    </div>
                 </li>
                 -->
              </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item text-center" id="signup-btn">
                    <a href="login.php" class="nav-link" type="button"><span class="fa fa-user"></span><span class="d-none d-sm-inline d-xl-block px-1"></span></a>
                </li>
                <li class="submenu">
                  <a href="#" id="img-carrito" class="nav-link" data-toggle="modal" data-target="#"><span class="fa fa-shopping-cart"></span><span class="d-none d-sm-inline d-xl-block px-1"></span></a>
                  <div id="carrito">
                    <table id="lista-carrito" class="u-full-width">
                      <thead>
                        <tr>
                          <th>Imagen</th>
                          <th>Nombre</th>
                          <th>Precio</th>
                          <th> </th>
                          <th>Cantidad</th>
                          <th> </th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                    <a href="#" id="pagar" style="display: none;" class="button-l u-full-width">Pagar</a>
                    <a href="#" id="vaciar-carrito" class="button-l u-full-width">Vaciar Carrito</a>
                  </div>
                </li>
            </ul>
        </div>
    </nav>
 <div class="form-gap" ></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" >
              <div style="font-size: large;" class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Olvidaste tu ontraseña?</h2>
                  <p>Pudes restablecerla</p>
                  <div class="panel-body">
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" id="email" placeholder="email" class="form-control"  type="email" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" type="submit">
                      </div>
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<?php include('footer.html'); ?>

<!--footer goes here--->
<div class="modal fade" id="myModalError" role="dialog">
            <div class="modal-dialog">
      <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body"> 
                    <h2 id="mensaje"></h2>
                    </div>
                    <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
      
            </div>
        </div>


<script type="text/javascript" language="javascript">
    $('#close').click(function(){
        location.href = 'login.php';
    });

    $(document).ready(function(){
        $(document).on('submit', '#register-form',function(event){
            event.preventDefault();
            var email = {email:document.getElementById("email").value};
            $.ajax({
                url:"http://25.4.107.19:8080/users/recovery",
                type:"POST",
                data:JSON.stringify(email),
                dataType:"json",
                contentType:"application/json",
                statusCode: {
                    200: function(responseObject, textStatus, errorThrown) {
                        $('.modal-title').text("Correo enviado");
                    $('#mensaje').text("Tu nueva conraseña se ha enviado al correo registrado");
                    $('#myModalError').modal('show');
                    }
                }
            });
        });
    });
</script>