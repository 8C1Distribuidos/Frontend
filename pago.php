
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="css/payment.css">
<?php include('header.html'); ?>
<form id="pago_form">
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4" style="width: 35rem;">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="total-amount">Cantidad total</h5>
            <div class="amount-container"><span class="amount-text"><span class="dollar-sign">$</span> <input readOnly="true" type="text" style="text-align: center;" name="precioFinal" id="precioTotal" value="375"> </span></div>
        </div>
        <div id="productos" class="d-flex justify-content-between align-items-center">
            <table id="carrito-pago" class="u-full-width">
                <thead>
                  <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
        </div>
        <h5 class="total-amount">Información de facturación</h5>
        <div class="d-flex justify-content-between pt-4">
            <div> 
                <label style="margin-left: 2rem;">
                    <span class="label-text">CIUDAD
                        <i style="margin-left: 10px;" class="fas fa-city"></i>
                    </span> 
                </label> 
                <select id="ciudad_menu" name="ciudad" style="margin-left: 2rem; font-size: 16px; width: 17rem; margin-rigth:7rem;"class="form-control expiry-class"></select></div>
            <div > 
                <label style="margin-left: 5rem;">
                    <span class="label-text">CP
                        <i style="margin-left: 10px;" class="fas fa-mail-bulk"></i>
                    </span> 
                </label> 
                <input style="margin-left: 3rem; font-size: 16px; width:3rem" name="cp" type="tel" name="cp" class="form-control cvv-class" maxlength="4" pattern="\d*" required> 
            </div>
        </div>
        <div class="pt-4"> <label style="margin-left: 2rem;" class="d-flex justify-content-between"> <span class="label-text label-text-cc-number">DIRECCIÓN <i class="fas fa-map-pin"></i></span></label> <input  style="margin-left: 2rem; width: 28rem;" type="tel" name="direccion" class="form-control credit-card-number" maxlength="19" placeholder="Calle San Andres #1234" required> </div>
        <div class="pt-4"> <label style="margin-left: 2rem;" class="d-flex justify-content-between"> <span class="label-text label-text-cc-number">NUMERO DE TARJETA <i style="margin-left: 10px;" class="fas fa-credit-card"></i></span></label> <input  style="margin-left: 2rem; width: 28rem;" type="tel" name="numeroTarjeta" class="form-control credit-card-number" maxlength="19" placeholder="Card number" required> </div>
        <div class="d-flex justify-content-between pt-4">
            <div> 
                <label style="margin-left: 2rem;">
                    <span class="label-text">FECHA DE EXPIRACION 
                        <i style="margin-left: 10px;" class="fas fa-calendar-alt"></i>
                    </span> 
                </label> 
                <input style="margin-left: 2rem; font-size: 16px;" type="text" name="stringFecha" class="form-control expiry-class" placeholder="MM / YY" pattern="^(0[1-9]|1[0-2])\/?([0-9]{2})$" maxlength="5" required></div>
            <div > 
                <label style="margin-left: -9.5rem;">
                    <span class="label-text">CVV 
                        <i style="margin-left: 10px;" class="fas fa-lock"></i>
                    </span> 
                </label> 
                <input style="margin-left: -9.5rem; font-size: 16px;" type="tel" name="cvvTarjeta" class="form-control cvv-class" maxlength="4" pattern="\d*" required> 
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5 align-items-center"> <button type="button" id ="cancelar" class="btn cancel-btn">Cancelar</button> 
            <input  type="submit" class="btn payment-btn" id="pagar" value="Pagar"></div>
    </div>
</div>
</form>

<div class="modal fade" id="myModalError" role="dialog">
    <div class="modal-dialog">
<!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Usuario no autenticado</h4>
            </div>
            <div class="modal-body"> 
            <h2 id="mensaje">Es necesario que inicies sesión primero</h2>
            </div>
            <div class="modal-footer">
            <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 

