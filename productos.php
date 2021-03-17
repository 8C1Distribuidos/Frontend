<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="productos.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <title>Leckere Weine</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
  </head>
  <body>
  <header>
  <div align= "center"style="background: #E3DDCF"><a href="index.php"><img src="img/logo-top-1.png" height="50px" text-align= "center"></div></a>
  <nav class="navbar navbar-dark bg-dark navbar-expand-md justify-content-center">
        <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                   <a class="nav-link" href="index.php" id="navbar" type="button" >
                      Inicio
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Productos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="vinos.php">Vinos</a>
                      <a class="dropdown-item" href="destilados.php">Destilados</a>
                    </div>
                 </li>
             
               </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item text-center" id="signup-btn">
                <a href="userspage.php" class="nav-link" type="button"><span class="fa fa-user"></span><span class="d-none d-sm-inline d-xl-block px-1"></span></a>
                </li>
                <li class="nav-item text-center" id="login-btn">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#"><span class="fa fa-shopping-cart"></span><span class="d-none d-sm-inline d-xl-block px-1"></span></a>
                </li>
                
            </ul>
        </div>
    </nav>

  <br>
  </header>

  <body>
  <div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
      <div class="profile-userpic">
						<img src="img/splash.png" class="img-responsive" alt="foto">
					</div>
        <li><a href="Destilados/brandy.php">Brandy</a></li>
        <li><a href="Destilados/tequila.php">Tequila</a></li>
        <li><a href="Destilados/cognac.php">Cognac</a></li>
        <li><a href="Destilados/ginebra.php">Ginebra</a></li>
        <li><a href="Destilados/mezcal.php">Mezcal</a></li>
        <li><a href="Destilados/ron.php">Ron</a></li>
        <li><a href="Destilados/whisky.php">Whisky</a></li>
        <li><a href="Destilados/vodka.php">Vodka</a></li>
      </ul>
    </div>

     <div id="wrapper_vinos">
    <!-- Sidebar -->
    <div id="sidebar-wrapper_vinos">
      <ul class="sidebar-nav_vinos">
      <div class="profile-userpic">
						<img src="img/vinosplash.png" class="img-responsive" alt="foto">
					</div>
        <li><a href="Vinos/blanco.php">Blanco</a></li>
        <li><a href="Vinos/espumoso.php">Espumoso</a></li>
        <li><a href="Vinos/tinto.php">Tinto</a></li>
        <li><a href="Vinos/rosado.php">Rosado</a></li>
        <li><a href="Vinos/champagne.php">Champagne</a></li>
        <li><a href="Vinos/dePostre.php">De Postre</a></li>
        <li><a href="Vinos/sinAlcohol.php">Sin Alcohol</a></li>
      </ul>
    </div>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">


  <div class="milky">
  <p style = "font-family:Brush;">
  Catálogos
</p>
   </div>


<section class="hero-section">
  <div class="ard-grid">
    <a class="ard" href="#" id ="menu-toggle_vinos">
    <div class="ard__background" style="background-image: url(https://i.blogs.es/576a60/istock-837387558/450_1000.jpg)"></div>
      <div class="ard__content">
        <h1 size="120px" class="ard__heading">Vinos</h1>
        <p class="ard__category">Poesías <br> embotelladas</p>
      </div>
    </a>
    <a class="ard" href="#" id ="menu-toggle">
    <div class="ard__background" style="background-image: url(https://bloximages.newyork1.vip.townnews.com/elvocero.com/content/tncms/assets/v3/editorial/7/80/780b6693-bd68-535f-9788-e347b0dfae70/59356158997bc.image.jpg)"></div>
      <div class="ard__content">
        <h1 class="aaard__heading">Destilados</h1>
        <p class="aaard__category">Historias <br> líquidas</p>
      </div>
    </a>
</section> <br><br><br>  <br><br><br>  <br><br><br>  <br><br><br> 
<section class="footer">

   <?php include('footer.html'); ?> 
   </section>
  
  </body>
  <script src="sidebar.js"></script> 

</html>