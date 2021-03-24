<?php
class Database{
    private $con;
    private $dbhost="localhost";
    private $dbuser="root";
    private $dbpass="";
    private $dbname="crud";

    function __construct(){
        $this->connect_db();
    }

    public function connect_db(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if(mysqli_connect_error()){
            die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }
    }

    public function exeQuery($sql)
    {
        $res = mysqli_query($this->con, $sql);
        return $res;
    }
}

?>