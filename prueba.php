<!-- Prueba del get con la pagina de vinos y producto.json-->
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
            <a href="#portfolio">Blanco</a>
            </li>
            <li>
                <a href="#calendar">Espumoso</a>
            </li>
            <li>
            <a href="#resume">Tinto</a>
            </li>
            <li>
            <a href="#blog">Rosado</a>
            </li>
            <li>
            <a href="#blog">Champagne</a>
            </li>
            <li>
            <a href="#blog">De postre</a>
            </li>
            <li>
            <a href="#blog">Sin alcohol</a>
            </li>
        </ul>
    </div>
<!--
    <div class="container">
        <div class="images">
          <img src="upload\VTvilbao.png"/>
        </div>
        
        <div class="product">
          <p>Vinos</p>
            php
                $data = json_decode(file_get_contents("producto.json"), true);
                for($i=0; $i<count($data); $i++){
                    echo "<h1>" .$data[$i]["name"]."</h1>";
                    echo "<h2>$" .$data[$i]["cost"]."</h2>";
                    echo "<desc>" .$data[$i]["clasificacion"]."</desc><br>";
                    echo "<desc>En almacen: " .$data[$i]["stock"]."</desc>";
                }
            
          <div class="buttons">
            <button class="add">Agregar al carrito</button>
          </div>
        </div>-->
      </div>
  </body>
</html>
<script>
    $(document).ready(function(){
        var url  = "http://localhost:3000/producto";
        $.getJSON(url, function( data ) {
            var obj = data;
            for(var i=0;i<obj.length;i++)
            {
                var tr  ="<div class='container'>"+
                        "<div class='product'>" +
                        "<p>Vinos</p>" +
                        "<td><img src="+obj[i]["imagen"]+"></td>"+
                        "<td>"+obj[i]["id"]+"</td>"+
                        "<h1>"+obj[i]["name"]+"</h1>"+
                        "<h2>"+"$"+obj[i]["precio"]+"</h2>"+
                        "<p class="desc">"+obj[i]["clasificacion"][0]["name"]+"</p>"+
                        "<p class="desc">"+obj[i]["stock"]+"<p>"+
                        "<div class='buttons'>" +
                          "<button class='add'>Agregar al carrito</button>" +
                        "</div></div></div>";
            $("#productos_data").append(tr);
            }
        });
    }); 

</script>