<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css/payment.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="fontawesome/css/all.css" rel="stylesheet">
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4" style="width: 35rem;">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="total-amount">Cantidad total</h5>
            <div class="amount-container"><span class="amount-text"><span class="dollar-sign">$</span> <input readOnly="true" type="text" style="text-align: center;" name="precioTotal" id="precioTotal" value="375"> </span></div>
        </div>
        <div id="productos" class="d-flex justify-content-between align-items-center">
            <table id="carrito-pago" class="u-full-width">
                <thead>
                  <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th> </th>
                    <th>Cantidad</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
        </div>
        <div class="d-flex justify-content-between pt-4">
            <div> 
                <label style="margin-left: 2rem;">
                    <span class="label-text">CIUDAD
                        <i style="margin-left: 10px;" class="fas fa-city"></i>
                    </span> 
                </label> 
                <select style="margin-left: 2rem; font-size: 16px; width: 17rem; height: 3rem;" name="municipio" class="form-control expiry-class"></select></div>
            <div > 
                <label style="margin-left: -9.5rem;">
                    <span class="label-text">CP
                        <i style="margin-left: 10px;" class="fas fa-mail-bulk"></i>
                    </span> 
                </label> 
                <input style="margin-left: -9.5rem; font-size: 16px;" type="tel" name="cvvTarjeta" class="form-control cvv-class" maxlength="4" pattern="\d*"> 
            </div>
        </div>
        <div class="pt-4"> <label style="margin-left: 2rem;" class="d-flex justify-content-between"> <span class="label-text label-text-cc-number">DIRECCIÓN <i class="fas fa-map-pin"></i></span></label> <input  style="margin-left: 2rem; width: 28rem;" type="tel" name="credit-number" class="form-control credit-card-number" maxlength="19" placeholder="Calle San Andres #1234"> </div>
        <div class="pt-4"> <label style="margin-left: 2rem;" class="d-flex justify-content-between"> <span class="label-text label-text-cc-number">NUMERO DE TARJETA <i style="margin-left: 10px;" class="fas fa-credit-card"></i></span></label> <input  style="margin-left: 2rem; width: 28rem;" type="tel" name="credit-number" class="form-control credit-card-number" maxlength="19" placeholder="Card number"> </div>
        <div class="d-flex justify-content-between pt-4">
            <div> 
                <label style="margin-left: 2rem;">
                    <span class="label-text">FECHA DE EXPIRACION 
                        <i style="margin-left: 10px;" class="fas fa-calendar-alt"></i>
                    </span> 
                </label> 
                <input style="margin-left: 2rem; font-size: 16px;" type="text" name="fechaTarjeta" class="form-control expiry-class" placeholder="MM / YY" pattern="^(0[1-9]|1[0-2])\/?([0-9]{2})$" maxlength="5"></div>
            <div > 
                <label style="margin-left: -9.5rem;">
                    <span class="label-text">CVV 
                        <i style="margin-left: 10px;" class="fas fa-lock"></i>
                    </span> 
                </label> 
                <input style="margin-left: -9.5rem; font-size: 16px;" type="tel" name="cvvTarjeta" class="form-control cvv-class" maxlength="4" pattern="\d*"> 
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5 align-items-center"> <button type="button" class="btn cancel-btn">Cancelar</button> 
            <button type="button" class="btn payment-btn">Pagar</button> </div>
    </div>
</div>

<div class="modal fade" id="myModalError" role="dialog">
    <div class="modal-dialog">
<!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
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

<script>
     $(document).ready(function(){
        var usuario = usuarioLocalStorage();
        if(usuario == null){
            $('#myModalError').modal('show');
        }else if(usuario.role.role == "Administra" || usuario.role.role == "Almacenist" ){
            location.href = "index.php";
        }
        function usuarioLocalStorage() {
            let usuario;
            if(localStorage.getItem('usuario') == null) {
                usuario = null;
            } else {
                location.href = 'userspage.php';
            }
        }
        $('#close').click(function(){
            location.href = 'login.php';
        });

function cargarCarrito(){
    var productos = localStorage.getItem('productos');
    if(productos.length == 0){
        location.href = "catalogos.php";
    }
  productos.forEach(function(producto){
    // constrir el template
    const row = document.createElement('tr');
      row.innerHTML = `
      <td>
      <img src="${producto.image}" height=70 width=70>
      </td>
      <td>${producto.name}</td>
      <td>${producto.price}</td>
      <td><span style="font-size: 1.7rem;"class="mas" ><i class="fas fa-minus-square"></i><span></td>
      <td>${producto.amount}</td>
      <td><span style="font-size: 1.7rem;"class="mas" ><i class="fas fa-plus-square"></i><span></td>
      <td>
      <a href="#" style="font-size: 1.7rem;" class="borrar-producto" data-id="${producto.id}"><span style="font-size: 1.7rem; color:red"><i class="fas fa-times-circle"></i></span></a>
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
  document.getElementById('precioTotal').val("Pagar: $"+ total);
}
});


</script>