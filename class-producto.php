<?php

    class Producto{
        private $id;
        private $name;
        private $image;
        private $cost;
        private $stock;
        private $clasification;
      
    public function __construct($id,$name,$image,$cost,$stock,$clasification){
        $this -> id=$id;
        $this -> name=$name;
        $this -> image=$image;
        $this -> cost=$cost;
        $this -> stock=$stock;
        $this -> clasification=$clasification;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
        return $this;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name=$name;
        return $this;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        $this->image=$image;
        return $this;
    }

    public function getCost(){
        return $this->cost;
    }

    public function setCost($cost){
        $this->cost=$cost;
        return $this;
    }

    public function getStock(){
        return $this->stock;
    }

    
    public function setStock($stock){
        $this->stock=$stock;
        return $this;
    }

    public function getClasification(){
        return $this->clasification;
    }

    public function setClasification($clasification){
        $this->clasification=$clasification;
        return $this;
    }


    public function _toString(){
        return $this->id." ".$this->name." ".$this->image." ".$this->cost." ".$this->stock." ".$this->clasification;
    }

    public function guardarProducto(){
        $contenidoArchivo= file_get_contents("producto.json");
        $productos= json_decode($contenidoArchivo,true);
        $productos[]=array(
            "id" => $this -> id, 
            "name" => $this -> name, 
            "image" => $this -> image, 
            "cost" => $this -> cost, 
            "stock" => $this -> stock,
            "clasification" => $this -> clasification  
        );
        $archivo=fopen("producto.json","w");
        fwrite($archivo,json_encode($productos));
        fclose($archivo);

    }

    static public function obtenerProductos(){
        $contenidoArchivo=file_get_contents("producto.json");
        echo $contenidoArchivo;

    }

    static public function obtenerProducto($id){
        $contenidoArchivo=file_get_contents("producto.json");
        $productos=json_decode($contenidoArchivo,true);
        echo json_encode($productos[$id]);
 

    }

    public function actualizarProducto($id){
        $contenidoArchivo=file_get_contents("producto.json");
        $productos=json_decode($contenidoArchivo,true);
        //$producto=$productos[$id];
        $producto=array(
            'id'=> $this->id,
            'name'=> $this->name,
            'image'=> $this->image,
            'cost'=> $this->cost,
            'stock'=> $this->stock,
            'clasification'=> $this->clasification
        );
        $productos[$id]=$producto;
        $archivo=fopen('producto.json','w');
        fwrite($archivo,json_encode($productos));
        fclose($archivo);
    }

    static public function eliminarProducto($id){
        $contenidoArchivo=file_get_contents("producto.json");
        $productos=json_decode($contenidoArchivo,true);
        array_splice($productos,$id);
        $archivo=fopen('producto.json','w');
        fwrite($archivo,json_encode($productos));
        fclose($archivo);
    }

}

?>