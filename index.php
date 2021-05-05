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
    html, body {
      margin:0;
      padding:0;
      height:100%;
    }
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
    #pagina {
  position: relative;
  min-height: 100%;
}
#contenido {
  padding-bottom:50px; /* este valor debe ser igual o mayor al alto del pie */
}

  </style>
  <body>
    
    <!-- Header -->
    <div align= "center"style="background: #E3DDCF"><a href="index.php"><img src="img/logo-top-1.png" height="90px" text-align= "center"></div></a>
    <?php include('header.html'); ?>
           
    <!-- Imágenes -->
    <div id="pagina">
    <div id="contenido">
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
    </div>
    <div style="bottom: 0 !important">
    <?php include('footer.html'); ?>
    </div>
    

  </body>

</html>