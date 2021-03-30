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
    <link rel="stylesheet" href="css/destilados.css">

    
    <title>Destilados</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
  </head>
  <body> 
    <!-- Header -->
    <div align= "center"style="background: #E3DDCF"><a href="index.php"><img src="img/logo-top-1.png" height="90px" text-align= "center"></div></a>
    <?php include('header.html'); ?>
        <!--Header for wines-->
    <div class="vinos_menu">
      <h3>Destilados</h3>
    </div>
    <form>
      <div class="nav" id="wine_menu">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a  class="btn" id="brandy-tab" data-toggle="tab" role="tab" aria-controls="brandy" aria-selected="true">Brandy</a>
          </li>
          <li class="nav-item">
            <a  class="btn" id="tequila-tab" data-toggle="tab" role="tab" aria-controls="tequila" aria-selected="false">Tequila</a>
          </li>
          <li class="nav-item">
            <a  class="btn" id="cognac-tab" data-toggle="tab" role="tab" aria-controls="cognac" aria-selected="false">Cognac</a>
          </li>
          <li class="nav-item">
            <a  class="btn" id="ginebra-tab" data-toggle="tab" role="tab" aria-controls="ginebra" aria-selected="false">Ginebra</a>
          </li>
          <li class="nav-item">
            <a  class="btn" id="mezcal-tab" data-toggle="tab" role="tab" aria-controls="mezcal" aria-selected="false">Mezcal</a>
          </li>
          <li class="nav-item">
            <a  class="btn" id="ron-tab" data-toggle="tab" role="tab" aria-controls="ron" aria-selected="false">Ron</a>
          </li>
          <li class="nav-item">
            <a  class="btn" id="whisky-tab" data-toggle="tab" role="tab" aria-controls="whisky" aria-selected="false">Whisky</a>
          </li>
          <li class="nav-item">
            <a  class="btn" id="vodka-tab" data-toggle="tab" role="tab" aria-controls="vodka" aria-selected="false">Vodka</a>
          </li>
        </ul>
      </div>
    <div id="tarjetita">
    </div>
  </body>
</html>
<script>
  $(document).ready(function(){
    clasificacion = "Brandy";
    updatecont();
  }); 
  var clasificacion;
  $("#brandy-tab").on('click', function(){
    clasificacion = "Brandy";
    updatecont();
  });
  $("#tequila-tab").on('click', function(){
    clasificacion = "Tequila";
    updatecont();
  });
  $("#cognac-tab").on('click', function(){
    clasificacion = "Cognac";
    updatecont();
  });
  $("#ginebra-tab").on('click', function(){
    clasificacion = "Ginebra";
    updatecont();
  });
  $("#mezcal-tab").on('click', function(){
    clasificacion = "Mezcal";
    updatecont();
  });
  $("#ron-tab").on('click', function(){
    clasificacion = "Ron";
    updatecont();
  });
  $("#whisky-tab").on('click', function(){
    clasificacion = "Whisky";
    updatecont();
  });
  $("#vodka-tab").on('click', function(){
    clasificacion = "Vodka";
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