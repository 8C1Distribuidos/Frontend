<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS -->
    <title>Vinos</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
  </head>
  <body > 
    <!-- Header -->
    <div align= "center"style="background: #E3DDCF"><a href="index.php"><img src="img/logo-top-1.png" height="90px" text-align= "center"></div></a>
    <?php include('header.html'); ?>

    <!--Header for wines-->
    <div class="vinos_menu">
      <h3>Vinos</h3>
    </div>
    </div>
    <div class="nav" id="wine_menu">
      <ul class="button" id="myTab" role="tablist">
      </ul>
    </div>
    <div id="list-products">
      <div id="tarjetita">
      </div>
    </div>
   

<script src="js/app.js"></script>
  </body>
</html>

<script>
  
  $(document).ready(function(){
    var clasification;
    var products = [];
    var classifications;
    var urlProducts = "http://25.98.13.19:5555/api/Product/GetAll"

    //GET productos
    $.getJSON(urlProducts, function( data ) {
        products = data;
        console.log(products);
    });

    //GET clasificaciones 
    $.getJSON("http://25.98.13.19:5555/api/Category/GetAll", function( data ) {
        classifications = data;
        for(var i=0;i<classifications.length;i++)
        {
          var item =  "<li class= nav-item >"+
                        "<a class= btn name= "+classifications[i]["name"]+" id="+classifications[i]["id"]+" data-toggle='tab' role='tab' aria-controls='blanco' aria-selected='false'>"+
                        classifications[i]["name"]+"</a>"+
                      "</li>";
          $("#myTab").append(item);
          
        }
        clasification = classifications[0]["name"];
        updatecont(products);
    });
    var ul = document.getElementById('myTab');
    ul.onclick = function(event) {
      clasification = event.target.innerHTML;
      updatecont(products);
    };

    function updatecont(){
      console.log(products);
        for(var i=0;i<products.length;i++)
        {
          if (products[i]["category"]["name"]== clasification) {
            var tr  ="<div class=\"container\">"+
                      "<div class=\"img-t\">"+
                        "<img src= upload/"+products[i]["image_Link"]+">"+
                      "</div>"+
                      "<div class=\"product\">"+
                        "<p>"+products[i]["category"]["name"]+"</p>"+
                        "<h1>"+products[i]["name"]+"</h1>"+
                        "<h2>"+"$"+products[i]["price"]+"</h2>"+
                        "<input type=hidden value="+products[i]["stock"]+">"+
                        "<p class=\"desc\">"+"</p>"+
                        "<div class=\"buttons\">"+
                          "<button class=\"add\"  data-id="+products[i]["id"]+">"+"Agregar al carrito"+"</button>"+
                        "</div>"+
                      "</div>"+
                    "</div>";
            $("#tarjetita").append(tr);
          }
        }
    }

  }); 
  
  
</script>
