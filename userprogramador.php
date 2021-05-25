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
							<th width="21%">Fecha de la actividad</th>
							<th width="31%">Descripcion</th>
							<th width="16%">Estatus</th>
                            <th width="16%">Equipo</th>
                            <th width="16%">Cliente</th>
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

<script>
    $(document).ready(function(){
    var usuario = usuarioLocalStorage();
   /* if(usuario== null || usuario.role.role != "Programador"){
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


        //GET usuarios 
            $.getJSON(urlInfo, function( data ) {
                info = data;
                loadTable();
            });
        

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
