<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/vinos.css">
    <title>Vinos</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
  </head>
  <body> 
    <!-- Header -->
    <div align= "center"style="background: #E3DDCF"><a href="index.php"><img src="img/logo-top-1.png" height="90px" text-align= "center"></div></a>
    <?php include('header.html'); ?>

    <!--Header for wines-->
    <div class="vinos_menu">
        <h3>Vinos</h3>
        </div>
        <div class="nav" id="wine_menu">
          <ul>
            <li>
            <a href="#blanco">Blanco</a>
            </li>
            <li>
              <a href="#espumoso">Espumoso</a>
            </li>
            <li>
              <a href="#tinto">Tinto</a>
            </li>
            <li>
              <a href="#rosado">Rosado</a>
            </li>
            <li>
              <a href="#champagne">Champagne</a>
            </li>
            <li>
              <a href="#dePostre">De postre</a>
            </li>
            <li>
              <a href="#sinAlcohol">Sin alcohol</a>
            </li>
          </ul>
    </div>

    <!--<div class="container">
        <div class="images">
          <img src="upload\VTvilbao.png"/>
        </div>
        <div class="product">
          <p>Vinos</p>
          <h1>Bilbao</h1>
          <h2>$150</h2>
          <p class="desc">The Nike Epic React Flyknit foam cushioning is responsive yet light-weight, durable yet soft. This creates a sensation that not only enhances the feeling of moving forward, but makes running feel fun, too.</p>
          <div class="buttons">
            <button class="add">Agregar al carrito</button>
          </div>
        </div>
      </div>-->
  </body>
</html>

<script>
  $(document).ready(function(){
      var url  = "http://localhost:3000/products";
      $.getJSON(url, function( data ) {
          var obj = data;
          for(var i=0;i<obj.length;i++)
          {
            var tr  ="<div class="container">"+
                        "<div class="images">"+
                          "<img src="+obj[i]["imagen"]+">"+
                        "</div>"+
                        "<div class="product">"+
                          "<p>"+obj[i]["clasificacion"][0]["catalogo"][0]["name"]+"</p>"+
                          "<h1>"+obj[i]["name"]+"</h1>"+
                          "<h2>"+"$"+obj[i]["precio"]+"</h2>"+
                          "<p></p>"+
                        "</div>"
                      "</div>";
          $("#productos_data").append(tr);
          }
      });
  }); 
</script>