<script>
     $(document).ready(function(){
        var usuario = usuarioLocalStorage();
        var ciudades = {};
        if(usuario == null){
            $('#myModalError').modal('show');
        }else if(usuario.role.role == "Administra" || usuario.role.role == "Almacenist" ){
            location.href = "index.php";
        }
        function usuarioLocalStorage() {
            var usuario = JSON.parse(localStorage.getItem('usuario'));
            return usuario;
        }
        $.getJSON("http://25.81.215.48:8080/compra/ciudad", function( data ) {
            ciudades = data;
            for(var i=0;i<ciudades.length;i++)
            {
                var option  ="<option value="+ciudades[i]["id"]+">"+ciudades[i]["name"]+"</option>";
                $("#ciudad_menu").append(option);
                console.log(option);
            }
        });
        $('#close').click(function(){
            location.href = 'login.php';
        });
        $('#succ').click(function(){
            location.href = 'compras.php';
        });
        $('#cancelar').click(function(){
            location.href = 'index.php';
        });
        $('#err').click(function(){
            document.getElementById("err").id = "close";
        });
        cargarCarrito();
        function toJSONString( form ) {
            var obj = {};
            var elements = form.querySelectorAll( "input, select" );
            var ident=Math.floor(Math.random() * 999999);
            for( var i = 0; i < elements.length; ++i ) {
                var element = elements[i];
                var name = element.name;
                var value = element.value;
                if( name && name!="pagar") {
                    obj[name] = value;
                }
                if( name && name=="ciudad") { 
                        obj[name]= ciudades.find( ciudades => ciudades.id ==  value);
                }
            }
            var productos = JSON.parse(localStorage.getItem('productos'));
            
            for(var i=0;i<productos.length;i++){
                productos[i]["price"] = productos[i]["price"].substring(1);
                productos[i]["amount"] = productos[i]["amount"].toString();
            }
            console.log(productos);
            obj.listaProductos = productos;
            obj.id_usuario = usuario.id;
            console.log(obj);
            return JSON.stringify(obj);
        }

        $(document).on('submit', '#pago_form',function(e){
            e.preventDefault();
            var json = toJSONString(this);
            $.ajax({
                    url:"http://25.81.215.48:8080/compra/recibir",
                    type:"POST",
                    data:json,
                    dataType:"json",
                    contentType:"application/json",
                    statusCode: {
                        422: function(responseObject, textStatus, jqXHR) {
                            $('.modal-title').text("Saldo insuficiente");
                            $('#mensaje').text("No es posible realizar la compra");
                            document.getElementById("close").id = "err";
                            $('#myModalError').modal('show');
                        },
                        404: function(responseObject, textStatus, errorThrown) {
                            $('.modal-title').text("Tarjeta no encontrada");
                            $('#mensaje').text("Tu método de pago es invalido");
                            document.getElementById("close").id = "err");
                            $('#myModalError').modal('show');
                        }
                    },
                    success:function(data)
                    {
                        $('.modal-title').text("Compra realizada");
                        $('#mensaje').text("La compra ha sido realizada con exito");
                        document.getElementById("close").id = "succ";
                        $('#myModalError').modal('show');
                    }
                });

        });

    function cargarCarrito(){
        var productos = JSON.parse(localStorage.getItem('productos'));
        if(productos.length == 0){
            location.href = "catalogos.php";
        }   
        console.log(productos);
        productos.forEach(function(producto){
        // constrir el template
        const row = document.createElement('tr');
        row.innerHTML = `
        <td>
        <img src="${producto.image}" height=70 width=70>
        </td>
        <td>${producto.name}</td>
        <td>${producto.price}</td>
        <td>${producto.amount}</td>
        </td>
        `;
        document.getElementById("carrito-pago").appendChild(row);
        }); 
        calcularTotal();
    }
function calcularTotal(){
  let productos = obtenerProductosLocalStorage();
  var total = 0;
  // Iteramos comparando el ID del curso borrado con los del LS
  productos.forEach(function(producto) {
    total = total + (producto.amount * parseFloat(producto.price.substring(1)));
  });
  document.getElementById('precioTotal').value = total;
}
});


</script>