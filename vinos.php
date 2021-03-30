<!DOCTYPE html>
<html lang="en">
  <head>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
  <body > 
    <!-- Header -->
    <div align= "center"style="background: #E3DDCF"><a href="index.php"><img src="img/logo-top-1.png" height="90px" text-align= "center"></div></a>
    <?php include('header.html'); ?>

    <!--Header for wines-->
    <div class="vinos_menu">
      <h3>Vinos</h3>
    </div>
    <div class="nav" id="wine_menu">
      <ul class="button" id="myTab" role="tablist">
        <li class="nav-item">
          <a  class="btn" id="blanco-tab" data-toggle="tab" role="tab" aria-controls="blanco" aria-selected="false">Blanco</a>
        </li>
        <li class="nav-item">
          <a  class="btn" id="espumoso-tab" data-toggle="tab" role="tab" aria-controls="espumoso" aria-selected="false">Espumoso</a>
        </li>
        <li class="nav-item">
          <a  class="btn" id="tinto-tab" data-toggle="tab" role="tab" aria-controls="tinto" aria-selected="false">Tinto</a>
        </li>
        <li class="nav-item">
          <a  class="btn" id="rosado-tab" data-toggle="tab" role="tab" aria-controls="rosado" aria-selected="false">Rosado</a>
        </li>
        <li class="nav-item">
          <a  class="btn" id="champagne-tab" data-toggle="tab" role="tab" aria-controls="champagne" aria-selected="false">Champagne</a>
        </li>
        <li class="nav-item">
          <a  class="btn" id="dePostre-tab" data-toggle="tab" role="tab" aria-controls="dePostre" aria-selected="false">De postre</a>
        </li>
        <li class="nav-item">
          <a  class="btn" id="sinAlcohol-tab" data-toggle="tab" role="tab" aria-controls="sinAlcohol" aria-selected="false">Sin alcohol</a>
        </li>
      </ul>
    </div>
    <div id="tarjetita">
    </div>
  </body>
</html>
<script>
  
  $(document).ready(function(){
    clasificacion="Vino blanco";
    updatecont()
  }); 
  var clasificacion;
  $("#blanco-tab").on('click', function(){
    clasificacion = "Vino blanco";
    updatecont();
  });
  $("#espumoso-tab").on('click', function(){
    clasificacion = "Vino espumoso";
    updatecont();
  });
  $("#tinto-tab").on('click', function(){
    clasificacion = "Vino tinto";
    updatecont();
  });
  $("#rosado-tab").on('click', function(){
    clasificacion = "Vino rosado";
    updatecont();
  });
  $("#champagne-tab").on('click', function(){
    clasificacion = "Vino champagne";
    updatecont();
  });
  $("#dePostre-tab").on('click', function(){
    clasificacion = "Vino de postre";
    updatecont();
  });
  $("#sinAlcohol-tab").on('click', function(){
    clasificacion = "Vino sin alcohol";
    updatecont();
  });
  function updatecont(){
    var url  = "http://localhost:3000/products";
    $.getJSON(url, function( data ) {
      var obj = data;
      $("#tarjetita").empty();
      for(var i=0;i<obj.length;i++)
      {
        if (obj[i]["clasificacion"][0]["name"]==clasificacion) {
          var tr  ="<div class=\"container\">"+
                    "<div class=\"images\">"+
                      "<img src="+obj[i]["imagen"]+">"+
                    "</div>"+
                    "<div class=\"product\">"+
                      "<p>"+obj[i]["clasificacion"][0]["name"]+"</p>"+
                      "<h1>"+obj[i]["name"]+"</h1>"+
                      "<h2>"+"$"+obj[i]["costo"]+"</h2>"+
                      "<p class=\"desc\">"+"</p>"+
                      "<div class=\"buttons\">"+
                        "<button class=\"add\">"+"Agregar al carrito"+"</button>"+
                      "</div>"+
                    "</div>"+
                  "</div>";
          $("#tarjetita").append(tr);
        }
      }
    });
  }
  $(document).on('submit', '#productos_form',function(event){
            var extension = $('#imagen').val().split('.').pop().toLowerCase();
            if(extension != '')
            {
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Invalid Image File");
                    $('#imagen').val('');
                    return false;
                }
            }
            function toJSONString( form ) {
                var obj = {};
                var elements = form.querySelectorAll( "input, select, textarea" );
                for( var i = 0; i < elements.length; ++i ) {
                    var element = elements[i];
                    var name = element.name;
                    var value = element.value;

                    if( name && name!="action") {
                        obj[ name ] = value;
                    }
                }
                return JSON.stringify( obj );
            }
            var json = toJSONString( this );
            event.preventDefault();
            var x= $('#action').val();
            if( x == "Add"){
                $.ajax({
                    url:"http://localhost:3000/products",
                    type:"POST",
                    data:json,
                    dataType:"json",
                    contentType:"application/json",
                    success:function(data)
                    {
                        $('#productos_form')[0].reset();
                        $('#productosModal').modal('hide');
                        obj.push(json);
                        $('#productos_data > tbody').empty();
                        loadTable();
                    }
                });
            }else{
                //UPDATE
            }     
	    });
</script>