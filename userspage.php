<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/userspage.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">

    <title>Usuario</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
  </head>
  <body>
    <style>
        .dropdown:hover>.dropdown-menu{
            display: block;
        }

    </style>
   <div align= "center"style="background: #E3DDCF"><a href="index.php"><img src="img/logo-top-1.png" height="90px" text-align= "center"></div></a>
    <?php include('header.html'); ?>
  <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
  
    <form method="post">
    <div class="container emp-profile">
      <form method="post">
          <div class="row">
              <div class="col-md-4">
                  <div class="profile-img">
                      <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt=""/>
                      <div class="file btn btn-lg btn-primary">
                          Cambiar foto
                          <input type="file" name="file"/>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="profile-head">
                              <h5>
                                  Usuario
                              </h5>
                              <h6>
                                  Tipo de usuario: Usuario
                              </h6>
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información</a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-2">
                  <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Editar perfil"/>
              </div>
          </div>
          <div class="row">
              <div class="col-md-4">
                  <div class="profile-work">
                      
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="tab-content profile-tab" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Correo</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p>correo@gmail.com</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Nombre</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p>nombre apellidop apellidom</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Contraseña</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p>123 456 7890</p>
                                      </div>
                                  </div>
                                  
                      </div>
              </div>
          </div>
      </form>           
  </div>
</form>

  <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <footer class="bg-light text-center text-lg-start">
      <div class="row" style="background-color: rgba(0, 0, 0, 0.2); margin-top: 12.45%;">
    </div>
    </footer>
    <footer class="bg-dark text-center text-lg-start text-light">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div> <img src="img/logo_invert.jpg"  height="50px"> </div>
        </div>
        <div class="col-lg-3 col-md-11 mb-4 mb-md-0 p-3">
          <span class="fa fa-phone-alt"></span> (+33)31235608
        </div>
        <div class="col-lg-3 col-md-12 mb-4 mb-md-0 p-3">
        <span class="fa fa-envelope"></span> info@leckereweine.com
        </div>
        <div class="col-lg-3 col-md-12 mb-4 mb-md-0 p-3 text-right">
          © Leckere Weine 2021 
          </div>
        </div>
      </div>
    </footer>
  </div>
    <script src="js/jquery-3.6.0.min.js"></script> 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    </body>

</html>