<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/productos.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>Catálogos</title>
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
                <a class="nav-link" href="catalogos.php" id="navbar" type="button" >
                      Productos
                    </a>
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

  <div class="milky">
    <p style = "font-family:Brush;">
      Catálogos
    </p>
  </div>

<section class="hero-section" id="section">
  <div class="ard-grid" id="catalogs_data">
  </div>

</section> <br><br><br>  <br><br><br>  <br><br><br>  <br><br><br> 
<section class="footer">

   <?php include('footer.html'); ?> 
   </section>
  
  </body>
  <script src="js/sidebar.js"></script> 

</html>

<script>
$(document).ready(function(){
  var catalogs;
   $.getJSON("http://25.98.13.19:5555/api/Catalog/GetAll", function( data ) {
    catalogs = data;
    loadSection();
  });

    function loadSection(){
      for(var i=0;i<catalogs.length;i++){
      var tr = "<a class= ard name='category' id = "+catalogs[i].id+">"+
                "<div class= 'ard__background' style='background-image: url(catalogs/"+catalogs[i].name+".jpg)'></div>"+
                  "<div class= 'ard__content'>"+
                    "<h1 size= 120px class= ard__heading >"+catalogs[i].name+"</h1>"+
                  "</div>"+
                "</a>";
                $("#catalogs_data").append(tr);
      }
    }

  var sec = document.getElementById('section');
  sec.onclick = function(event) {
    location.href = 'productos.php';
    local.storage("catalog", $(this).attr("id"));
  };

});
      
</script>