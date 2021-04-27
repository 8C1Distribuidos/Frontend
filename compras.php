<html>
	<head>
		<title>Historial de compras</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<link rel="stylesheet" href="css/almacenista.css">
		
	</head>
	<body>
    <?php include('header.html'); ?>
		<div class="milky" align="center">Historial de compras</div>
		<div style="margin-top:130px" class="container box">
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
        //var productos;
        var urlCompras = "http://localhost:3000/Compras";
    
        //GET compras
        $.getJSON(urlCompras, function( data ) {
            compras = data;
            loadTable();
        });


    function loadTable(){
       
            for(var i=0;i<compras.length;i++)
            {
            var tr  ="<tr>"+
                    //" <td>"+Compras[i]["Productname"]+' , '+"</td>"+

                    " <td>"+compras[i]["fechasCompra"]+"</td>"+
                    " <td><ul>"; 

                    for(var producto in compras[i]["Products"]){
                        tr+= "<li>" + "Producto: "+ compras[i]["Products"][producto].name + " "+ "Cantidad: "+compras[i]["Products"][producto].amount + "</li>"; 
                        
                    }
                        tr+=  " </ul></td><td>"+compras[i]["CantidadTotal"]+"</td></tr>";

                        $("#compras_data").append(tr);
                
                   
        }
    }
    }); 
</script>