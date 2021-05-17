<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión</title>
    <link rel="shortcut icon" href="img/logo_icon.jpg" >
    <link rel="stylesheet" href="css/generalStyle.css">
    <link rel="stylesheet" href="css/card.css">
</head>
<body>
<?php include('header.html'); ?>
    <div id="pagina">
        <div id="contenido">
        <div class="container center">
            <div class="card">
                <h2>Inicio sesión</h2>
                <hr/>
                <p>La sesión se esta utilizando en otro lugar</p>
                <button id="otherSession">Cerrar sesión remota</button>
                <button id="back">Regresar</button>
            </div>
            </div>
        </div>
    </div>
    <div style="bottom: 0 !important">
    <?php include('footer.html'); ?>
    </div>
</body>
</html>

<script>
    $(document).ready(function(){
    //localStorage.removeItem('usuario2');
    let usuario = localStorage.getItem('usuario2');
    if(usuario == null){
        location.href = 'index.php';
    }
    $('#back').on('click',function(){
      localStorage.removeItem('usuario2');
        location.href = 'index.php';
    });
    $('#otherSession').on('click',function(){
        localStorage.removeItem('usuario');
            $.ajax({
            url:"http://25.4.107.19:8080/login/kick-user",
            type:"POST",
            data:usuario,
            dataType:"json",
            contentType:"application/json"
        });
        $.ajax({
        url:"http://25.4.107.19:8080/login",
        type:"POST",
        data:usuario,
        dataType:"json",
        contentType:"application/json",
        success:function(data)
        {
            localStorage.setItem('usuario', usuario);
            localStorage.removeItem('usuario2');
            location.href = 'index.php';
        } 
        });
    });
});

</script>