<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/vinos.css">
    <link rel="stylesheet" href="css/generalStyle.css">
    <!-- Bootstrap CSS -->
    <title>Productos</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
  </head>
  <body > 
    <!-- Header -->
    <div align= "center"style="background: #E3DDCF"><a href="index.php"><img src="img/logo-top-1.png" height="90px" text-align= "center"></div></a>
   
    <?php include('header.html'); ?>
    <div id="pagina">
    <div id="contenido">
    <!--Header for wines-->
    <div id = "title" style = "text-align: center;">
    </div>
    <div class="vinos_menu">
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
    </div>
    </div>
    <div style="bottom: 0 !important">
    <?php include('footer.html'); ?>
    </div>
  </body>
</html>

<script type="text/javascript" language="javascript">
  $(document).ready(function(){
    localStorage.removeItem('usuario2');
    const productos = document.getElementById('list-products');
    productos.addEventListener('click', comprar);
    var clasification;
    var products = [];
    var classifications;
    //var urlProducts = "http://localhost:3000/Products";
    var urlProducts = "http://25.98.13.19:5555/api/Product/GetAll"
    var usuario = usuarioLocalStorage();
    var idCatalog = localStorage.getItem('catalogo');
    var nombreCatalog = localStorage.getItem('catalogoN');
    if(idCatalog == null){
      location.href = 'catalogos.php';
    }
    if(usuario!=null){
      if(usuario.role.role != "Cliente"){
          location.href = 'index.php';
      }
    }
    function usuarioLocalStorage() {
        let usuario;
        if(localStorage.getItem('usuario') == null) {
            usuario = null;
        } else {
            usuario = JSON.parse(localStorage.getItem('usuario'));
        }
        return usuario;
    }
    
    $("#title").append("<h2>"+nombreCatalog+"</h2>");
    //GET productos
    $.getJSON(urlProducts, function( data ) {
        products = data;
        console.log(products);
    });
    
    $.getJSON("http://25.98.13.19:5555/api/Category/GetByCatalog?id=" + idCatalog, function( data ) {
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
        updatecont();
    });
    var ul = document.getElementById('myTab');
    ul.onclick = function(event) {
      clasification = event.target.innerHTML;
      console.log(clasification);
      updatecont();
    };

    function updatecont(){
      document.getElementById("list-products").innerHTML =" ";
        for(var i=0;i<products.length;i++)
        {
          console.log(clasification);
          if (products[i]["category"]["name"]== clasification) {
            var tr  ="<div class=\"container\">"+
                      "<div class='img-t'>"+
                        "<img width=300px heigth=200px src='upload/"+products[i]["imageLink"]+"'>"+
                      "</div>"+
                      "<div class=\"product\">"+
                        "<p>"+products[i]["category"]["name"]+"</p>"+
                        "<h1>"+products[i]["name"]+"</h1>"+
                        "<h2>"+"$"+products[i]["price"]+"</h2>"+
                        "<input type=hidden value="+products[i]["stock"]+">"+
                        "<p class=\"desc\">"+"</p>";
                        if(products[i]["stock"]>0){
                        tr += "<div class=\"buttons\">"+
                          "<button class=\"add\"  data-id="+products[i]["id"]+">"+"Agregar al carrito"+"</button>"+
                        "</div>"+
                      "</div>"+
                    "</div>";
                        }else{
                          tr += "</div>"+
                              "</div>";
                        }
            $("#list-products").append(tr);
          }
        }
    }

  }); 
  
  
</script>
