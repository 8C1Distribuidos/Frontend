<html>
	<head>
        <title>Programador</title>
        <link rel="stylesheet" href="css/almacenista.css">
        <link rel="stylesheet" href="css/generalStyle.css">
        <link rel="shortcut icon" href="img/logo_icon.jpg" >
	</head>
	<body>
    <?php include('header.html'); ?>
    <div id="pagina">
    <div id="contenido">
		<div class="milky" align="center">Lista de actividades</div>
		<div style="margin-top:2rem" class="container box">
			<br />
			<div class="table-responsive">
				<br />
                <div align="center">
				<img src="img/logo-top-1.png"height="120px">
				</div>
				<br /><br />
				<table id="usuarios_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="21%" data-column="fecha" data-order="desc">Fecha de la actividad</th>
							<th width="31%">Descripcion</th>
							<th width="16%" data-column="estatus" data-order="desc">Estatus</th>
                            <th width="16%" data-column="equipo" data-order="desc">Equipo</th>
                            <th width="16%" data-column="cliente" data-order="desc">Cliente</th>
						</tr>
					</thead>
                    <tbody>

                    </tbody>
				</table>
			</div>
            </div>
            </div>
            <div style="bottom: 0 !important">
    <?php include('footer.html'); ?>
</div>
</body>
</html>
</div>
<div class="modal fade" id="myModalError" role="dialog">
        <div class="modal-dialog">
    <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body"> 
                <h2 id="mensaje"></h2>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
    
        </div>
</div>

<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function(){
        var usuario = usuarioLocalStorage();
        /*if(usuario== null || usuario.role.role != "Programador"){
            location.href = 'index.php';
        }*/


        function usuarioLocalStorage() {
            let usuario;
            if(localStorage.getItem('usuario') == null) {
                usuario = null;
            } else {
                usuario = JSON.parse(localStorage.getItem('usuario'));
            }
            return usuario;
        }
        //Varibles
        var info;
        var urlInfo = "http://localhost:3000/info1"
        var urlInfo1 = "http://localhost:3000/info2"
        var urlInfo2 = "http://localhost:3000/info3"
        var infos = ["http://localhost:3000/info1", "http://localhost:3000/info2", "http://localhost:3000/info3"];
        var info_aux= new Array();

        //array1.forEach(element => console.log(element));
        

        //GET usuarios 
        $.getJSON(urlInfo, function( data ) {
                info = data;
                info_aux = data;
                loadTable();
            });

            $.getJSON(urlInfo1, function( data ) {
                info = data;
                info_aux += data;
                loadTable();
            });

            $.getJSON(urlInfo2, function( data ) {
                info = data;
                info_aux += data;
                loadTable();
                $('#usuarios_data').DataTable();
            });
            /*$.getJSON(infos, function(data){
                info = data;
                loadTable();
            });*/
            

        //Formato de la tabla 
         function loadTable(){
            for(var i=0;i<info.length;i++)
            {
                var tr = "<tr>"+
                    "<td>"+info[i]["date"]+"</td>"+
                    "<td>"+info[i]["description"]+"</td>"+
                    "<td>"+info[i]["status"]+"</td>"+
                    "<td>"+info[i]["identifier"]+"</td>"+
                    "<td>"+info[i]["user"]+"</td>"+
                    "</tr>";
            $("#usuarios_data").append(tr);
            };
        }

        function reload() {
            location.reload();
        }
    }); 
</script>
