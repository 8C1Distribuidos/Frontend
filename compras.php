<html>
	<head>
		<title>Historial de compras</title>
        <link rel="stylesheet" href="css/almacenista.css">
		
	</head>
	<body>
    <?php include('header.html'); ?>
		<div class="milky"  align="center">Historial de compras</div>
		<div style="margin-top:2rem" class="container box">
			<br />
			<div class="table-responsive">
				<br />
				
			
				<br /><br />
				<table id="compras_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">Fecha de compra</th>
							<th width="25%">Productos adquiridos</th>
                            <th width="15%">Precio total</th>
						</tr>
					</thead>
                    <tbody>

                    </tbody>
				</table>
			</div>
</body>
</html>
</div>

<script type="text/javascript" language="javascript">
$(document).ready(function(){
        var compras;
        var usuario = usuarioLocalStorage();
        if(usuario == null || usuario.role.role != "Cliente"){
            location.href = 'index.php';
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
        var urlCompras = "http://25.81.215.48:8080/compra/historialCompras?id_usuario="+usuario.id;
    
        //GET compras
        $.getJSON(urlCompras, function( data ) {
            compras = data;
            loadTable();
        });

    function loadTable(){
       
            for(var i=0;i<compras.length;i++)
            {
            var tr  ="<tr>"+
            " <td>"+compras[i]["dateTime"]+"</td>"+
            " <td><ul>"; 
            console.log(compras[i]["purchaseList"]);
            for(var y=0; y<compras[i]["purchaseList"].length; y++){
                tr+= "<li>" + "Producto: "+ compras[i]["purchaseList"][y]["name"] + " "+ "Cantidad: "+compras[i]["purchaseList"][y]["amount"] + "</li>"; 
                
            }
                tr+=  " </ul></td><td>"+compras[i]["totalPrice"]+"</td></tr>";

                $("#compras_data").append(tr); 
        }
    }
    }); 
</script>