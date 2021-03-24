<?php
    //http://localhost/Github/frontend/peticion-producto.php
    //echo "Metodo HTTP:".$_SERVER['REQUEST_METHOD']; 
    //recibir peticiones de usuario
    //echo 'informacion: ' .file_get_contents('php://input');
    header("Conntent-Type: aplication/json");
    include_once("class-producto.php");
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST': 
            $_POST= json_decode (file_get_contents('php://input'),true);
            $producto=new Producto($_POST["id"],$_POST["name"],$_POST["image"],$_POST["cost"],$_POST["stock"],$_POST["clasification"]);
            $producto->guardarProducto();
            $resultado["mensaje"]= "GUARDAR: ".json_encode($_POST);
            echo json_encode($resultado);
        break;

        case 'GET':                     
            if(isset($_GET['id'])){
               Producto :: obtenerProducto($_GET['id']); //-1 a lo mejor 
            }
            else{
                Producto :: obtenerProductos();
            }
        break;

        case 'PUT': 
            $_PUT= json_decode (file_get_contents('php://input'),true);
            $producto= new Producto($_PUT['id'],$_PUT['name'],$_PUT['image'],$_PUT['cost'],$_PUT['stock'],$_PUT['clasification']);
            $producto ->actualizarProducto($_GET['id']);
            $resultado["mensaje"]="ACTUALIZAR PRODUCTO".$_GET['id'].", INFORMACION A ACTUALIZAR: ".json_encode($_PUT);
            echo json_encode($resultado);
            
        break;

        case 'DELETE': 
            Producto :: eliminarProducto($_GET["id"]);
            $resultado["mensaje"]= "ELIMINAR PRODUCTO: ".$_GET['id'];
            echo json_encode($resultado);
        break;
    } 
?>