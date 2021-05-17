<head>
    <title>Recuperar contraseña</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
</head>
<font size="3">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome/css/all.css">
<link rel="stylesheet" href="css/carrito.css">
<link rel="stylesheet" href="css/generalStyle.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<?php include('header.html'); ?>

<style>
  i{
    font-size: 15px;
  }

h{
  font-size: 30px;
  font-weight: bold; 
}

</style>
<div id="pagina">
<div id="contenido">
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" >
              <div style="font-size: large;" class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <div class="text-center">
                  <h>¿Olvidaste tu contraseña?</h>
                  <p>Puedes reestablecerla</p>
                  </div>
                  <div class="panel-body">
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-text"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
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
</div>
</div>
<?php include('footer.html'); ?>
</font>
<!--footer goes here--->
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
    localStorage.removeItem('usuario2');
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