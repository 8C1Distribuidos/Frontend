<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/productos.css">
    <title>Catálogos</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
  </head>
  <body>
  <header>
    <?php include('header.html'); ?> 
  </header>
  <div class="milky">
    <p style = "font-family:Brush;">
      Catálogos
    </p>
  </div>

<section class="hero-section" id="section">
  <div class="ard-grid" id="catalogs_data">
  </div>

</section> <br><br><br>  <br><br><br>  <br><br><br>  <br><br><br> 
<?php include('footer.html'); ?> 
  
  </body>

</html>

<script type="text/javascript" language="javascript">
$(document).ready(function(){
  var usuario = usuarioLocalStorage();
  if(usuario != null){
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
  var catalogs;
   $.getJSON("http://25.98.13.19:5555/api/Catalog/GetAll", function( data ) {
     console.log(data);
    catalogs = data;
    loadSection();
  });

    function loadSection(){
      for(var i=0;i<catalogs.length;i++){
      var tr = "<a class= ard name='category' id = " + catalogs[i].id + "value=" + catalogs[i].name + ">" +
                "<div class= 'ard__background' style='background-image: url(catalogs/"+catalogs[i].name+".jpg)'></div>"+
                  "<div class= 'ard__content'>"+
                    "<h1 size= 120px class= ard__heading >"+catalogs[i].name+"</h1>"+
                  "</div>"+
                "</a>";
                $("#catalogs_data").append(tr);
      }
    }

  $("#catalogs_data").click( function(e){
    var c = e.target.parentElement.id;
    localStorage.setItem("catalogo", c);
    var n = e.target.parentElement.value;
    localStorage.setItem("catalogoN", n);
    location.href = 'productos.php';
    
  });

});
      
</script>