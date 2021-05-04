<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Leckere Weine</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
  </head>
  <style>
    p5 {
      text-shadow:
        0 0 1px black,
        -1px -1px 0 black,  
        1px -1px 0 black,
        -1px 1px 0 black,
        1px 1px 0 black;
    }
    h5 {
      text-shadow:
        0 0 1px black,
        -1px -1px 0 black,  
        1px -1px 0 black,
        -1px 1px 0 black,
        1px 1px 0 black;
    }

  </style>
  <body>
    
    <!-- Header -->
    <div align= "center"style="background: #E3DDCF"><a href="index.php"><img src="img/logo-top-1.png" height="90px" text-align= "center"></div></a>
    <?php include('header.html'); ?>
           
    <!-- Imágenes -->

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/vinos.jpg" class="d-block w-100" alt="..." height="100%">
          <div class="carousel-caption d-none d-md-block">
            <h5>Vinos</h5>
            <p5>Selección de vinos para toda ocasión.</p5>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/destilados.jpg" class="d-block w-100" alt="..." height="100%">
          <div class="carousel-caption d-none d-md-block">
            <h5>Destilados</h5>
            <p5>Visita nuestra sección de destilados.</p5>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/contacto.jpg" class="d-block w-100" alt="..." height="100%">
          <div class="carousel-caption d-none d-md-block">
            <h5>Contáctanos</h5>
            <p5>Nuestra información se encuentra al final de la página.</p5>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- Footer -->
    <footer style=" position: absolute; width: 100%;" class="bg-dark text-center text-lg-start text-light" >
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


  </body>

</html>